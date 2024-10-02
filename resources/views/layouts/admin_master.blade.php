<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Custom Css -->
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/custom.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/croppie.css') }}">
    <style>
        .select2-container .select2-selection--single {
            height: 36px;
        }


        .team-pic img {
            border-radius: 100%;
            height: 200px;
            width: 200px;
            margin: 0 auto;
            border: 5px solid #eaeaea;
            filter: grayscale(0%);
            -webkit-filter: grayscale(0%);
            filter: none;
            -webkit-transition: all .6s ease
        }

        .text-left {
            text-align: left;
        }

        label.control-label {
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            color: #706a68;
            font-weight: normal;
        }

        .text-left .control-label {
            font-weight: bold;
        }

        #loadDetails .row {
            padding: 0px 0 5px 0px;
        }
    </style>






</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        @if ($userProfile->profile == null)
                        <img src="{{ asset('/admin_assets/dist/img/profiledefault.png') }}" id="headerimg"
                            class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{ asset('/admin_assets/dist/img/' . $userProfile->profile) }}" id="headerimg"
                            class="img-circle elevation-2" alt="User Image">
                        @endif


                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <div class="dropdown-divider"></div>
                        <a href="{{ url('admin/profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile</a>

                        <div class="dropdown-divider"></div>
                        <a href="{{ url('admin/change_password') }}" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i> Change Password

                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i
                                class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/dashboard') }}" class="brand-link">
                @if ($userProfile->profile == null)
                <img src="{{ asset('/admin_assets/dist/img/profiledefault.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                @else
                <img src="{{ asset('/admin_assets/dist/img/' . $userProfile->profile) }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                @endif

                <span class="brand-text font-weight-light">{{ $userProfile->name }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                        <li class="nav-item has-treeview">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage Team Menu</p>
                            </a>

                        </li>


                        <li class="nav-item has-treeview">
                            <a href="{{ route('businessdirectory.index') }}" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>Business Directory Category</p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('businessdirectorysubcategory.index') }}" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>Business Directory Sub Category</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('team.index') }}" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>Manage Team Members</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Blogs
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('blog.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Blog</p>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('event.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Manage Events</p>
                            </a>
                        </li>
						
						
						<li class="nav-item">
                            <a href="{{ route('newsbroadcast.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Manage News</p>
                            </a>
                        </li>
						
						<li class="nav-item">
                            <a href="{{ route('publication.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Manage Publication</p>
                            </a>
                        </li>
						
						<li class="nav-item">
                            <a href="{{ route('careercounselling.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Manage Career Counselling</p>
                            </a>
                        </li>
						
						
						<li class="nav-item">
                            <a href="{{ route('jobportal.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Manage Job Portal</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    About Us
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sahusamaajsanghathan.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Sanghathan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('famouspersonlist.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Famous Person</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hamaregaurav.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Hamare Gaurav</p>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="{{ route('mandirdharamshala.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Mandir Dharamshala</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Mahotsav
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('mahotsav.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Mahotsav</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    WorkShop 

                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('workshop.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create WorkShop</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Karma
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('karma.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Karma</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gallery.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Gallery</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('addimageindex') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Add Image in Gallery</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage About
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('aboutusindex') }}" class="nav-link">
                                        <i class="nav-icon fas fa-info"></i>
                                        <p>Add Sahu Samaj About Us</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('koriindex') }}" class="nav-link">
                                        <i class="nav-icon fas fa-info"></i>
                                        <p>Sahu Samaj</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('greatmanindex') }}" class="nav-link">
                                        <i class="nav-icon fas fa-info"></i>
                                        <p>महापुरुष </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Help Desk
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview">
                                    <a href="{{ route('helpdeskcategory.index') }}" class="nav-link">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Help Desk Category</p>
                                    </a>

                                </li>

                                <li class="nav-item has-treeview">
                                    <a href="{{ route('helpdesk.index') }}" class="nav-link">
                                        <i class="fa fa-circle nav-icon"></i>
                                        <p>Help Desk</p>
                                    </a>

                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('marriageindex') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Marriage Register Users</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Directories
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('memberindex') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Member Directory</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('businessindex') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Business Directory</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('exclusiveindex') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Exclusive Directory</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Services
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('marathon') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Marathon</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('runforveerangana') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Run For Veerangana</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('exclusiveindex') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Choching Classes</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('mahasamparkindex') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Mahasampark Abhiyan</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ url('/admin/banner/create') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage Banner</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('advertisingindex') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage Advertising</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Volunteer
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('volunteer.create') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Create Volunteer</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('volunteer.index') }}" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>Volunteer</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('businesspromotionindex') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Business Promotions</p>
                            </a>

                        </li>

                     
                        <li class="nav-item has-treeview">
                            <a href="{{ route('donation') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage Donations</p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('contactUs') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage ContactUs</p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('sms') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Manage SMS</p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ route('websiteusers') }}" class="nav-link">
                                <i class="fa fa-bars nav-icon"></i>
                                <p>Website Users</p>
                            </a>

                        </li>


                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Banner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/banner/create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Index Page Banner</p>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/subcategory') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>****</p>
                            </a>
                        </li>

                    </ul>
                    </li> --}}

                    {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Events
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/alleventcategories') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Events Category</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('event.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Events</p>
                        </a>
                    </li>

                    </ul>
                    </li> --}}

                    {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Manage Sub-Sub Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/admin/sub-sub-category/create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Sub-Sub Category</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/subcategory') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Sub-Sub Category</p>
                        </a>
                    </li>

                    </ul>
                    </li> --}}
                    {{-- 
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Manage Banner
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('banner.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Banner</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('banner.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Banner</p>
                        </a>
                    </li>

                    </ul>
                    </li> --}}
                    {{-- <li class="nav-item">
                            <a href="{{ url('/admin/orders') }}" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>Orders</p>
                    </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                            <a href="{{ url('admin/registerusers') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Register Users</p>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/wholesaleproduct') }}" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>Whole Sale</p>
                        </a>
                    </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> @yield('title')</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
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
            </div>


            @yield('content')


        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; @php echo date('Y') @endphp <a href=" @php
                url()->full();
            @endphp ">Sahu Samaj</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>


    </div>


    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('admin_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('admin_assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->

    <!-- JQVMap -->
    {{-- <script src="{{ url('admin_assets/plugins/jqvmap/jquery.vmap.min.js') }}">
    </script>
    <script src="{{ url('admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ url('admin_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('admin_assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ url('admin_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin_assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('admin_assets/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admin_assets/dist/js/demo.js') }}"></script>


    <!-- Select2 -->
    <script src="{{ url('admin_assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ url('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_assets/dist/js/custom.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/ckfinder/ckfinder.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".tokenizationSelect2").select2({
                placeholder: "Enter Size", //placeholder
                tags: true,
                tokenSeparators: [','],
                theme: 'bootstrap4'

            });

            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });

            // $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
            //     $("#success-alert").slideUp(500);
            // });

        });
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

        function ImageChange(input) {



            $('#loaderShow').css('display', 'block');
            if (input.files && input.files[0]) {
                // if value is images
                var file = input.files[0].name;
                var ext = file.split(".");
                ext = ext[ext.length - 1].toLowerCase();
                var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "gif"];
                var exactSize = getFileSize(input.files[0].size);
                var lastextType = exactSize.substr(exactSize.length - 2);
                var res = exactSize.split(".");
                var kbcheck = '';
                if (jQuery.isEmptyObject(res[1]) != true) {
                    kbcheck = res[1].split("&");
                }
                if (lastextType == 'KB') {
                    var res = res[0];
                } else if (lastextType == 'MB') {
                    var res = res[0] * 1024;
                    var res = +(res) + + +(kbcheck[0]);
                } else {
                    var res = (res[0] * 1024) * 1024;
                }
                if (res > 5000) {
                    alert('!Oops file size to larger. can\'t be upload more than 5 MB');
                    deletefile();
                }
                if ($.inArray(ext, arrayExtensions) == -1) {
                    console.log(res);
                } else {
                    var reader = new FileReader();
                    var image = '';
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                        var exactSize = getFileSize(input.files[0].size);
                        $('#displayImagesShow').html(
                            '<div style="border: 2px solid #dedadad9;padding: 5px;width: 160px;"><img id="blah" src="' +
                            e.target.result +
                            '" alt="your image" width="100%" height="100" /><div id="myProgress"></div><p id="deleteFile" style="margin-top:0;margin-bottom:0;"><span><span id="message" style="color:green;">Success</span><i class="fa fa-trash" onclick="deletefile()" aria-hidden="true" style="color:green;float:right;margin-top: 4px;"></i></span></p><div id="myBar" style="background-color:green;width:100%;height:10px"></div></div>'
                        );
                        $('input[name="sessionFileSize"]').val(exactSize);
                        move();
                        $('#displayImagesShow').css('display', 'block');
                        $('#showFile').css('display', 'block');
                        $('#displayError3').css('display', 'none');
                        // console.log(e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }

        function getFileSize(videoSize) {
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
                i = 0;
            while (videoSize > 900) {
                videoSize /= 1024;
                i++;
            }
            return exactSize = (Math.round(videoSize * 100) / 100) + '&nbsp;' + fSExt[i];
        }

        function deletefile() {
            var msg = confirm('Are you sure want to delete?');
            if (msg == true) {
                $("#thumbnail_file").val(null);
                $("#thumbnail").val(null);
                $("#profile_pic").val(null);
                $("#displayImagesShow").hide();
            }
            // var sessionImage = "";  
        }


        function move() {
            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 10);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    $('#message').text('Success');
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        }

    </script>

    <script>
        // CKEDITOR.replace('short_description');
        $(document).ready(function() {
            var editor = CKEDITOR.replace('description', {
                height: 350,
                filebrowserUploadUrl: '{{route('upload', ['_token' => csrf_token() ])}}',
                filebrowserUploadMethod: "form",
	            // filebrowserUploadUrl: "form"
            });
            // CKFinder.setupCKEditor( editor );
            $('.select2').select2();

            /* Get State*/
            $('#country-dropdown').on('change', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: '{{ url("admin/get-states-by-country") }}',
                    type: "POST",
                    data: {
                        country_id: country_id

                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html('<option disabled>Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                       

                    }
                });
            });

            /*Get Sub Sub Menu*/

            $("#help_desk_category").on('change',function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var plan = this.value;
                $("#help_desk_plan").html('');

                $.ajax({
                    url: '{{ url("admin/help_desk_plan") }}',
                    type: "POST",
                    data: {
                        plan: plan

                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#help_desk_plan').html('<option disabled>Select Sub-Sub Menu</option>');
                        $.each(result, function(key, value) {
                            $("#help_desk_plan").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                     
                    }
                });
                
            });

            $(".js-example-tokenizer").select2({
                    tags: true,
                    tokenSeparators: [',']
                })


                var getMenuId = document.getElementById("sub-menu").value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var sub_menu_id = getMenuId;

                $("#sub-sub-menu").html('');

                $.ajax({
                    url: '{{ url("admin/get-sub-sub-menu") }}',
                    type: "POST",
                    data: {
                        sub_menu_id: sub_menu_id

                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#sub-sub-menu').html('<option disabled>Select Sub-Sub Menu</option>');
                        $.each(result.subsubmenu, function(key, value) {
                            $("#sub-sub-menu").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        // console.log(result);
                       

                    }
                });


                var countryId = document.getElementById("country-dropdown").value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var country_id = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: '{{ url("admin/get-states-by-country") }}',
                    type: "POST",
                    data: {
                        country_id: countryId

                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dropdown').html('<option disabled>Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                       

                    }
                });

                
        });

    </script>

    <script>
        $("#state_id").change(function(e) {
            var state_id = document.getElementById("state_id").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var state_id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: '{{ url("get-city-by-state") }}',
                type: "POST",
                data: {
                    state_id: state_id

                },
                dataType: 'json',
                success: function(result) {
                    $('#city-dropdown').html('<option disabled>Select City</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city-dropdown").append('<option value="' + value.id + '">' + value.city + '</option>');
                    });
                    

                }
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset('frontend_assets/js/croppie.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            $("#showPreview").hide();
            $("#loaderImg").hide();
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                 width:196,
                 height:196,
                 type:'circle' //circle
                },
                boundary:{
                 width:400,
                 height:350
                }
            });
        
          $('#insert_image').on('change', function(){
                $('.crop_image').attr('disabled', false)
                $("#loaderImg").hide();
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            reader.readAsDataURL(this.files[0]);
            $('#insertimageModal').modal('show');
          });
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
        
          $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
            }).then(function(response){
                $("#loaderImg").show();
                $('.crop_image').attr('disabled', true)
                $.ajax({
                    url:'{{route("teamcrop")}}',
                    type:'POST',
                    data:{"image":response},
                    dataType:'JSON',
                    success:function(data){
                        $('#insertimageModal').modal('hide');
                      
    
                        if(data.success) {
                            console.log(data)
                            $('#insertimageModal').modal('hide');
                            $('#imageName').val(data.result);
                            load_images(data.result);
                            // alert(data.result)
                            $("#imageSuccess").html("Image uploaded successfully");
                            $('#insert_image').val("");
                            $("#showPreview").show();
                        } else {
                            alert("Image not uploaded, Try again.");
                        }
                        $('.crop_image').attr('disabled', false)
                        $("#loaderImg").hide();
                    }
                })
            });
          });
        
          function load_images(imageName)
          {
                $("#imagePreview").html('<img src="{{(asset('uploads/team'))}}/'+imageName+'" class="img-thumbnail" />');
          }
        });
        function loadImagePreview() {
            $('#imagePreviewModel').modal('show');
        }
    </script>
</body>

</html>