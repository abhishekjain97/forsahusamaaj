@extends('layouts.master')

@section('content')
<style>
    .range_container {
  display: flex;
  flex-direction: column;
  /* width: 20%; */
  /* margin: 100px auto; */
}

.sliders_control {
  position: relative;
  z-index: 9999;
  /* min-height: 50px; */
}
.form_control_container__time{
    color:white;
    font-size:16px;
}
.form_control {
  position: relative;
  display: flex;
  justify-content: space-between;
  font-size: 24px;
  color: #635a5a;
  margin-top:10px
}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  pointer-events: all;
  width: 24px;
  height: 24px;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 0 0 1px #C6C6C6;
  cursor: pointer;
}

input[type=range]::-moz-range-thumb {
  -webkit-appearance: none;
  pointer-events: all;
  width: 24px;
  height: 24px;
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0 0 0 1px #C6C6C6;
  cursor: pointer;  
}

input[type=range]::-webkit-slider-thumb:hover {
  background: #f7f7f7;
}

input[type=range]::-webkit-slider-thumb:active {
  box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
  -webkit-box-shadow: inset 0 0 3px #387bbe, 0 0 9px #387bbe;
}

input[type="number"] {
  color: #8a8383;
  width: 50px;
  height: 30px;
  font-size: 20px;
  border: none;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  
   opacity: 1;
}

input[type="range"] {
  -webkit-appearance: none; 
  appearance: none;
  height: 2px;
  width: 100%;
  position: absolute;
  background-color: #C6C6C6;
  pointer-events: none;
}

#fromSlider {
  height: 0;
  z-index: 1;
}

/* loader style start */
.loading {
  height: 0;
  width: 0;
  padding: 15px;
  border: 6px solid red;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 999;
}

@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
}
/* loader style end */
</style>
<div class="loading" style="display:none"></div>
<div class="slider-bg">
    <div id="slider-single" class="owl-carousel owl-theme slider">
        <div class="item"><img src="{{asset('frontend_assets/images/marriage.jpg')}}" alt="Sahu Matrimonial"></div>
    </div>
    <div class="find-section">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 finder-block">
                    <div class="finder-caption">
                        <!-- <h1>Quick search</h1> -->
                        <!-- <p>Over <strong>1200+ Members </strong>have already registered</p> -->
                    </div>
                    <div class="finderform">
                        <form action="{{route('advancedsearch')}}" method="GET">
                            @csrf
                            <div class="row">
                                <h2 style="color:#45feff;font-weight: bold;">Quick search</h2>
                                <div class="col-md-3 form-group text-left">
                                    <label>Search For</label>
                                    <select name="searchFor" class="form-control">
                                        <option value="" selected>Select Search for</option>
                                        <option value="female">Bride</option>
                                        <option value="male">Groom</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group text-left">
                                <div class="range_container">
    <div class="sliders_control">
       <input id="fromSlider" type="range" value="10" min="18" max="45"/>
       <input id="toSlider" type="range" value="30" min="18" max="60"/>
    </div>
    <div class="form_control">
      <div class="form_control_container">
          <div class="form_control_container__time">Min Age</div>
          <input class="form_control_container__time__input" type="number" id="fromInput" value="10" min="18" max="45"/>
        </div>
        <div class="form_control_container">
          <div class="form_control_container__time">Max Age</div>
          <input class="form_control_container__time__input" type="number" id="toInput" value="30" min="18" max="60"/>
        </div>
    </div>
