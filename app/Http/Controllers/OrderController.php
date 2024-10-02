<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\PublicUser;
use App\Models\PublicUserAddresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\UrlGenerator;
class OrderController extends Controller
{
    public function index()
    {
        $userOrders = Order::orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('userOrders'));
    }
    public function orderDetails($id)
    {
        $orderProducts = OrderProduct::where('order_id', $id)->get();
        foreach ($orderProducts as $key => $orderProduct) {
            $products = Product::where('id', $orderProduct['product_id'])->first();
            $orderProducts[$key]->color = $products->pcolor;
            $orderProducts[$key]->images = $products->pimages;
        }
        // print_r($orderProducts);die;
        $userOrder = Order::find($id);
        $user = PublicUser::find($userOrder['user_id']);
        $userAddress = PublicUserAddresses::where('user_id', $userOrder['user_id'])->first();
        return view('admin.order.order_details', compact('orderProducts', 'userOrder', 'user', 'userAddress'));
    }
    public function updateOrderStatus(Request $request, $id)
    {
        $orderStatus = '';

        if ($request->orderstatus == 1) {
            $orderStatus = 'Packed';
        }

        if ($request->orderstatus == 2) {
            $orderStatus = 'Shipped';
        }

        if ($request->orderstatus == 3) {
            $orderStatus = 'Delivered';
        }  

        $userOrder = Order::find($id);
        $userOrder->order_status = $request->orderstatus;
        $userOrder->save();
        
        $userName = PublicUserAddresses::where('user_id',$userOrder['user_id'])->first();
        $to_name = $userName['name'];
        $to_email = $userOrder['email'];
        

        $orderProducts = OrderProduct::where('order_id', $id)->get();
        foreach ($orderProducts as $key => $orderProduct) {
            $products = Product::where('id', $orderProduct['product_id'])->first();
            $orderProducts[$key]->color = $products->pcolor;
            $orderProducts[$key]->images = explode(',',$products->pimages)[0];
        }

        // print_r($orderProducts);
        // die;

        $data = array('orderProducts' => $orderProducts,'name' => $to_name, 'orderStatus' => $orderStatus,'userOrder' => $userOrder);

        // Send Otp for verify email
        Mail::send('frontend/mail/update_status_mail', $data, function ($message) use ($to_name, $to_email, $orderStatus) {
            $message->to($to_email, $to_name)
                ->subject('Your Order Has Been ' . $orderStatus);
            $message->from('testingkeliye1@gmail.com', 'Ujjwala Hoiesory');
        });

        return back()->with('message', 'Order Status Updated');
    }
    public function cancelOrderByUser($id)
    {
        $userOrder = Order::find($id);
        $userOrder->order_status = 5;
        $userOrder->save();
        return back()->with('message', 'Order Cancel');
    }
}
