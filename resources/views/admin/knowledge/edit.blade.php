@extends('layouts.admin_master')
@section('title', 'Edit Knowledge')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('knowledge.index') }}" class="btn btn-success">All Knowledge</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('knowledge.update', $knowledge->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Sub Menu</label>
                                            <select class="form-control select2" onclick="editKnowledge()" name="sub_menu" placeholder="Sub Menu"
                                                style="width: 100%;" id="sub-menu">
                                                <option value=" " selected="selected" disabled>Select Sub Menu</option>
                                                @foreach ($subCats as $subCat)
                                                    <option value=" {{ $subCat->id }} " @if ($subCat->id == $knowledge->sub_menu_id)
                                                        {{ 'selected' }}
                                                @endif>{{ $subCat->name }}</option>
                                                @endforeach



                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Sub Sub Menu</label>
                                            <select class="form-control select2" onclick="editKnowledge()" name="sub_sub_menu" id="sub-sub-menu"
                                                placeholder="Sub Sub Menu" style="width: 100%;">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                value=" {{ $knowledge->title }}" placeholder="Enter Title">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Countey</label>
                                            <select class="form-control select2" name="country" placeholder="Countey"
                                                style="width: 100%;" id="country-dropdown">
                                                <option value=" " selected="selected" disabled>Select Countey</option>

                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if ($country->id == $knowledge->country)
                                                        {{ 'selected' }}
                                                @endif >{{ $country->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control select2" id="state-dropdown" name="state"
                                                placeholder="State" style="width: 100%;">


                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Business Category</label>
                                            <select class="form-control select2" name="business_category"
                                                placeholder="Business Category" style="width: 100%;">
                                                <option selected="selected" disabled>Select Business Category</option>
                                                <option value="Accessories">Accessories</option>
                                                <option value="Bags">Bags</option>
                                                <option value="Chemicals">Chemicals</option>
                                                <option value="Components">Components</option>
                                                <option value="Finished Leather">Finished Leather</option>
                                                <option value="Footwear">Footwear</option>
                                                <option value="Footwear Machines">Footwear Machines</option>
                                                <option value="Garments">Garments</option>
                                                <option value="Leather Goods">Leather Goods</option>
                                                <option value="Leather Goods Machines">Leather Goods Machines</option>
                                                <option value="Raw Hides">Raw Hides </option>
                                                <option value="Semi-Finished">Semi-Finished</option>
                                                <option value="Services">Services</option>
                                                <option value="Synthetic">Synthetic</option>
                                                <option value="Tanning Machines">Tanning Machines</option>
                                                <option value="Technology">Technology</option>
                                                <option value="Textile">Textile</option>
                                                <option value="Upholstery">Upholstery</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Is Featured</label> <br>
                                            <input type="radio" name="is_feature" @if ($knowledge->is_featured == 1) checked

                                            @endif value="1"> Yes
                                            <input type="radio" name="is_feature" @if ($knowledge->is_featured == 0) checked
                                            @endif value="0"> No
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Publish Date</label>
                                            <input type="date" class="form-control" name="publish_date"
                                                value="{{ $knowledge->publish_date }}">
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Short Description </label>
                                            <textarea class="form-control" placeholder="Short Description" rows="10"
                                                id="short_description"
                                                name="short_description">{{ $knowledge->short_desc }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            <textarea class="form-control" placeholder="Description" id="description"
                                                name="description"> {{ $knowledge->long_desc }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="news_image"
                                                        onchange="ImageChange(this,'1')">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                            <div id="displayImagesShow1" style="margin-top: 45px;"></div>




                                            @if ($knowledge->thubmnail != null)
                                                <div class="displayImagesShow" id="displayImagesShow"
                                                    style="margin-top: 5px;" accept="image/*">
                                                    <div class="" style="margin-top: 5px; display: block;">
                                                        <div style="border: 2px solid #dedada;padding: 5px;width: 40%;">
                                                            <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                alt="your image" width="100%" height="40%">
                                                            <p id="deleteFile" style="margin-top:0;margin-bottom:0;">
                                                                <span>
                                                                    <span id="message" style="color:green;">
                                                                        Success </span>
                                                                    <i class="fa fa-check" aria-hidden="true"
                                                                        style="color:green;float:right;margin-top: 4px;"></i>
                                                                </span>
                                                            </p>
                                                            <div id="myBar"
                                                                style="background-color: green; width: 100%; height: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="displayImagesShow" id="displayImagesShow"
                                                    style="margin-top: 5px;" accept="image/*"></div>
                                            @endif



                                        </div>
                                    </div>

                                </div>


                                <!--  META DESCRIPTIONS   -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tags
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            {{-- <input type="text" class="form-control "
                                                placeholder="Tags" name="tags" value="{{ old('tags') }}">
                                            --}}
                                            <select class="js-example-tags js-example-tokenizer form-control"
                                                multiple="multiple" name="tags[]" aria-hidden="true">
                                                @php
                                                $tags = explode(',',$knowledge->tags);

                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Meta Title
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            <input type="text" class="form-control" placeholder="Meta Title"
                                                name="meta_title" value="{{$knowledge->meta_title}}">
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Meta Keyword
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            {{-- <input type="text" class="form-control"
                                                placeholder="Meta Keyword" name="meta_keyword"
                                                value="{{ old('meta_keyword') }}"> --}}

                                            <select class="js-example-tags js-example-tokenizer form-control"
                                                multiple="multiple" name="meta_keyword[]" aria-hidden="true">
                                                @php
                                                $meta_keywords = explode(',',$knowledge->meta_keyword);

                                                @endphp
                                                @foreach ($meta_keywords as $meta_keyword)
                                                    <option value="{{ $meta_keyword }}" selected>{{ $meta_keyword }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Description
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            <textarea class="form-control"
                                                name="meta_description">{{$knowledge->meta_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Author
                                                <!-- <span class="err_color">*</span> -->
                                            </label>
                                            <input type="text" class="form-control" name="author"
                                                value="{{$knowledge->author}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