</div>    
                                <!-- <label>Age</label>
                                    <select name="age" class="form-control">
                                        <option value="" selected>Select Age</option>
                                        <option value="18-22">18 years - 22 years</option>
                                        <option value="22-26">22 years - 26 years</option>
                                        <option value="26-30">26 years - 30 years</option>
                                        <option value="30-34">30 years - 34 years</option>
                                        <option value="34-38">34 years - 38 years</option>
                                        <option value="38-42">38 years - 42 years</option>
                                        <option value="42">Above 42 years</option>
                                    </select> -->
                                </div>
                                <div class="col-md-3 form-group text-left">
                                    <label>Min Height</label>
                                    <select name="height" class="form-control">
                                        <option value="" selected>Select Height</option>
                                        <option value="4ft 5in">4ft 5in</option>
                                        <option value="4ft 6in">4ft 6in</option>
                                        <option value="4ft 7in">4ft 7in</option>
                                        <option value="4ft 8in">4ft 8in</option>
                                        <option value="4ft 9in">4ft 9in</option>
                                        <option value="4ft 10in">4ft 10in</option>
                                        <option value="4ft 11in">4ft 11in</option>
                                        <option value="5ft">5ft</option>
                                        <option value="5ft 1in">5ft 1in</option>
                                        <option value="5ft 2in">5ft 2in</option>
                                        <option value="5ft 3in">5ft 3in</option>
                                        <option value="5ft 4in">5ft 4in</option>
                                        <option value="5ft 5in">5ft 5in</option>
                                        <option value="5ft 6in">5ft 6in</option>
                                        <option value="5ft 7in">5ft 7in</option>
                                        <option value="5ft 8in">5ft 8in</option>
                                        <option value="5ft 9in">5ft 9in</option>
                                        <option value="5ft 10in">5ft 10in</option>
                                        <option value="5ft 11in">5ft 11in</option>
                                        <option value="6ft">6ft</option>
                                        <option value="6ft 1in">6ft 1in</option>
                                        <option value="6ft 2in">6ft 2in</option>
                                        <option value="6ft 3in">6ft 3in</option>
                                        <option value="6ft 4in">6ft 4in</option>
                                        <option value="6ft 5in">6ft 5in</option>
                                        <option value="6ft 6in">6ft 6in</option>
                                        <option value="6ft 7in">6ft 7in</option>
                                        <option value="6ft 8in">6ft 8in</option>
                                        <option value="6ft 9in">6ft 9in</option>
                                        <option value="6ft 10in">6ft 10in</option>
                                        <option value="6ft 11in">6ft 11in</option>
                                        <option value="7ft">7ft</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group text-left">
                                <label>Max Height</label>
                                    <select name="height" class="form-control">
                                        <option value="" selected>Select Height</option>
                                        <option value="4ft 5in">4ft 5in</option>
                                        <option value="4ft 6in">4ft 6in</option>
                                        <option value="4ft 7in">4ft 7in</option>
                                        <option value="4ft 8in">4ft 8in</option>
                                        <option value="4ft 9in">4ft 9in</option>
                                        <option value="4ft 10in">4ft 10in</option>
                                        <option value="4ft 11in">4ft 11in</option>
                                        <option value="5ft">5ft</option>
                                        <option value="5ft 1in">5ft 1in</option>
                                        <option value="5ft 2in">5ft 2in</option>
                                        <option value="5ft 3in">5ft 3in</option>
                                        <option value="5ft 4in">5ft 4in</option>
                                        <option value="5ft 5in">5ft 5in</option>
                                        <option value="5ft 6in">5ft 6in</option>
                                        <option value="5ft 7in">5ft 7in</option>
                                        <option value="5ft 8in">5ft 8in</option>
                                        <option value="5ft 9in">5ft 9in</option>
                                        <option value="5ft 10in">5ft 10in</option>
                                        <option value="5ft 11in">5ft 11in</option>
                                        <option value="6ft">6ft</option>
                                        <option value="6ft 1in">6ft 1in</option>
                                        <option value="6ft 2in">6ft 2in</option>
                                        <option value="6ft 3in">6ft 3in</option>
                                        <option value="6ft 4in">6ft 4in</option>
                                        <option value="6ft 5in">6ft 5in</option>
                                        <option value="6ft 6in">6ft 6in</option>
                                        <option value="6ft 7in">6ft 7in</option>
                                        <option value="6ft 8in">6ft 8in</option>
                                        <option value="6ft 9in">6ft 9in</option>
                                        <option value="6ft 10in">6ft 10in</option>
                                        <option value="6ft 11in">6ft 11in</option>
                                        <option value="7ft">7ft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt10">
                            <div class="col-md-2 form-group text-left">
                                    <label>Marital Status</label>
                                    <select class="form-control" id="maritalStatus" name="maritalStatus">
                                        <option value="" selected>Select</option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Awaiting Divorce">Awaiting Divorce</option>
                                        <option value="Annulled">Annulled</option>
                                        <option value="Widower">Widower</option>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group text-left">
                                    <label>Income From </label>
                                    <div class=" form-inline">
                                        <select  class="form-control" name="income">
                                            <option value="" selected disabled>Select Income</option>
                                            <option value="0">Rs. 0</option>
                                            <option value="100000">Rs.1 Lakh</option>
                                            <option value="200000">Rs.2 Lakh</option>
                                            <option value="300000">Rs.3 Lakh</option>
                                            <option value="400000">Rs.4 Lakh</option>
                                            <option value="500000">Rs.5 Lakh</option>
                                            <option value="750000">Rs.7.5 Lakh</option>
                                            <option value="1000000">Rs.10 Lakh</option>
                                            <option value="1500000">Rs.15 Lakh</option>
                                            <option value="2000000">Rs.20 Lakh</option>
                                            <option value="2500000">Rs.25 Lakh</option>
                                            <option value="3500000">Rs.35 Lakh</option>
                                            <option value="5000000">Rs.50 Lakh</option>
                                            <option value="7000000">Rs.70 Lakh</option>
                                            <option value="10000000">Rs.1 Crore</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group text-left">
                                    <label>Income To</label>
                                    <div class=" form-inline">
                                        <select  class="form-control" name="income1">
                                            <option value="" selected disabled>Select Income</option>
                                            <option value="100000">Rs.1 Lakh</option>
                                            <option value="200000">Rs.2 Lakh</option>
                                            <option value="300000">Rs.3 Lakh</option>
                                            <option value="400000">Rs.4 Lakh</option>
                                            <option value="500000">Rs.5 Lakh</option>
                                            <option value="750000">Rs.7.5 Lakh</option>
                                            <option value="1000000">Rs.10 Lakh</option>
                                            <option value="1500000">Rs.15 Lakh</option>
                                            <option value="2000000">Rs.20 Lakh</option>
                                            <option value="2500000">Rs.25 Lakh</option>
                                            <option value="3500000">Rs.35 Lakh</option>
                                            <option value="5000000">Rs.50 Lakh</option>
                                            <option value="7000000">Rs.70 Lakh</option>
                                            <option value="10000000">Rs.1 Crore</option>
                                            <option value="100000000">and above</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-3 form-group text-left">
                              <label>State</label>
                                <select class="form-control" id="state_id">
                                    <option name="">-Select State-</option>
                                    @foreach ($states as $state)
                                    <option name="{{$state->name}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="col-md-3 form-group text-left ">
                                    <label>Pincode/City </label>
                                        <div class="">
                                        <select class='form-control result_city' style="display:none;"
                                         id='city_id' >
                                        
                                            </select>
                                      <input name="cityPincode" class="form-control result_input" value=""
                                        placeholder="Enter Pincode/City" />
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row mt10">
                                
                                <div class="form-group col-md-4">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>&nbsp;</label>
                                    <a href="{{route('marriage.create')}}" class="btn btn-default btn-block">Free
                                        Register Now</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Find search section-->
</div>
<!-- slider end-->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Sahu matrimony</li>
                </ol>
            </div>
            <div class="col-md-6">
                <div style="float:right">
                    <!--<a href="home/contactus" class="btn btn-default btn-xs1">Enquiry Us</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h1>Most Viewed Profile</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt10">
                        @foreach ($persons as $person)
                        <div class="col-md-3 vendor-box">
                            <div class="vendor-image">
                                <a href="#"><img style="width:280px"
                                        src="{{asset('/uploads/profileimage/'.$person->profile_image)}}"
                                        alt="wedding venue" class="img-responsive"></a>
                                <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                            </div>
                            <div class="vendor-detail">
                                <div class="caption">
                                    <h2 class="title">{{$person->user_name}}</h2>
                                    <p class="location"> {{$person->city}}</p>
                                    <p class="location">{{$person->age}} Years / {{$person->height}}</p>
                                    <p class="location"> {{$person->occupation}}</p>
                                    <!-- <p class="location"> Software Developer </p> -->
                                </div>
                                <div class="vendor-price">
                                    <a class="price" href="{{route('userdetail',$person->id)}}">View Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title mb20 text-center">
                                <h1>Why Sahu Samaj Matrimonial</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="well-white text-center faq-block pinside20">
                                <div class="feature-icon"><i class="icon-group icon-size-60 icon-default"></i></div>
                                <h3><a href="#" class="title">100% Verified Profiles</a></h3>
                                <!-- <p> We can write some metter about Members Directory </p> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well-white text-center faq-block pinside20">
                                <div class="feature-icon"> <i
                                        class="icon-heart-shaped-padlock icon-size-60 icon-default"></i></div>
                                <h3><a href="#" class="title">Verification by Personal Visit</a></h3>
                                <!-- <p> We can write some metter about Members Directory </p> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well-white text-center faq-block pinside20">
                                <div class="feature-icon"><i
                                        class="icon-newly-married-couple icon-size-60 icon-default"></i></div>
                                <h3><a href="#" class="title">Specially Only for Sahu</a></h3>
                                <!-- <p> We can write some metter about Members Directory </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title mb20 text-center">
                                <h1>Matched by Sahu Samaj</h1>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="real-wedding-block mb30">
                                <!-- real wedding block -->
                                <div class="real-wedding-img">
                                    <a href="javascript:void(0)"><img
                                            src="{{asset('/uploads/profileimage/1624201993.png')}}"
                                            style="height:270px;width: 360px;" alt="" class="img-responsive"></a>
                                </div>
                                <div class="real-wedding-info well-box text-center">
                                    <h2 class="real-wedding-title"><a href="#" class="title">Name</a>
                                    </h2>
                                    <p class="real-wed-meta"><span class="wed-day-meta"><i
                                                class="icon-wedding-day icon-size-18"></i> 17 May 2019</span> <span
                                            class="wed-location-meta"> <i
                                                class="icon-wedding-location icon-size-18"></i>Bhopal</span> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="real-wedding-block mb30">
                                <!-- real wedding block -->
                                <div class="real-wedding-img">
                                    <a href="javascript:void(0)"><img
                                            src="{{asset('/uploads/profileimage/1624201993.png')}}"
                                            style="height:270px;width: 360px;" alt="" class="img-responsive"></a>
                                </div>
                                <div class="real-wedding-info well-box text-center">
                                    <h2 class="real-wedding-title"><a href="#" class="title">Name</a></h2>
                                    <p class="real-wed-meta"><span class="wed-day-meta"><i
                                                class="icon-wedding-day icon-size-18"></i> 19 feb 2018</span> <span
                                            class="wed-location-meta"> <i
                                                class="icon-wedding-location icon-size-18"></i>Bhopal</span> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="real-wedding-block mb30">
                                <!-- real wedding block -->
                                <div class="real-wedding-img">
                                    <a href="javascript:void(0)"><img
                                            src="{{asset('/uploads/profileimage/1624201993.png')}}"
                                            style="height:270px;width: 360px;" alt="" class="img-responsive"></a>
                                </div>
                                <div class="real-wedding-info well-box text-center">
                                    <h2 class="real-wedding-title"><a href="#" class="title">Name</a>
                                    </h2>
                                    <p class="real-wed-meta"><span class="wed-day-meta"><i
                                                class="icon-wedding-day icon-size-18"></i> 11 May 2019</span> <span
                                            class="wed-location-meta"> <i
                                                class="icon-wedding-location icon-size-18"></i>Satna</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                <div class="col-md-12 text-center"><a href="#" class="btn btn-default btn-lg">View All</a></div>
            </div>-->
                </div>
            </div>
        </div>
    </div>
    
    <script>


