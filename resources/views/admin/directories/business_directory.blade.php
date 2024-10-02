@extends('layouts.admin_master')
@section('sitetitle', 'All Marriage Register Users')
@section('title', 'All Marriage Register Users')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Business Name</th>
                                    <th>Visiting Card</th>
                                    <th>Category / Sub Category</th>
                                    <th>Work</th>
                                    <th>Person Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Website Link</th>
                                    <th>Offer</th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($businessDir as $business)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>
                                        <select name="status" id="status" onchange="updateStatus(this.value)">
                                            <option value="1/{{$business->id}}" <?php if($business->status == 1){ echo 'selected'; } ?>>Active</option>
                                            <option value="0/{{$business->id}}" <?php if($business->status == 0){ echo 'selected'; } ?>>De-Active</option>
                                        </select>
                                    </td>
                                    <td>
                                        <form action="{{ route('deletebusinessdir', $business->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                </button>
                                        </form>
                                    </td>
                                    <td>{{ $business->business_name}}</td>
                                    <td> <img src="{{asset('uploads/business_visiting_cards/'.$business->visiting_card)}}" alt="" height="100px" width="100%" ></td>
                                    <td>{{ $business->category->category_name }} / {{ $business->sub_category->sub_category_name }}</td>
                                    <td>{{ $business->work }}</td>
                                    <td>{{ $business->person_name }}</td>
                                    <td>{{ $business->mobile }}</td>
                                    <td>{{ $business->email }}</td>
                                    <td>{{ $business->address }}</td>
                                    <td>{{ $business->pincode }}</td>
                                    <td>{{ $business->city->city }}</td>
                                    <td>{{ $business->state->name }}</td>
                                    <td>{{ $business->country->name }}</td>
                                    <td> <a href="{{ $business->website_link }}" target="_blank" >{{ $business->website_link }}</a> </td>
                                    <td>{{ $business->any_offer }}</td>
                                    <td> <a href="{{asset('uploads/business_visiting_cards/'.$business->document)}}" target="_blank"><i class="fa fa-paperclip"></i></a></td>
                                </tr>
                                @php
                                $sr++;
                                @endphp
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script>
    function updateStatus(status) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ url("admin/updateBusinessStatus") }}',
            type: "POST",
            data: {
                status: status
            },
            // dataType: 'json',
            success: function(result) {
                if(result == "success") {
                    alert('Status updated successfully');
                }
                else {
                    alert('Status not updated');
                }
            }
        });
    }
</script>

@endsection