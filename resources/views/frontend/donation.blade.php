@extends('layouts.master')

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1  style="text-align: center"><b>Donation</b></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Donation</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="well-box">
                    <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                    <form action="{{ route('donationStore') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label class="control-label" for="first"> Name <span class="required">*</span></label>
                            <input id="first" name="name" type="text" placeholder="Name" class="form-control input-md"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="first"> Father's Name <span class="required">*</span></label>
                            <input id="first" name="father_name" type="text" placeholder=" father Name" class="form-control input-md"
                                required>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
                            <input id="email" name="email" type="text" placeholder="E-Mail"
                                class="form-control input-md" required>
                        </div>
                        <div class="form-group">
                            <label class=" control-label" for="phone">Phone <span class="required">*</span></label>
                            <input id="phone" name="phone" type="number" placeholder="Phone"
                                class="form-control input-md" required>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class=" control-label" for="phone">Donation Amount <span class="required">*</span></label>
                                <input id="donation" name="donation" type="number" placeholder="₹"
                                    class="form-control input-md" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Donation Type</label>
                                <select class="form-control select2" id="donation_type" name="donation_type">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value="cheque" @if (old('cheque')=='cheque' ) selected="selected" @endif>
                                        Cheque</option>
                                    <option value="cash" @if (old('cash')=='cash' ) selected="selected"
                                        @endif>Cash</option>
                                    <option value="upi" @if (old('upi')=='upi' )
                                        selected="selected" @endif>UPI</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="  control-label" for="message">Address</label>
                            <textarea class="form-control" rows="6" id="address"
                                name="address">Fill your Address</textarea>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <button id="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 contact-info">
                <div class="well-box">
                    <h2>QR Payment</h2>
                    {{-- <h4>Office Name</h4> --}}
                    <img style="width: 150px; " src="{{ asset('frontend_assets/images/directory.png') }}">
                    {{-- <ul class="listnone">
                        <li class="address">
                            <p><i class="fa fa-envelope"></i>Santosh Sahu </p>
                            <p><i class="fa fa-map-marker"></i>1/9 , amber complex , MP nagar zone 2 bhopal mp 462011,</p>
                            <p><i class="fa fa-phone"></i>Phone - 7725004000</p>
                            <p><i class="fa fa-whatsapp"></i> Whatsaap - 7725004000</p>
                            <p><i class="fa fa-envelope"></i>gmail</p>
                        </li>
                    </ul> --}}
                    <hr />

                </div>
            </div>
            {{-- <div class="col-md-6 contact-info">
                <div class="well-box">
                    <h2>केंद्रीय कार्यालय </h2>
                    <h4>Office Name</h4>
                    <ul class="listnone">
                        <li class="address">
                            <p><i class="fa fa-map-marker"></i>बी-40, भूतनाथ मार्केट इन्दिरा नगर, लखनऊ</p>
                            <p><i class="fa fa-phone"></i>Phone - 9415882452, 8299571376</p>
                            
                        </li>
                    </ul>
                    <hr />
                    
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection