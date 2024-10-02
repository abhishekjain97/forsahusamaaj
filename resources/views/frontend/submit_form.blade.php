@extends('layouts.master')

@section('content')
    <br><br>
    <main class="page_main_wrapper">
        <div class="container">
            <div class="row row-m">
                <div class="col-sm-12 main-content col-p">
                    <div class="theiaStickySidebar">
                        <!-- START CONTACT FORM AREA -->
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error') }}
                            </div>

                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible alert-block" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    <li> {{ session()->get('success') }}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="contact_form_inner">
                            <div class="panel_inner">
                                <div class="panel_header">
                                    <h4><strong>{{ $title }} Submit Form</strong></h4>
                                </div>
                                <div class="panel_body">
                                    <form class="comment-form" action="{{ url('submit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Full name*</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Your name*" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="email">Email*</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="email" value="{{ old('email') }}" name="email"
                                                        placeholder="Your email address here">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Mobile</label>
                                                    <input type="text" class="form-control" value="{{ old('mobile') }}" name="mobile"
                                                        placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="email">{{ $title }} Title</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                                        placeholder="title">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>{{ $title }} Category</label>
                                                <select class="form-control select2" name="category" style="width: 100%;"
                                                    id="sub-menu">
                                                    <option value=" " selected="selected" disabled>Select Category</option>
                                                    @foreach ($categories as $categorie)
                                                        <option value=" {{ $categorie->name }} ">{{ $categorie->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Choose Country</label>
                                                <select class="form-control select2" name="country" style="width: 100%;"
                                                    id="sub-menu">
                                                    <option value=" " selected="selected" disabled>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value=" {{ $country->name }} ">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Image <span style="color: black">(only JPEG & PNG files - Max
                                                            2MB)</span></label>
                                                    <input type="file" class="form-control"  name="image"
                                                        placeholder="Mobile">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Doc <span style="color: black">(upload only txt,doc,docx,pdf file - Max
                                                        Size: 4MB)</span></label>
                                                <div class="form-group">
                                                    <input type="file" class="form-control" name="doc">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Video Link </label>
                                                    <input type="text" class="form-control" value="{{ old('videolink') }}" name="videolink"
                                                        placeholder="Video Link">
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <button class="btn btn-news">Submit</button>
                                                </div>
                                            </div>
                                        </div>



                                        <br><br>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- END OF CONTACT FORM AREA -->
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection