@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/card-layout.css') }}">

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Blogs</h1>
                </div>
            </div>
        </div> -->
        <div class="row well-box">
            <!-- <form action="{{route('searchmember')}}" method="GET" id="addMemDirForm" class="addMemDirForm">
                @csrf
                <div class="row">
                    
							
						<div class="col-md-3 form-group">
						    <label>Name</label>
                            <input id="input_name" name="firstName" class="form-control" value=""
                            placeholder="Enter Name" />
                        </div>
						
					    <div class="col-md-3 form-group">
						    <label>Country</label>
                            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="productCat" name="productCat" class="form-control select2">
                                <option value="" selected disabled>Select Country </option>
                                <option value="105">India</option>
                            </select>
							
						
                        </div>
                        <div class="col-md-2 form-group">
						<label>State</label>
                           
							<select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="state_id" required="" tabindex="-98"><option value="">Select State</option><option value="1">Andaman and Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadra and Nagar Haveli</option><option value="9">Daman and Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu and Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kenmore</option><option value="19">Kerala</option><option value="20">Lakshadweep</option><option value="21">Madhya Pradesh</option><option value="22">Maharashtra</option><option value="23">Manipur</option><option value="24">Meghalaya</option><option value="25">Mizoram</option><option value="26">Nagaland</option><option value="27">Narora</option><option value="28">Natwar</option><option value="29">Odisha</option><option value="30">Paschim Medinipur</option><option value="31">Pondicherry</option><option value="32">Punjab</option><option value="33">Rajasthan</option><option value="34">Sikkim</option><option value="35">Tamil Nadu</option><option value="36">Telangana</option><option value="37">Tripura</option><option value="38">Uttar Pradesh</option><option value="39">Uttarakhand</option><option value="40">Vaishali</option><option value="41">West Bengal</option></select>
							
							
							
                        </div>
                        <div class="col-md-2 form-group">
						<label>City</label>
                            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="city_id" required="" tabindex="-98"><option value="">Select City</option><option value="2071">Ajaigarh</option><option value="2072">Akoda</option><option value="2073">Akodia</option><option value="2074">Alampur</option><option value="2075">Alirajpur</option><option value="2076">Alot</option><option value="2077">Amanganj</option><option value="2078">Amarkantak</option><option value="2079">Amarpatan</option><option value="2080">Amarwara</option><option value="2081">Ambada</option><option value="2082">Ambah</option><option value="2083">Amla</option><option value="2085">Anjad</option><option value="2086">Antri</option><option value="2087">Anuppur</option><option value="2088">Aron</option><option value="2089">Ashoknagar</option><option value="2090">Ashta</option><option value="2091">Babai</option><option value="2092">Bada Malhera</option><option value="2093">Badagaon</option><option value="2094">Badagoan</option><option value="2095">Badarwas</option><option value="2096">Badawada</option><option value="2097">Badi</option><option value="2098">Badkuhi</option><option value="2099">Badnagar</option><option value="2100">Badnawar</option><option value="2101">Badod</option><option value="2102">Badoda</option><option value="2103">Badra</option><option value="2104">Bagh</option><option value="2105">Bagli</option><option value="2106">Baihar</option><option value="2107">Baikunthpur</option><option value="2108">Bakswaha</option><option value="2109">Balaghat</option><option value="2110">Baldeogarh</option><option value="2111">Bamaniya</option><option value="2112">Bamhani</option><option value="2113">Bamor</option><option value="2114">Bamora</option><option value="2115">Banda</option><option value="2116">Bangawan</option><option value="2117">Bansatar Kheda</option><option value="2118">Baraily</option><option value="2119">Barela</option><option value="2120">Barghat</option><option value="2121">Bargi</option><option value="2122">Barhi</option><option value="2123">Barigarh</option><option value="2124">Barwaha</option><option value="2125">Barwani</option><option value="2126">Basoda</option><option value="2127">Begamganj</option><option value="2128">Beohari</option><option value="2129">Berasia</option><option value="2130">Betma</option><option value="2131">Betul</option><option value="2132">Betul Bazar</option><option value="2133">Bhainsdehi</option><option value="2134">Bhamodi</option><option value="2135">Bhander</option><option value="2136">Bhanpura</option><option value="2137">Bharveli</option><option value="2138">Bhaurasa</option><option value="2139">Bhavra</option><option value="2140">Bhedaghat</option><option value="2141">Bhikangaon</option><option value="2142">Bhilakhedi</option><option value="2143">Bhind</option><option value="2144">Bhitarwar</option><option value="2145">Bhopal</option><option value="2146">Bhuibandh</option><option value="2147">Biaora</option><option value="2148">Bijawar</option><option value="2149">Bijeypur</option><option value="2150">Bijrauni</option><option value="2151">Bijuri</option><option value="2152">Bilaua</option><option value="2153">Bilpura</option><option value="2154">Bina Railway Colony</option><option value="2155">Bina-Etawa</option><option value="2156">Birsinghpur</option><option value="2157">Boda</option><option value="2158">Budhni</option><option value="2159">Burhanpur</option><option value="2160">Burhar</option><option value="2161">Chachaura Binaganj</option><option value="2162">Chakghat</option><option value="2163">Chandameta Butar</option><option value="2164">Chanderi</option><option value="2165">Chandia</option><option value="2166">Chandla</option><option value="2167">Chaurai Khas</option><option value="2168">Chhatarpur</option><option value="2169">Chhindwara</option><option value="2170">Chhota Chhindwara</option><option value="2171">Chichli</option><option value="2172">Chitrakut</option><option value="2173">Churhat</option><option value="2174">Daboh</option><option value="2175">Dabra</option><option value="2176">Damoh</option><option value="2177">Damua</option><option value="2178">Datia</option><option value="2179">Deodara</option><option value="2180">Deori</option><option value="2181">Deori Khas</option><option value="2182">Depalpur</option><option value="2183">Devendranagar</option><option value="2184">Devhara</option><option value="2185">Dewas</option><option value="2186">Dhamnod</option><option value="2187">Dhana</option><option value="2188">Dhanpuri</option><option value="2189">Dhar</option><option value="2190">Dharampuri</option><option value="2191">Dighawani</option><option value="2192">Diken</option><option value="2193">Dindori</option><option value="2194">Dola</option><option value="2195">Dumar Kachhar</option><option value="2196">Dungariya Chhapara</option><option value="2197">Gadarwara</option><option value="2198">Gairatganj</option><option value="2199">Gandhi Sagar Hydel Colony</option><option value="2200">Ganjbasoda</option><option value="2201">Garhakota</option><option value="2202">Garhi Malhara</option><option value="2203">Garoth</option><option value="2204">Gautapura</option><option value="2205">Ghansor</option><option value="2206">Ghuwara</option><option value="2207">Gogaon</option><option value="2208">Gogapur</option><option value="2209">Gohad</option><option value="2210">Gormi</option><option value="2211">Govindgarh</option><option value="2212">Guna</option><option value="2213">Gurh</option><option value="2214">Gwalior</option><option value="2215">Hanumana</option><option value="2216">Harda</option><option value="2217">Harpalpur</option><option value="2218">Harrai</option><option value="2219">Harsud</option><option value="2220">Hatod</option><option value="2221">Hatpipalya</option><option value="2222">Hatta</option><option value="2223">Hindoria</option><option value="2224">Hirapur</option><option value="2225">Hoshangabad</option><option value="2226">Ichhawar</option><option value="2227">Iklehra</option><option value="2228">Indergarh</option><option value="2229">Indore</option><option value="2230">Isagarh</option><option value="2231">Itarsi</option><option value="2232">Jabalpur</option><option value="2233">Jabalpur Cantonment</option><option value="2234">Jabalpur G.C.F</option><option value="2235">Jaisinghnagar</option><option value="2236">Jaithari</option><option value="2237">Jaitwara</option><option value="2238">Jamai</option><option value="2239">Jaora</option><option value="2240">Jatachhapar</option><option value="2241">Jatara</option><option value="2242">Jawad</option><option value="2243">Jawar</option><option value="2244">Jeronkhalsa</option><option value="2245">Jhabua</option><option value="2246">Jhundpura</option><option value="2247">Jiran</option><option value="2248">Jirapur</option><option value="2249">Jobat</option><option value="2250">Joura</option><option value="2251">Kailaras</option><option value="2252">Kaimur</option><option value="2253">Kakarhati</option><option value="2254">Kalichhapar</option><option value="2255">Kanad</option><option value="2256">Kannod</option><option value="2257">Kantaphod</option><option value="2258">Kareli</option><option value="2259">Karera</option><option value="2260">Kari</option><option value="2261">Karnawad</option><option value="2262">Karrapur</option><option value="2263">Kasrawad</option><option value="2264">Katangi</option><option value="2265">Katni</option><option value="2266">Kelhauri</option><option value="2267">Khachrod</option><option value="2268">Khajuraho</option><option value="2269">Khamaria</option><option value="2270">Khand</option><option value="2271">Khandwa</option><option value="2272">Khaniyadhana</option><option value="2273">Khargapur</option><option value="2274">Khargone</option><option value="2275">Khategaon</option><option value="2276">Khetia</option><option value="2277">Khilchipur</option><option value="2278">Khirkiya</option><option value="2279">Khujner</option><option value="2280">Khurai</option><option value="2281">Kolaras</option><option value="2282">Kotar</option><option value="2283">Kothi</option><option value="2284">Kotma</option><option value="2285">Kukshi</option><option value="2286">Kumbhraj</option><option value="2287">Kurwai</option><option value="2288">Lahar</option><option value="2289">Lakhnadon</option><option value="2290">Lateri</option><option value="2291">Laundi</option><option value="2292">Lidhora Khas</option><option value="2293">Lodhikheda</option><option value="2294">Loharda</option><option value="2295">Machalpur</option><option value="2296">Madhogarh</option><option value="2297">Maharajpur</option><option value="2298">Maheshwar</option><option value="2299">Mahidpur</option><option value="2300">Maihar</option><option value="2301">Majholi</option><option value="2302">Makronia</option><option value="2303">Maksi</option><option value="2304">Malaj Khand</option><option value="2305">Malanpur</option><option value="2306">Malhargarh</option><option value="2307">Manasa</option><option value="2308">Manawar</option><option value="2309">Mandav</option><option value="2310">Mandideep</option><option value="2311">Mandla</option><option value="2312">Mandleshwar</option><option value="2313">Mandsaur</option><option value="2314">Manegaon</option><option value="2315">Mangawan</option><option value="2316">Manglaya Sadak</option><option value="2317">Manpur</option><option value="2318">Mau</option><option value="2319">Mauganj</option><option value="2320">Meghnagar</option><option value="2321">Mehara Gaon</option><option value="2322">Mehgaon</option><option value="2323">Mhaugaon</option><option value="2324">Mhow</option><option value="2325">Mihona</option><option value="2326">Mohgaon</option><option value="2327">Morar</option><option value="2328">Morena</option><option value="2329">Morwa</option><option value="2330">Multai</option><option value="2331">Mundi</option><option value="2332">Mungaoli</option><option value="2333">Murwara</option><option value="2334">Nagda</option><option value="2335">Nagod</option><option value="2336">Nagri</option><option value="2337">Naigarhi</option><option value="2338">Nainpur</option><option value="2339">Nalkheda</option><option value="2340">Namli</option><option value="2341">Narayangarh</option><option value="2342">Narsimhapur</option><option value="2343">Narsingarh</option><option value="2344">Narsinghpur</option><option value="2345">Narwar</option><option value="2346">Nasrullaganj</option><option value="2347">Naudhia</option><option value="2348">Naugaon</option><option value="2349">Naurozabad</option><option value="2350">Neemuch</option><option value="2351">Nepa Nagar</option><option value="2352">Neuton Chikhli Kalan</option><option value="2353">Nimach</option><option value="2354">Niwari</option><option value="2355">Obedullaganj</option><option value="2356">Omkareshwar</option><option value="2357">Orachha</option><option value="2358">Ordinance Factory Itarsi</option><option value="2359">Pachmarhi</option><option value="2360">Pachmarhi Cantonment</option><option value="2361">Pachore</option><option value="2362">Palchorai</option><option value="2363">Palda</option><option value="2364">Palera</option><option value="2365">Pali</option><option value="2366">Panagar</option><option value="2367">Panara</option><option value="2368">Pandaria</option><option value="2369">Pandhana</option><option value="2370">Pandhurna</option><option value="2371">Panna</option><option value="2372">Pansemal</option><option value="2373">Parasia</option><option value="2374">Pasan</option><option value="2375">Patan</option><option value="2376">Patharia</option><option value="2377">Pawai</option><option value="2378">Petlawad</option><option value="2379">Phuph Kalan</option><option value="2380">Pichhore</option><option value="2381">Pipariya</option><option value="2382">Pipliya Mandi</option><option value="2383">Piploda</option><option value="2384">Pithampur</option><option value="2385">Polay Kalan</option><option value="2386">Porsa</option><option value="2387">Prithvipur</option><option value="2388">Raghogarh</option><option value="2389">Rahatgarh</option><option value="2390">Raisen</option><option value="2391">Rajakhedi</option><option value="2392">Rajgarh</option><option value="2393">Rajnagar</option><option value="2394">Rajpur</option><option value="2395">Rampur Baghelan</option><option value="2396">Rampur Naikin</option><option value="2397">Rampura</option><option value="2398">Ranapur</option><option value="2399">Ranipura</option><option value="2400">Ratangarh</option><option value="2401">Ratlam</option><option value="2402">Ratlam Kasba</option><option value="2403">Rau</option><option value="2404">Rehli</option><option value="2405">Rehti</option><option value="2406">Rewa</option><option value="2407">Sabalgarh</option><option value="2408">Sagar</option><option value="2409">Sagar Cantonment</option><option value="2410">Sailana</option><option value="2411">Sanawad</option><option value="2412">Sanchi</option><option value="2413">Sanwer</option><option value="2414">Sarangpur</option><option value="2415">Sardarpur</option><option value="2416">Sarni</option><option value="2417">Satai</option><option value="2418">Satna</option><option value="2419">Satwas</option><option value="2420">Sausar</option><option value="2421">Sehore</option><option value="2422">Semaria</option><option value="2423">Sendhwa</option><option value="2424">Seondha</option><option value="2425">Seoni</option><option value="2426">Seoni Malwa</option><option value="2427">Sethia</option><option value="2428">Shahdol</option><option value="2429">Shahgarh</option><option value="2430">Shahpur</option><option value="2431">Shahpura</option><option value="2432">Shajapur</option><option value="2433">Shamgarh</option><option value="2434">Sheopur</option><option value="2435">Shivpuri</option><option value="2436">Shujalpur</option><option value="2437">Sidhi</option><option value="2438">Sihora</option><option value="2439">Singolo</option><option value="2440">Singrauli</option><option value="2441">Sinhasa</option><option value="2442">Sirgora</option><option value="2443">Sirmaur</option><option value="2444">Sironj</option><option value="2445">Sitamau</option><option value="2446">Sohagpur</option><option value="2447">Sonkatch</option><option value="2448">Soyatkalan</option><option value="2449">Suhagi</option><option value="2450">Sultanpur</option><option value="2451">Susner</option><option value="2452">Suthaliya</option><option value="2453">Tal</option><option value="2454">Talen</option><option value="2455">Tarana</option><option value="2456">Taricharkalan</option><option value="2457">Tekanpur</option><option value="2458">Tendukheda</option><option value="2459">Teonthar</option><option value="2460">Thandia</option><option value="2461">Tikamgarh</option><option value="2462">Timarni</option><option value="2463">Tirodi</option><option value="2464">Udaipura</option><option value="2465">Ujjain</option><option value="2466">Ukwa</option><option value="2467">Umaria</option><option value="2468">Unchahara</option><option value="2469">Unhel</option><option value="2470">Vehicle Factory Jabalpur</option><option value="2471">Vidisha</option><option value="2472">Vijayraghavgarh</option><option value="2473">Waraseoni</option></select>
							
                        </div>
						<div class="col-md-2 form-group">
						<label>.</label>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
						</div>
                </div>
                
                </div>
            </form> -->

            <div class="container mt-5">
                <div class="row">
                    @if(!empty($sanghathans))
                    @php $data = $sanghathans[0] @endphp

                    <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('mandirdharamshala') }}">
                                <!-- @csrf -->
                                <div class="card-body">
                                    <div class=" col-md-3">
                                        <select class="form-control" data-live-search="true" name="state_id"
                                            id="state_id" tabindex="-98">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->id}}">
                                                {{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" data-live-search="true" name="city_id"
                                            id="city-dropdown" tabindex="-98">
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" data-live-search="true" name="sanghanthantype"
                                            tabindex="-98">
                                            <option value="">Select Type</option>
                                            <option value="Dharmshala">
                                                Dharmshala</option>
                                            <option value="Mandir">
                                                Mandir</option>
                                            <option value="Both">
                                                Both</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Enter search title..."
                                            aria-label="Enter search title..." aria-describedby="button-search" />
                                    </div>

                                    <div class="col-md-2">

                                        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Categories widget-->
                        <!-- <div class="card mb-4">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">Web Design</a></li>
                                            <li><a href="#!">HTML</a></li>
                                            <li><a href="#!">Freebies</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">JavaScript</a></li>
                                            <li><a href="#!">CSS</a></li>
                                            <li><a href="#!">Tutorials</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Side widget-->
                        <!-- <div class="card mb-4">
                            <div class="card-header">Side Widget</div>
                            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                        </div> -->
                    </div>
                    <div class="col-lg-12">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{ $data->title }}</h1>
                                <h2 class="card-tagline h4">
                                    @if($data->website != '')
                                    <i class="fa fa-globe"></i> <a href="{{ $data->website }}" target="_blank">{{ $data->website }}</a>
                                    @endif
                                </h2>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2"><i class="fa fa-map-marker"></i> {{ $data->location }}</div>
                                <!-- Post categories-->
                                @if($data->tagline != '')
                                <div class="badge bg-secondary text-decoration-none link-light">{{ $data->tagline }}</div>
                                @endif
                                @if($data->sanghanthantype != '')
                                <div class="badge bg-secondary text-decoration-none link-light">{{ $data->sanghanthantype }}</div>
                                @endif
                                <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                            </header>
                            <!-- Preview image figure-->
                            <section class="mb-4">
                                <img class="img-fluid rounded"
                                    src="{{ asset('uploads/mandir_dharamshala/' . json_decode($data->image)[0]) }}"
                                    alt="..." />
                            </section>
                            <div class="gallery">
                                @php $gallery = json_decode($data->image) @endphp
                                @for($i = 1; $i < count($gallery); $i++) <div class="image">
                                    <img class="img-fluid rounded"
                                        src="{{ asset('uploads/mandir_dharamshala/' . $gallery[$i]) }}" alt="..." />
                            </div>
                            @endfor
                    </div>
                    <!-- Post content-->
                    <section class="mb-5">
                        {!! $data->description !!}
                    </section>
                    </article>
                    <!-- Comments section-->
                    <!-- <section class="mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                               
                                    <div class="d-flex mb-4">
                                        
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                          
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                </div>
                                            </div>
                                           
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    When you put money directly to a problem, it makes a good headline.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                </div>


                @endif
            </div>
        </div>


    </div>
</div>
</div>
<script>
function showFilter(filterType) {
    $("#sec_" + filterType).show();
}

function removeField(filterType) {
    $("#input_" + filterType).val("");
    $("#sec_" + filterType).hide();
}
</script>
@endsection