$("#state_id").on('change',function(){
    var getValue=$(this).val();
   
    $('.loading').show();
    $.get( "{{url('getCity')}}/"+getValue+"", function( data ) {
        $(".result_city" ).html(data).show();
        $(".result_input" ).hide();
        $('.loading').hide();
});
  });


  $("#city_id").on('change',function(){
    var getValue=$(this).val();
    $('.loading').show();
    if(getValue=='Other'){
        $(".result_input" ).show();
        $(".result_city" ).hide();
        $('.loading').hide();
    }else{
        $('.loading').hide();
    }

  });

        function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    if (from > to) {
        fromSlider.value = to;
        fromInput.value = to;
    } else {
        fromSlider.value = from;
    }
}
    
function controlToInput(toSlider, fromInput, toInput, controlSlider) {
    const [from, to] = getParsed(fromInput, toInput);
    fillSlider(fromInput, toInput, '#C6C6C6', '#25daa5', controlSlider);
    setToggleAccessible(toInput);
    if (from <= to) {
        toSlider.value = to;
        toInput.value = to;
    } else {
        toInput.value = from;
    }
}

function controlFromSlider(fromSlider, toSlider, fromInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  if (from > to) {
    fromSlider.value = to;
    fromInput.value = to;
  } else {
    fromInput.value = from;
  }
}

function controlToSlider(fromSlider, toSlider, toInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
  setToggleAccessible(toSlider);
  if (from <= to) {
    toSlider.value = to;
    toInput.value = to;
  } else {
    toInput.value = from;
    toSlider.value = from;
  }
}

function getParsed(currentFrom, currentTo) {
  const from = parseInt(currentFrom.value, 10);
  const to = parseInt(currentTo.value, 10);
  return [from, to];
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
    const rangeDistance = to.max-to.min;
    const fromPosition = from.value - to.min;
    const toPosition = to.value - to.min;
    controlSlider.style.background = `linear-gradient(
      to right,
      ${sliderColor} 0%,
      ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
      ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
      ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} 100%)`;
}

function setToggleAccessible(currentTarget) {
  const toSlider = document.querySelector('#toSlider');
  if (Number(currentTarget.value) <= 0 ) {
    toSlider.style.zIndex = 2;
  } else {
    toSlider.style.zIndex = 0;
  }
}

const fromSlider = document.querySelector('#fromSlider');
const toSlider = document.querySelector('#toSlider');
const fromInput = document.querySelector('#fromInput');
const toInput = document.querySelector('#toInput');
fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
setToggleAccessible(toSlider);

fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);

</script>
    @endsection