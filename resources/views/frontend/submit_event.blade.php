@extends('layouts.master')

@section('content')

    <br>
    <main class="page_main_wrapper" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row row-m" style="transform: none;">
                <div class="col-sm-12 main-content col-p"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                    <!-- START CONTACT FORM AREA -->
                    <div class="contact_form_inner">
                        <div class="panel_inner">
                            <div class="panel_header">
                                <h4><strong></strong> Please enter your trade show information in the following form.
                                </h4>
                            </div>
                            <div class="panel_body">
                                <form action="{{ route('event.store') }}" class="comment-form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <label>Event Name* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}" placeholder="Enter Event Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Event Punchline* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="punchline"
                                                    value="{{ old('punchline') }}" placeholder="Enter Event Punchline">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Venue* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="venue" value="{{ old('venue') }}"
                                                    placeholder="Enter Venue Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Country* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="country" value="{{ old('country') }}"
                                                    placeholder="Enter Country">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>City* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="event_city" value="{{ old('event_city') }}"
                                                    placeholder="Enter City">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Start Date* <span class="err_color"></span> </label>
                                                <input type="date" class="form-control"  name="start_date"
                                                value="{{ old('start_date') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>End Date* <span class="err_color"></span> </label>
                                                <input type="date" class="form-control"  name="end_date"
                                                value="{{ old('end_date') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Category* </label>
                                                <select class="form-control" name="event_category">
                                                    <option value="">--Select Category-- </option>
                                                    @foreach ($eventCategories as $eventCategory)
                                                        <option value="{{ $eventCategory->id }}">
                                                            {{ $eventCategory->category_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Event Logo* <span> Only 200x200 pixels</span> </label>
                                                <input type="file" class="form-control" name="event_logo">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Banner  (1366x400 pixels)</label>
                                                <input type="file" class="form-control" name="banner">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Last Event Report (txt,doc,docx)</label>
                                                <input type="file" class="form-control" name="event_report">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Twitter Handle</label>
                                                <input type="text" class="form-control" name="twitter_link" value="{{ old('twitter_link') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Linkedin Link </label>
                                                <input type="text" class="form-control" name="linkedin_link" value="{{ old('linkedin_link') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Application Link</label>
                                                <input type="text" class="form-control" name="application_link" value="{{ old('application_link') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Event Description</label>
                                                <textarea class="form-control" name="event_description"
                                                    placeholder="Enter Description" rows="5">{{ old('event_description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Exhibitor Profile</label>
                                                <textarea class="form-control"  name="exhibitor_profile"
                                                    placeholder="Exhibitor Profile" rows="5">{{ old('exhibitor_profile') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Visitor Profile</label>
                                                <textarea class="form-control"  name="visiter_profile"
                                                    placeholder="Exhibitor Visitor Profile" rows="5">{{ old('visiter_profile') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Estimated Exhibitors</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="est_exhibitors" value="{{ old('est_exhibitors') }}"
                                                        placeholder="Estimated Exhibitors">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Estimated Visitors</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="est_visiter" value="{{ old('est_visiter') }}"
                                                        placeholder="Estimated Visitors">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Organiser Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="organiser_name" value="{{ old('organiser_name') }}"
                                                        placeholder="Organiser Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Contact Person Name* <span class="err_color"></span></label>
                                                <input type="text" class="form-control"  name="contact_persion"
                                                    value="{{ old('contact_persion') }}" placeholder="Enter The Contact Person Name*">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Company Name* <span class="err_color"></span></label>
                                                <input type="text" class="form-control"  name="company_name"
                                                    value="{{ old('company_name') }}" placeholder="Enter The Company Name*">
                                            </div>
                                        </div>



                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="number" onkeypress="if(this.value.length>9) return false;"
                                                    class="form-control" value="{{ old('phone_no') }}"  name="phone_no"
                                                    placeholder="Enter The Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Address* <span class="err_color"></span></label>
                                                <input type="text" class="form-control"  name="address" value="{{ old('address') }}"
                                                    placeholder="Enter The Address*">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Pincode* <span class="err_color"></span></label>
                                                <input type="text" class="form-control"  name="pin_code"
                                                    value="{{ old('pin_code') }}" placeholder="Enter The Pincode*">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>City* <span class="err_color"></span></label>
                                                <input type="text" class="form-control"  name="city" value="{{ old('city') }}"
                                                    placeholder="Enter The City* ">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Email* <span class="err_color"></span></label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                                    placeholder="Your email address here">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-news">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END OF CONTACT FORM AREA -->
                    <div class="resize-sensor"
                        style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div class="resize-sensor-expand"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div
                                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 497px; height: 1218px;">
                            </div>
                        </div>
                        <div class="resize-sensor-shrink"
                            style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--  <div class="panel_inner">
                                                        <div class="panel_body">
                                                            <div id="map"></div>
                                                        </div>
                                                    </div> -->
        </div>
    </main>

@endsection
