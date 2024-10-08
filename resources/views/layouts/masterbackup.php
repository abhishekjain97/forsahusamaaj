
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seikō HTML 5 eCommerce Responsive Theme</title>
	<meta name="author" content="SEIKO">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Vendor -->
	<link href="{{asset('frontend_assets/js/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/js/vendor/slick/slick.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/js/vendor/swiper/swiper.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/js/vendor/magnificpopup/dist/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/js/vendor/nouislider/nouislider.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/js/vendor/darktooltip/dist/darktooltip.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/css/animate.css')}}" rel="stylesheet">

	<!-- Custom -->
	<link href="{{asset('frontend_assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/css/megamenu.css')}}" rel="stylesheet">
	<link href="{{asset('frontend_assets/css/tools.css')}}" rel="stylesheet">

	<!-- Color Schemes -->
	
	<!-- Icon Font -->
	<link href="{{asset('frontend_assets/fonts/icomoon-reg/style.css')}}" rel="stylesheet">

	<!-- Google Font -->
	<link href="{{asset('frontend_assets/fonts.googleapis.com/cssd6fb.css?family=Oswald:300,400,700|Raleway:100,100i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i')}}" rel="stylesheet">
	
</head>

<body class="boxed">
	<!-- Loader -->
	<div id="loader-wrapper">
		<div class="cube-wrapper">
			<div class="cube-folding">
				<span class="leaf1"></span>
				<span class="leaf2"></span>
				<span class="leaf3"></span>
				<span class="leaf4"></span>
			</div>
		</div>
	</div>
	<!-- /Loader -->
	
	<div id="wrapper">
		<!-- Page -->
		<div class="page-wrapper">
			<!-- Header -->
			<header class="page-header variant-1 fullboxed sticky smart">
				<div class="navbar">
					<div class="container">
						<!-- Menu Toggle -->
						<div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>
						<!-- /Menu Toggle -->
						<!-- Header Cart -->
						<div class="header-link dropdown-link header-cart variant-1">
							<a href="cart.html"> <i class="icon icon-cart"></i> <span class="badge">3</span> </a>
							<!-- minicart wrapper -->
							<div class="dropdown-container right">
								<!-- minicart content -->
								<div class="block block-minicart">
									<div class="minicart-content-wrapper">
										<div class="block-title">
											<span>Recently added item(s)</span>
										</div>
										<a class="btn-minicart-close" title="Close">&#10060;</a>
										<div class="block-content">
											<div class="minicart-items-wrapper overflowed">
												<ol class="minicart-items">
													<li class="item product product-item">
														<div class="product">
															<a class="product-item-photo" href="#" title="Long sleeve overall">
																<span class="product-image-container">
																<span class="product-image-wrapper">
																<img class="product-image-photo" src="{{asset('frontend_assets/images/products/product-16-c1.jpg')}}" alt="Long sleeve overall">
																</span>
																</span>
															</a>
															<div class="product-item-details">
																<div class="product-item-name">
																	<a href="#">Long sleeve overall</a>
																</div>
																<div class="product-item-qty">
																	<label class="label">Qty</label>
																	<input class="item-qty cart-item-qty" maxlength="12" value="1">
																	<button class="update-cart-item" style="display: none" title="Update">
																		<span>Update</span>
																	</button>
																</div>
																<div class="product-item-pricing">
																	<div class="price-container">
																		<span class="price-wrapper">
																			<span class="price-excluding-tax">
																			<span class="minicart-price">
																			<span class="price">$139.00</span> </span>
																		</span>
																		</span>
																	</div>
																	<div class="product actions">
																		<div class="secondary">
																			<a href="#" class="action delete" title="Remove item">
																				<span>Delete</span>
																			</a>
																		</div>
																		<div class="primary">
																			<a class="action edit" href="#" title="Edit item">
																				<span>Edit</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="item product product-item">
														<div class="product">
															<a class="product-item-photo" href="#" title="Lace back mini dress">
																<span class="product-image-container">
																<span class="product-image-wrapper">
																<img class="product-image-photo" src="{{asset('frontend_assets/images/products/product-20.jpg')}}" alt="Lace back mini dress">
																</span>
																</span>
															</a>
															<div class="product-item-details">
																<div class="product-item-name">
																	<a href="#">Lace back mini dress</a>
																</div>
																<div class="product-item-qty">
																	<label class="label">Qty</label>
																	<input class="item-qty cart-item-qty" maxlength="12" value="1">
																	<button class="update-cart-item" style="display: none" title="Update">
																		<span>Update</span>
																	</button>
																</div>
																<div class="product-item-pricing">
																	<div class="price-container">
																		<span class="price-wrapper">
																			<span class="price-excluding-tax">
																			<span class="minicart-price">
																			<span class="price">$79.00</span> </span>
																		</span>
																		</span>
																	</div>
																	<div class="product actions">
																		<div class="secondary">
																			<a href="#" class="action delete" title="Remove item">
																				<span>Delete</span>
																			</a>
																		</div>
																		<div class="primary">
																			<a class="action edit" href="#" title="Edit item">
																				<span>Edit</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="item product product-item">
														<div class="product">
															<a class="product-item-photo" href="#" title="Backless mini dress">
																<span class="product-image-container">
																<span class="product-image-wrapper">
																<img class="product-image-photo" src="{{asset('frontend_assets/images/products/product-18.jpg')}}" alt="Backless mini dress">
																</span>
																</span>
															</a>
															<div class="product-item-details">
																<div class="product-item-name">
																	<a href="#">Backless mini dress</a>
																</div>
																<div class="product-item-qty">
																	<label class="label">Qty</label>
																	<input class="item-qty cart-item-qty" maxlength="12" value="1">
																	<button class="update-cart-item" style="display: none" title="Update">
																		<span>Update</span>
																	</button>
																</div>
																<div class="product-item-pricing">
																	<div class="price-container">
																		<span class="price-wrapper">
																			<span class="price-excluding-tax">
																			<span class="minicart-price">
																			<span class="price">$369.00</span> </span>
																		</span>
																		</span>
																	</div>
																	<div class="product actions">
																		<div class="secondary">
																			<a href="#" class="action delete" title="Remove item">
																				<span>Delete</span>
																			</a>
																		</div>
																		<div class="primary">
																			<a class="action edit" href="#" title="Edit item">
																				<span>Edit</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</li>
												</ol>
											</div>
											<div class="subtotal">
												<span class="label">
													<span>Subtotal</span>
												</span>
												<div class="amount price-container">
													<span class="price-wrapper"><span class="price">$587.00</span></span>
												</div>
											</div>
											<div class="actions">
												<div class="secondary">
													<a href="cart.html" class="btn btn-alt">
														<i class="icon icon-cart"></i><span>View and edit cart</span>
													</a>
												</div>
												<div class="primary">
													<a class="btn" href="checkout.html">
														<i class="icon icon-external-link"></i><span>Go to Checkout</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /minicart content -->
							</div>
							<!-- /minicart wrapper -->
						</div>
						<!-- /Header Cart -->
						<!-- Header Links -->
						<div class="header-links">
							<!-- Header Language -->
							<div class="header-link header-select dropdown-link header-language">
								<a href="#"><img src="{{asset('frontend_assets/images/flags/eng.png')}}" alt /></a>
								<ul class="dropdown-container">
									<li class="active">
										<a href="#"><img src="{{asset('frontend_assets/images/flags/eng.png')}}" alt />English</a>
									</li>
									<li>
										<a href="#"><img src="{{asset('frontend_assets/images/flags/fr.png')}}" alt />French</a>
									</li>
									<li>
										<a href="#"><img src="{{asset('frontend_assets/images/flags/den.png')}}" alt />German</a>
									</li>
								</ul>
							</div>
							<!-- /Header Language -->
							<!-- Header Currency -->
							<div class="header-link header-select dropdown-link header-currency">
								<a href="#">USD</a>
								<ul class="dropdown-container">
									<li><a href="#"><span class="symbol">€</span>EUR</a></li>
									<li class="active"><a href="#"><span class="symbol">$</span>USD</a></li>
									<li><a href="#"><span class="symbol">£</span>GBP</a></li>
								</ul>
							</div>
							<!-- /Header Currency -->
							<!-- Header Account -->
							<div class="header-link dropdown-link header-account">
								<a href="#"><i class="icon icon-user"></i></a>
								<div class="dropdown-container right">
									<div class="title">Registered Customers</div>
									<div class="top-text">If you have an account with us, please log in.</div>
									<!-- form -->
									<form action="#">
										<input type="text" class="form-control" placeholder="E-mail*">
										<input type="text" class="form-control" placeholder="Password*">
										<button type="submit" class="btn">Sign in</button>
									</form>
									<!-- /form -->
									<div class="title">OR</div>
									<div class="bottom-text">Create a <a href="account-create.html">New Account</a></div>
								</div>
							</div>
							<!-- /Header Account -->
						</div>
						<!-- /Header Links -->
						<!-- Header Search -->
						<div class="header-link header-search header-search">
							<div class="exp-search">
								<form>
									<input class="exp-search-input " placeholder="Search here ..." type="text" value="">
									<input class="exp-search-submit" type="submit" value="">
									<span class="exp-icon-search"><i class="icon icon-magnify"></i></span>
									<span class="exp-search-close"><i class="icon icon-close"></i></span>
								</form>
							</div>
						</div>
						<!-- /Header Search -->
						<!-- Logo -->
						<div class="header-logo">
							<a href="index.html" title="Logo">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="175px" height="72px" viewBox="0 0 175 72" enable-background="new 0 0 175 72" xml:space="preserve">
									<path d="M42.913,25.454c-0.159-0.681-0.663-1.109-1.117-1.453c-3.122-2.375-6.649-4.239-10.468-5.54
											c-0.034-0.019-0.067-0.026-0.109-0.043c-0.009,0-0.286-0.092-0.673-0.218c-0.284-0.084-0.419-0.126-0.419-0.126
											c-0.143-0.042-0.294-0.059-0.437-0.059c-0.764,0-1.418,0.554-1.552,1.318c-0.168,0.982-0.89,3.744-2.167,4.727
											c-1.007,0.78-2.157,1.175-3.424,1.175h-0.101c-1.269,0-2.426-0.395-3.426-1.175c-1.268-0.991-1.99-3.745-2.167-4.727
											c-0.134-0.764-0.779-1.318-1.553-1.318c-0.149,0-0.293,0.017-0.436,0.059c0,0-0.133,0.042-0.42,0.126
											c-0.385,0.118-0.653,0.21-0.662,0.218c-0.025,0.008-0.051,0.017-0.068,0.024c-3.844,1.285-7.438,3.192-10.669,5.659
											c-1.092,0.832-1.319,1.764-0.722,3.022c1.125,2.401,1.989,4.231,2.812,5.953c0.168,0.344,0.664,1.401,2.024,1.401
											c0.201,0,0.421-0.026,0.672-0.067c1.141-0.218,2.258-0.437,3.441-0.654c0.034-0.007,0.076-0.018,0.109-0.026v17.185
											c0,1.57,0.857,2.435,2.419,2.435h17.276c1.697,0,2.519-0.831,2.519-2.544V33.723l0.134,0.027c1.141,0.218,2.258,0.426,3.375,0.635
											c0.278,0.051,0.502,0.076,0.722,0.076c1.352,0,1.847-1.049,2.031-1.444c0.974-2.047,1.865-3.938,2.729-5.768
											C42.822,26.737,43.064,26.125,42.913,25.454 M40.53,26.285c-0.865,1.829-1.756,3.719-2.73,5.768
											c-0.032,0.066-0.059,0.108-0.075,0.142c-0.05-0.008-0.119-0.016-0.209-0.034c-1.117-0.209-2.233-0.427-3.375-0.638l-1.479-0.276
											c-0.327-0.067-0.671,0.025-0.931,0.243c-0.26,0.218-0.412,0.536-0.412,0.874v18.453c0,0.116-0.008,0.201-0.008,0.268
											c-0.059,0.009-0.135,0.009-0.244,0.009H13.791c-0.059,0-0.109,0-0.152-0.009c0-0.043-0.008-0.1-0.008-0.167V32.363
											c0-0.337-0.15-0.656-0.412-0.874c-0.26-0.218-0.604-0.301-0.931-0.243c-0.488,0.092-0.975,0.185-1.453,0.276
											c-1.184,0.227-2.31,0.436-3.452,0.664c-0.066,0.016-0.116,0.016-0.159,0.024c-0.017-0.024-0.034-0.057-0.05-0.1
											c-0.815-1.72-1.68-3.552-2.805-5.943c-0.034-0.067-0.05-0.118-0.067-0.16c0.034-0.025,0.067-0.059,0.117-0.093
											c3.048-2.326,6.44-4.113,10.067-5.322c0.024-0.009,0.041-0.018,0.058-0.025c0.009,0,0.009,0,0.017-0.009
											c0.042-0.017,0.125-0.042,0.227-0.075c0.318,1.343,1.149,4.055,2.846,5.373c1.41,1.1,3.03,1.653,4.817,1.653h0.102
											c1.788,0,3.408-0.553,4.818-1.653c1.705-1.327,2.527-4.03,2.846-5.373c0.101,0.034,0.176,0.058,0.218,0.075
											c0.035,0.017,0.068,0.025,0.101,0.042c3.609,1.225,6.935,2.98,9.881,5.213c0.11,0.084,0.177,0.143,0.227,0.183
											C40.629,26.058,40.587,26.15,40.53,26.285" />
									<rect x="2" y="17.99" fill="none" width="41.027" height="35.46" />
									<g>
										<path d="M69.91,30.947c-0.941-0.564-1.915-1.066-2.919-1.506c-0.848-0.376-1.798-0.729-2.848-1.059
												c-1.053-0.33-2.081-0.495-3.084-0.495c-0.816,0-1.468,0.126-1.955,0.377c-0.486,0.252-0.729,0.675-0.729,1.271
												c0,0.44,0.14,0.8,0.423,1.083c0.282,0.282,0.689,0.542,1.224,0.776c0.532,0.236,1.184,0.464,1.953,0.684
												c0.769,0.218,1.64,0.487,2.613,0.799c1.538,0.472,2.926,0.989,4.167,1.555c1.24,0.565,2.299,1.232,3.178,2
												c0.879,0.769,1.554,1.703,2.024,2.801c0.471,1.101,0.706,2.433,0.706,4.001c0,2.011-0.369,3.696-1.105,5.061
												c-0.738,1.365-1.711,2.457-2.919,3.271c-1.208,0.817-2.573,1.407-4.096,1.768c-1.521,0.361-3.052,0.54-4.589,0.54
												c-1.224,0-2.48-0.095-3.768-0.281c-1.286-0.188-2.565-0.456-3.836-0.801c-1.271-0.345-2.495-0.753-3.672-1.226
												c-1.177-0.47-2.268-1.002-3.272-1.599l3.955-8.052c1.098,0.691,2.243,1.305,3.437,1.838c1.004,0.47,2.142,0.894,3.414,1.271
												c1.271,0.376,2.565,0.565,3.884,0.565c1.004,0,1.701-0.134,2.096-0.401c0.391-0.266,0.587-0.618,0.587-1.06
												c0-0.47-0.197-0.87-0.587-1.201c-0.395-0.328-0.936-0.617-1.625-0.87c-0.691-0.25-1.483-0.501-2.378-0.751
												c-0.895-0.251-1.843-0.549-2.849-0.896c-1.476-0.5-2.746-1.043-3.813-1.624c-1.067-0.581-1.947-1.238-2.636-1.977
												c-0.691-0.737-1.201-1.578-1.53-2.519c-0.33-0.941-0.494-2.024-0.494-3.248c0-1.852,0.337-3.484,1.012-4.896
												c0.674-1.413,1.592-2.588,2.754-3.531c1.161-0.942,2.486-1.656,3.978-2.143c1.49-0.485,3.067-0.728,4.731-0.728
												c1.224,0,2.416,0.116,3.577,0.353c1.161,0.235,2.283,0.533,3.366,0.894c1.082,0.362,2.095,0.754,3.036,1.177
												c0.943,0.423,1.79,0.823,2.542,1.201L69.91,30.947z" />
									</g>
									<path d="M90.294,53.922c-2.165,0-4.096-0.338-5.79-1.012c-1.695-0.674-3.115-1.594-4.262-2.753
											c-1.146-1.162-2.016-2.498-2.613-4.003c-0.596-1.507-0.894-3.091-0.894-4.755c0-1.79,0.29-3.484,0.871-5.084
											c0.581-1.601,1.443-2.997,2.59-4.19c1.144-1.192,2.558-2.142,4.236-2.849c1.679-0.706,3.633-1.06,5.861-1.06
											c2.198,0,4.144,0.354,5.838,1.06c1.696,0.707,3.115,1.648,4.261,2.825c1.145,1.177,2.009,2.542,2.589,4.096
											c0.58,1.553,0.873,3.177,0.873,4.872c0,0.472-0.025,0.951-0.073,1.436c-0.046,0.487-0.102,0.919-0.164,1.296H86.246
											c0.095,1.317,0.58,2.268,1.46,2.848c0.878,0.582,1.833,0.872,2.872,0.872c0.971,0,1.892-0.22,2.754-0.66
											c0.863-0.438,1.436-1.051,1.719-1.836l7.579,2.164c-1.005,1.979-2.551,3.597-4.638,4.851C95.904,53.294,93.339,53.922,90.294,53.922
											z M94.25,38.435c-0.159-1.194-0.598-2.135-1.319-2.827c-0.722-0.689-1.646-1.034-2.776-1.034c-1.132,0-2.057,0.345-2.779,1.034
											c-0.722,0.691-1.161,1.632-1.317,2.827H94.25z" />
									<path d="M106.818,26.616v-7.532h8.944v7.532H106.818z M106.818,53.45V28.688h8.944V53.45H106.818z" />
									<path d="M136.618,53.45l-5.601-9.039l-1.789,1.979v7.061h-8.947V19.084h8.947v18.784l6.589-9.18h9.417l-8.522,10.827
											l9.371,13.935H136.618z" />
									<path d="M158.697,53.922c-2.229,0-4.182-0.354-5.861-1.059c-1.681-0.705-3.092-1.647-4.237-2.823
											c-1.145-1.179-2.009-2.544-2.589-4.096c-0.582-1.555-0.871-3.18-0.871-4.875c0-1.694,0.289-3.318,0.871-4.872
											c0.58-1.554,1.444-2.919,2.589-4.096c1.146-1.177,2.557-2.118,4.237-2.825c1.68-0.706,3.633-1.06,5.861-1.06
											c2.196,0,4.142,0.354,5.838,1.06c1.695,0.707,3.113,1.648,4.261,2.825c1.146,1.177,2.009,2.542,2.589,4.096
											c0.582,1.553,0.871,3.177,0.871,4.872c0,1.695-0.289,3.32-0.871,4.875c-0.58,1.552-1.442,2.917-2.589,4.096
											c-1.147,1.176-2.565,2.118-4.261,2.823C162.839,53.567,160.894,53.922,158.697,53.922z M151.448,24.875v-5.32h14.592v5.32H151.448z
											M154.32,41.069c0,1.663,0.407,2.967,1.226,3.906c0.815,0.943,1.864,1.414,3.151,1.414s2.338-0.471,3.153-1.414
											c0.816-0.939,1.224-2.243,1.224-3.906c0-1.662-0.407-2.965-1.224-3.906c-0.815-0.942-1.866-1.414-3.153-1.414
											s-2.336,0.471-3.151,1.414C154.728,38.104,154.32,39.407,154.32,41.069z" />
								</svg>
							</a>
						</div>
						<!-- /Logo -->
						<!-- Mobile Menu -->
						<div class="mobilemenu dblclick">
							<div class="mobilemenu-header">
								<div class="title">MENU</div>
								<a href="#" class="mobilemenu-toggle"></a>
							</div>
							<div class="mobilemenu-content">
								<ul class="nav">
									<li><a href="index.html">HOME</a><span class="arrow"></span>
										<ul>
											<li> <a href="index.html" title="">Default</a> </li>
											<li> <a href="index-bg-white.html" title="">White Background</a> </li>
											<li> <a href="index-layout-6.html" title="">Wide + Side Panel</a> </li>
											<li> <a href="index-layout-1.html" title="">Classic</a> </li>
											<li> <a href="index-layout-2.html" title="">Journal<span class="menu-label">new look</span></a> </li>
											<li> <a href="index-layout-3.html" title="">Banners Boom</a> </li>
											<li> <a href="index-fullscreen-slider.html" title="">Fullscreen Slider</a> </li>
											<li> <a href="index-layout-4.html" title="">Amason</a> </li>
											<li> <a href="index-layout-5.html" title="">Lookbook</a> </li>
											<li> <a href="index-rtl.html" title="">RTL</a> </li>
											<li> <a href="index-popup.html" title="">Popup on Load</a> </li>
										</ul>
									</li>
									<li>
										<a href="#" title="">Pages</a><span class="arrow"></span>
										<ul>
											<li>
												<a href="category-fixed-sidebar.html" title="">Listing<span class="menu-label-alt">NEW FEATURES</span></a><span class="arrow"></span>
												<ul>
													<li><a href="category.html" title="">Classic Listing</a>
													</li>
													<li><a href="category-fixed-sidebar.html" title="">Listing Fixed Filter<span class="menu-label-alt">NEW </span></a>
													</li>
													<li><a href="category-no-filter.html" title="">Listing No Filter</a></li>
													<li><a href="category-empty.html" title="">Empty Category</a></li>
													<li><a href="category.html" title="">Products per row</a><span class="arrow"></span>
														<ul>
															<li> <a href="category-2-per-row.html" title="">2 per row</a></li>
															<li> <a href="category-3-per-row.html" title="">3 per row</a></li>
															<li> <a href="category-4-per-row.html" title="">4 per row</a></li>
															<li> <a href="category-5-per-row.html" title="">5 per row</a></li>
														</ul>
													</li>
												</ul>
											</li>
											<li>
												<a href="product.html" title="">Product</a><span class="arrow"></span>
												<ul>
													<li> <a href="product.html" title="">Classic design</a><span class="arrow"></span>
														<ul>
															<li> <a href="product-image-small.html" title="">Image small</a></li>
															<li> <a href="product-image-medium.html" title="">Image medium</a></li>
															<li> <a href="product-image-medium-plus.html" title="">Image medium plus</a></li>
															<li> <a href="product-image-large.html" title="">Image large</a></li>
														</ul>
													</li>
													<li> <a href="product-creative.html" title="">Creative design</a> </li>
												</ul>
											</li>
											<li>
												<a href="index.html" title="">Headers</a><span class="arrow"></span>
												<ul>
													<li> <a href="header-variant-1.html" title="">Header 1 (one row shift)</a> </li>
													<li> <a href="header-variant-2.html" title="">Header 2 (one row)</a> </li>
													<li> <a href="header-variant-3.html" title="">Header 3 (one row dark)</a> </li>
													<li> <a href="header-variant-4.html" title="">Header 4 (three rows)</a> </li>
													<li> <a href="header-variant-5.html" title="">Header 5 (two rows)</a> </li>
													<li> <a href="header-variant-6.html" title="">Header 6 (two rows center)</a> </li>
													<li> <a href="header-variant-7.html" title="">Header 7 (three row)</a> </li>
													<li> <a href="header-variant-8.html" title="">Header 8 (department)</a> </li>
													<li> <a href="header-variant-9.html" title="">Header 9 (creative)</a> </li>
												</ul>
											</li>
											<li>
												<a href="index.html" title="">Footers</a><span class="arrow"></span>
												<ul>
													<li> <a href="footer-variant-1.html" title="">Footer 1 (simple)</a> </li>
													<li> <a href="footer-variant-2.html" title="">Footer 2 (links)</a> </li>
													<li> <a href="footer-variant-3.html" title="">Footer 3 (menu)</a> </li>
													<li> <a href="footer-variant-4.html" title="">Footer 4 (advanced)</a> </li>
												</ul>
											</li>
											<li>
												<a href="gallery.html" title="">Gallery</a><span class="arrow"></span>
												<ul>
													<li> <a href="gallery.html" title="">Gallery 2 in row</a> </li>
													<li> <a href="gallery-3-per-row.html" title="">Gallery 3 in row</a> </li>
													<li> <a href="gallery-simple.html" title="">No isotope Gallery</a> </li>
												</ul>
											</li>
											<li>
												<a href="blog.html" title="">Blog</a>
												<ul>
													<li> <a href="blog.html" title="">List+Sidebar</a> </li>
													<li> <a href="blog-grid-2.html" title="">Grid 2</a> </li>
													<li> <a href="blog-grid-3.html" title="">Grid 3</a> </li>
													<li> <a href="blog-grid-4.html" title="">Grid 4</a> </li>
													<li> <a href="blog-single.html" title="">Single Post</a> </li>
												</ul>
											</li>
											<li>
												<a href="#" title="">Pages</a><span class="arrow"></span>
												<ul>
													<li> <a href="faq.html" title="">Faq</a> </li>
													<li> <a href="about.html" title="">About Us</a> </li>
													<li> <a href="contact.html" title="">Contact Us</a> </li>
													<li> <a href="404.html" title="">404</a> </li>
													<li> <a href="typography.html" title="">Typography</a> </li>
													<li> <a href="coming-soon.html" title="">Coming soon</a> </li>
													<li> <a href="login.html" title="">Login</a> </li>
													<li> <a href="account-create.html" title="">Account</a> </li>
													<li> <a href="cart.html" title="">Cart</a> </li>
													<li> <a href="cart-empty.html" title="">Empty Cart</a> </li>
													<li> <a href="wishlist.html" title="">Wishlist</a> </li>
												</ul>
											</li>
											<li> <a href="http://seiko-shopify.big-skins.com/banners-grid-online-editor/" title="">Banners / Grid Editor<span class="menu-label-alt">EXCLUSIVE</span></a> </li>
										</ul>
									</li>
									<li><a href="category.html">Men</a></li>
									<li><a href="category.html">Women</a></li>
									<li><a href="category.html">Electronics</a></li>
								</ul>
							</div>
						</div>
						<!-- Mobile Menu -->
						<!-- Mega Menu -->
						<div class="megamenu fadein blackout">							<ul class="nav">
                            	<li><a href="index.html" title=""><i class="icon icon-home"></i></a></li>
								<li class="mega-dropdown">
									<a href="index.html">Layouts</a>

									<div class="sub-menu">
										<div class="container">
											<div class="megamenu-categories column-5">
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index.html"><img src="images/layout/layout-1.jpg" alt /></a>
													<div class="category-title"><a href="#">Default</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-6.html"><img src="{{asset('frontend_assets/images/layout/layout-2.jpg')}}" alt /></a>
													<div class="category-title"><a href="#">Fullwidth + Left SideBar</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-1.html"><img src="{{asset('frontend_assets/images/layout/layout-3.jpg')}}" alt /></a>
													<div class="category-title"><a href="#">Classic</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-3.html"><img src="frontend_assets/images/layout/layout-4.jpg" alt /></a>
													<div class="category-title"><a href="#">Banners Boom</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-4.html"><img src="frontend_assets/images/layout/layout-6.jpg" alt /></a>
													<div class="category-title"><a href="#">Amason (vertical menu)</a></div>
												</div>
												<!-- /megamenu column -->
											</div>
										</div>
										<div class="container">
											<div class="megamenu-categories column-5">
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-5.html"><img src="frontend_assets/images/layout/layout-7.jpg" alt /></a>
													<div class="category-title"><a href="#">LookBook</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-layout-2.html"><img src="frontend_assets/images/layout/layout-5.jpg" alt /></a>
													<div class="category-title"><a href="#">Journal View</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-rtl.html"><img src="frontend_assets/images/layout/layout-8.jpg" alt /></a>
													<div class="category-title"><a href="#">RTL Mode</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="index-bg-white.html"><img src="frontend_assets/images/layout/layout-9.jpg" alt /></a>
													<div class="category-title"><a href="#">White Background</a></div>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="gallery.html"><img src="frontend_assets/images/layout/layout-10.jpg" alt /></a>
													<div class="category-title"><a href="#">Gallery</a></div>
												</div>
												<!-- /megamenu column -->
											</div>
										</div>
									</div>
								</li>
								<li class="simple-dropdown">
									<a href="#" title="">Pages</a>
									<div class="sub-menu">
										<ul class="category-links">
											<li>
												<a href="category-fixed-sidebar.html" title="">Listing<span class="menu-label-alt">NEW FEATURES</span></a><span class="arrow"></span>
												<ul>
													<li><a href="category.html" title="">Classic Listing</a>
													</li>
													<li><a href="category-fixed-sidebar.html" title="">Listing Fixed Filter<span class="menu-label-alt">NEW </span></a>
													</li>
													<li><a href="category-no-filter.html" title="">Listing No Filter</a></li>
													<li><a href="category-empty.html" title="">Empty Category</a></li>
													<li><a href="category.html" title="">Products per row</a><span class="arrow"></span>
														<ul>
															<li> <a href="category-2-per-row.html" title="">2 per row</a></li>
															<li> <a href="category-3-per-row.html" title="">3 per row</a></li>
															<li> <a href="category-4-per-row.html" title="">4 per row</a></li>
															<li> <a href="category-5-per-row.html" title="">5 per row</a></li>
														</ul>
													</li>
												</ul>
											</li>
											<li>
												<a href="product.html" title="">Product</a>
												<ul>
													<li> <a href="product.html" title="">Classic design</a><span class="arrow"></span>
														<ul>
															<li> <a href="product-image-small.html" title="">Image small</a></li>
															<li> <a href="product-image-medium.html" title="">Image medium</a></li>
															<li> <a href="product-image-medium-plus.html" title="">Image medium plus</a></li>
															<li> <a href="product-image-large.html" title="">Image large</a></li>
														</ul>
													</li>
													<li> <a href="product-creative.html" title="">Creative design</a> </li>
												</ul>
											</li>
											<li>
												<a href="index.html" title="">Headers</a>
												<ul>
													<li> <a href="header-variant-1.html" title="">Header 1 (one row shift)</a> </li>
													<li> <a href="header-variant-2.html" title="">Header 2 (one row)</a> </li>
													<li> <a href="header-variant-3.html" title="">Header 3 (one row dark)</a> </li>
													<li> <a href="header-variant-4.html" title="">Header 4 (three rows)</a> </li>
													<li> <a href="header-variant-5.html" title="">Header 5 (two rows)</a> </li>
													<li> <a href="header-variant-6.html" title="">Header 6 (two rows center)</a> </li>
													<li> <a href="header-variant-7.html" title="">Header 7 (three row)</a> </li>
													<li> <a href="header-variant-8.html" title="">Header 8 (department)</a> </li>
													<li> <a href="header-variant-9.html" title="">Header 9 (creative)</a> </li>
												</ul>
											</li>
											<li>
												<a href="index.html" title="">Footers</a>
												<ul>
													<li> <a href="footer-variant-1.html" title="">Footer 1 (simple)</a> </li>
													<li> <a href="footer-variant-2.html" title="">Footer 2 (links)</a> </li>
													<li> <a href="footer-variant-3.html" title="">Footer 3 (menu)</a> </li>
													<li> <a href="footer-variant-4.html" title="">Footer 4 (advanced)</a> </li>
												</ul>
											</li>
											<li>
												<a href="gallery.html" title="">Gallery</a>
												<ul>
													<li> <a href="gallery.html" title="">Gallery 2 in row</a> </li>
													<li> <a href="gallery-3-per-row.html" title="">Gallery 3 in row</a> </li>
													<li> <a href="gallery-simple.html" title="">No isotope Gallery</a> </li>
												</ul>
											</li>
											<li>
												<a href="blog.html" title="">Blog</a>
												<ul>
													<li> <a href="blog.html" title="">List+Sidebar</a> </li>
													<li> <a href="blog-grid-2.html" title="">Grid 2</a> </li>
													<li> <a href="blog-grid-3.html" title="">Grid 3</a> </li>
													<li> <a href="blog-grid-4.html" title="">Grid 4</a> </li>
													<li> <a href="blog-single.html" title="">Single Post</a> </li>
												</ul>
											</li>
											<li>
												<a href="#" title="">Pages</a>
												<ul>
													<li> <a href="faq.html" title="">Faq</a> </li>
													<li> <a href="about.html" title="">About Us</a> </li>
													<li> <a href="contact.html" title="">Contact Us</a> </li>
													<li> <a href="404.html" title="">404</a> </li>
													<li> <a href="typography.html" title="">Typography</a> </li>
													<li> <a href="coming-soon.html" title="">Coming soon</a> </li>
													<li> <a href="login.html" title="">Login</a> </li>
													<li> <a href="account-create.html" title="">Account</a> </li>
												</ul>
											</li>
											<li> <a href="index-popup.html" title="">Popup on Load</a> </li>
											<li> <a href="http://seiko-shopify.big-skins.com/banners-grid-online-editor/" title="">Banners / Grid Editor<span class="menu-label-alt">EXCLUSIVE</span></a> </li>
										</ul>
									</div>
								</li>
								<li class="mega-dropdown">
									<a href="category.html">Men<span class="menu-label">-15%</span></a>
									<div class="sub-menu">
										<div class="container">
											<div class="megamenu-categories column-4">
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-03.jpg" alt /></a>
													<div class="category-title"><a href="#">Only New</a></div>
													<ul class="category-links">
														<li><a href="#">New In Clothing</a></li>
														<li><a href="#">New In Shoes</a></li>
														<li><a href="#">New In Accessories</a></li>
													</ul>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-04.jpg" alt /></a>
													<div class="category-title"><a href="#">Only Sale</a></div>
													<ul class="category-links">
														<li><a href="#">Sale Clothing</a></li>
														<li><a href="#"><b>Sale Shoes</b><span class="menu-label">THREE DAYS ONLY!</span></a></li>
														<li><a href="#">Sale Accessories</a></li>
													</ul>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-05.jpg" alt /></a>
													<div class="category-title"><a href="#">Top</a><span class="menu-label-alt">NEW</span></div>
													<ul class="category-links">
														<li><a href="#">T-Shirts & Vests</a></li>
														<li><a href="#">Jumpers & Cardigans</a></li>
														<li><a href="#">Coats & Jackets</a></li>
													</ul>
												</div>
												<!-- /megamenu column -->
												<!-- megamenu column -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-06.jpg" alt /></a>
													<div class="category-title"><a href="#">Bottom</a></div>
													<ul class="category-links">
														<li><a href="#">Shorts</a></li>
														<li><a href="#">Pants</a></li>
														<li><a href="#">Denim</a></li>
													</ul>
												</div>
												<!-- /megamenu column -->
											</div>
										</div>
									</div>
								</li>
								<li class="mega-dropdown">
									<a href="category.html">Women<span class="menu-label-alt">NEW</span></a>
									<div class="sub-menu">
										<div class="container">
											<div class="megamenu-right width-25">
												<div class="banner style-1 autosize-text" data-fontratio="4.2">
													<img src="frontend_assets/images/banners/banner-1.jpg" alt="Banner">
													<div class="banner-caption vertb">
														<div class="vert-wrapper">
															<div class="vert">
																<div class="text-1">WOMEN 2016</div>
																<div class="text-2">collections sale</div>
																<div class="text-3"> SAVE UP TO 40% OF</div>
																<a href="#buttonlink" class="banner-btn-wrap">
																	<div class="banner-btn text-hoverslide" data-hcolor="#f82e56"><span><span class="text">SHOP NOW</span><span class="hoverbg"></span></span>
																	</div>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="megamenu-categories column-2">
												<!-- megamenu column 1 -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-01-1.jpg" alt /></a>
													<div class="category-title title-border"><a href="#">ACCESSORIES<span class="menu-label">HOT</span></a></div>
													<ul class="category-links column-count-2">
														<li><a href="#">Belt Buckles</a></li>
														<li><a href="#">Collar Tips</a></li>
														<li><a href="#">Fascinators & Headpieces<span class="menu-label">HOT PRICE</span></a></li>
														<li><a href="#">Gloves & Mittens</a></li>
														<li><a href="#">Hair Accessories</a></li>
														<li><a href="#">Handkerchiefs</a></li>
													</ul>
												</div>
												<!-- /megamenu column 1 -->
												<!-- megamenu column 2 -->
												<div class="col">
													<a class="category-image" href="#"><img src="frontend_assets/images/category/megamenu-category-02-1.jpg" alt /></a>
													<div class="category-title title-border"><a href="#">CLOTHING<span class="menu-label-alt">NEW</span></a></div>
													<ul class="category-links column-count-2">
														<li><a href="#">T-Shirts & Vests</a></li>
														<li><a href="#">Jumpers & Cardigans</a></li>
														<li><a href="#">Hoodies & Sweats<span class="menu-label">-15%</span></a></li>
														<li><a href="#">Coats & Jackets</a></li>
														<li><a href="#">Joggers & Tracksuits</a></li>
														<li><a href="#">Athletic Apparel</a></li>
													</ul>
												</div>
												<!-- /megamenu column 2 -->
												<!-- megamenu bottom -->
												<div class="megamenu-bottom">
													<a href="#"><img class="img-responsive" src="frontend_assets/images/banners/banner-megamenu.jpg" alt="megamenu banner"></a>
												</div>
												<!-- /megamenu bottom -->
											</div>
										</div>
									</div>
								</li>
								<li class="mega-dropdown">
									<a href="category.html">Electronics</a>
									<div class="sub-menu">
										<div class="container">
											<div class="megamenu-left width-33">
												<a href="#bannerLink" class="banner-wrap">
													<div class="banner style-13 autosize-text image-hover-scale" data-fontratio="4">
														<img src="frontend_assets/images/banners/banner-21.jpg" alt="Banner">
														<div class="banner-caption horc vertb" style="bottom: 3%;">
															<div class="vert-wrapper">
																<div class="vert">
																	<div class="text-1">NEW STYLE</div>
																	<div class="text-2">New Collection</div>
																	<div class="banner-btn text-hoverslide" data-hcolor="#f82e56"><span><span class="text">SHOP NOW</span><span class="hoverbg"></span></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</a>
											</div>
											<div class="megamenu-categories column-3">
												<!-- megamenu column 1 -->
												<div class="col">
													<a class="category-image light" href="#"><img src="frontend_assets/images/category/megamenu-category-07.jpg" alt /></a>
													<div class="category-title title-border"><a href="#">Cameras & Camcorders<span class="menu-label">HOT</span></a></div>
													<ul class="category-links">
														<li><a href="#">New In</a></li>
														<li><a href="#">All Cameras</a></li>
														<li><a href="#">All Camcorders</a></li>
														<li><a href="#">Camera Accessories</a></li>
														<li><a href="#">Camera Lenses</a></li>
														<li><a href="#">Memory Cards</a></li>
														<li><a href="#">Web Cameras</a></li>
													</ul>
												</div>
												<!-- /megamenu column 1 -->
												<!-- megamenu column 2 -->
												<div class="col">
													<a class="category-image light" href="#"><img src="frontend_assets/images/category/megamenu-category-09.jpg" alt /></a>
													<div class="category-title title-border"><a href="#">Cell Phones<span class="menu-label-alt">NEW</span></a></div>
													<ul class="category-links">
														<li><a href="#">No-Contract Phones & Plans</a></li>
														<li><a href="#">Accessories</a></li>
														<li><a href="#">Apple iPhone</a></li>
														<li><a href="#">Mobile Hotspots & Plans<span class="menu-label">-15%</span></a></li>
														<li><a href="#">Samsung Galaxy</a></li>
														<li><a href="#">Prepaid Cell Phones</a></li>
														<li><a href="#">SIM Cards</a></li>
													</ul>
												</div>
												<!-- /megamenu column 2 -->
												<!-- megamenu column 3 -->
												<div class="col truncateList" data-list-items="7">
													<a class="category-image light" href="#"><img src="frontend_assets/images/category/megamenu-category-08.jpg" alt /></a>
													<div class="category-title title-border"><a href="#">Video Games<span class="menu-label">HOT</span></a>
														<span class="view-all"><span class="all">view all...</span><span class="less">view less...</span></span>
													</div>
													<ul class="category-links">
														<li><a href="#">PlayStation 4</a></li>
														<li><a href="#">Xbox One</a></li>
														<li><a href="#">Nintendo 3DS / 2DS</a></li>
														<li><a href="#">Video Game Accessories></a></li>
														<li><a href="#">Xbox Live Cards</a></li>
														<li><a href="#">Strategy Guides</a></li>
														<li><a href="#"><i class="icon icon-gift"></i> Gaming Gift Cards</a></li>
														<li><a href="#">PlayStation 4</a></li>
														<li><a href="#">Xbox One</a></li>
														<li><a href="#">Nintendo 3DS / 2DS</a></li>
														<li><a href="#">Video Game Accessories></a></li>
														<li><a href="#">Xbox Live Cards</a></li>
													</ul>
												</div>
												<!-- /megamenu column 3 -->
											</div>
										</div>
									</div>
								</li>
								<li class="simple-dropdown">
									<a href="blog.html" title="">Blog</a>
									<div class="sub-menu">
										<ul class="category-links">
											<li> <a href="blog.html" title="">List+Sidebar</a> </li>
											<li> <a href="blog-grid-2.html" title="">Grid 2</a> </li>
											<li> <a href="blog-grid-3.html" title="">Grid 3</a> </li>
											<li> <a href="blog-grid-4.html" title="">Grid 4</a> </li>
											<li> <a href="blog-single.html" title="">Single Post</a> </li>
										</ul>
									</div>
								</li>
								
							</ul>
						</div>
						<!-- /Mega Menu -->
					</div>
				</div>
			</header>
			<!-- /Header -->
			<!-- Sidebar -->
			<div class="sidebar-wrapper">
				<div class="sidebar-top"><a href="#" class="slidepanel-toggle"><i class="icon icon-left-arrow-circular"></i></a></div>
				<ul class="sidebar-nav">
					<li> <a href="index.html">HOME</a> </li>
					<li> <a href="gallery.html">GALLERY</a> </li>
					<li> <a href="blog.html">BLOG</a> </li>
					<li> <a href="category-fixed-sidebar.html">SHOP</a> </li>
					<li> <a href="faq.html">FAQ</a> </li>
					<li> <a href="contact.html">CONTACT</a> </li>
				</ul>
				<div class="sidebar-bot">
					<div class="share-button toTop">
						<span class="toggle"></span>
						<ul class="social-list">
							<li>
								<a href="#" class="icon icon-google google"></a>
							</li>
							<li>
								<a href="#" class="icon icon-fancy fancy"></a>
							</li>
							<li>
								<a href="#" class="icon icon-pinterest pinterest"></a>
							</li>
							<li>
								<a href="#" class="icon icon-twitter-logo twitter"></a>
							</li>
							<li>
								<a href="#" class="icon icon-facebook-logo facebook"></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
            <!-- /Sidebar -->
            

			@yield('content')
            
            
            
            <!-- Footer -->
			<footer class="page-footer variant4 fullboxed">
				<div class="footer-top bg">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<!-- newsletter -->
								<div class="newsletter variant3">
									<div class="footer-logo">
										<a href="#">
											<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="175px" height="72px" viewBox="0 0 175 72" enable-background="new 0 0 175 72" xml:space="preserve">
												<path d="M42.913,25.454c-0.159-0.681-0.663-1.109-1.117-1.453c-3.122-2.375-6.649-4.239-10.468-5.54
														c-0.034-0.019-0.067-0.026-0.109-0.043c-0.009,0-0.286-0.092-0.673-0.218c-0.284-0.084-0.419-0.126-0.419-0.126
														c-0.143-0.042-0.294-0.059-0.437-0.059c-0.764,0-1.418,0.554-1.552,1.318c-0.168,0.982-0.89,3.744-2.167,4.727
														c-1.007,0.78-2.157,1.175-3.424,1.175h-0.101c-1.269,0-2.426-0.395-3.426-1.175c-1.268-0.991-1.99-3.745-2.167-4.727
														c-0.134-0.764-0.779-1.318-1.553-1.318c-0.149,0-0.293,0.017-0.436,0.059c0,0-0.133,0.042-0.42,0.126
														c-0.385,0.118-0.653,0.21-0.662,0.218c-0.025,0.008-0.051,0.017-0.068,0.024c-3.844,1.285-7.438,3.192-10.669,5.659
														c-1.092,0.832-1.319,1.764-0.722,3.022c1.125,2.401,1.989,4.231,2.812,5.953c0.168,0.344,0.664,1.401,2.024,1.401
														c0.201,0,0.421-0.026,0.672-0.067c1.141-0.218,2.258-0.437,3.441-0.654c0.034-0.007,0.076-0.018,0.109-0.026v17.185
														c0,1.57,0.857,2.435,2.419,2.435h17.276c1.697,0,2.519-0.831,2.519-2.544V33.723l0.134,0.027c1.141,0.218,2.258,0.426,3.375,0.635
														c0.278,0.051,0.502,0.076,0.722,0.076c1.352,0,1.847-1.049,2.031-1.444c0.974-2.047,1.865-3.938,2.729-5.768
														C42.822,26.737,43.064,26.125,42.913,25.454 M40.53,26.285c-0.865,1.829-1.756,3.719-2.73,5.768
														c-0.032,0.066-0.059,0.108-0.075,0.142c-0.05-0.008-0.119-0.016-0.209-0.034c-1.117-0.209-2.233-0.427-3.375-0.638l-1.479-0.276
														c-0.327-0.067-0.671,0.025-0.931,0.243c-0.26,0.218-0.412,0.536-0.412,0.874v18.453c0,0.116-0.008,0.201-0.008,0.268
														c-0.059,0.009-0.135,0.009-0.244,0.009H13.791c-0.059,0-0.109,0-0.152-0.009c0-0.043-0.008-0.1-0.008-0.167V32.363
														c0-0.337-0.15-0.656-0.412-0.874c-0.26-0.218-0.604-0.301-0.931-0.243c-0.488,0.092-0.975,0.185-1.453,0.276
														c-1.184,0.227-2.31,0.436-3.452,0.664c-0.066,0.016-0.116,0.016-0.159,0.024c-0.017-0.024-0.034-0.057-0.05-0.1
														c-0.815-1.72-1.68-3.552-2.805-5.943c-0.034-0.067-0.05-0.118-0.067-0.16c0.034-0.025,0.067-0.059,0.117-0.093
														c3.048-2.326,6.44-4.113,10.067-5.322c0.024-0.009,0.041-0.018,0.058-0.025c0.009,0,0.009,0,0.017-0.009
														c0.042-0.017,0.125-0.042,0.227-0.075c0.318,1.343,1.149,4.055,2.846,5.373c1.41,1.1,3.03,1.653,4.817,1.653h0.102
														c1.788,0,3.408-0.553,4.818-1.653c1.705-1.327,2.527-4.03,2.846-5.373c0.101,0.034,0.176,0.058,0.218,0.075
														c0.035,0.017,0.068,0.025,0.101,0.042c3.609,1.225,6.935,2.98,9.881,5.213c0.11,0.084,0.177,0.143,0.227,0.183
														C40.629,26.058,40.587,26.15,40.53,26.285" />
												<rect x="2" y="17.99" fill="none" width="41.027" height="35.46" />
												<g>
													<path d="M69.91,30.947c-0.941-0.564-1.915-1.066-2.919-1.506c-0.848-0.376-1.798-0.729-2.848-1.059
															c-1.053-0.33-2.081-0.495-3.084-0.495c-0.816,0-1.468,0.126-1.955,0.377c-0.486,0.252-0.729,0.675-0.729,1.271
															c0,0.44,0.14,0.8,0.423,1.083c0.282,0.282,0.689,0.542,1.224,0.776c0.532,0.236,1.184,0.464,1.953,0.684
															c0.769,0.218,1.64,0.487,2.613,0.799c1.538,0.472,2.926,0.989,4.167,1.555c1.24,0.565,2.299,1.232,3.178,2
															c0.879,0.769,1.554,1.703,2.024,2.801c0.471,1.101,0.706,2.433,0.706,4.001c0,2.011-0.369,3.696-1.105,5.061
															c-0.738,1.365-1.711,2.457-2.919,3.271c-1.208,0.817-2.573,1.407-4.096,1.768c-1.521,0.361-3.052,0.54-4.589,0.54
															c-1.224,0-2.48-0.095-3.768-0.281c-1.286-0.188-2.565-0.456-3.836-0.801c-1.271-0.345-2.495-0.753-3.672-1.226
															c-1.177-0.47-2.268-1.002-3.272-1.599l3.955-8.052c1.098,0.691,2.243,1.305,3.437,1.838c1.004,0.47,2.142,0.894,3.414,1.271
															c1.271,0.376,2.565,0.565,3.884,0.565c1.004,0,1.701-0.134,2.096-0.401c0.391-0.266,0.587-0.618,0.587-1.06
															c0-0.47-0.197-0.87-0.587-1.201c-0.395-0.328-0.936-0.617-1.625-0.87c-0.691-0.25-1.483-0.501-2.378-0.751
															c-0.895-0.251-1.843-0.549-2.849-0.896c-1.476-0.5-2.746-1.043-3.813-1.624c-1.067-0.581-1.947-1.238-2.636-1.977
															c-0.691-0.737-1.201-1.578-1.53-2.519c-0.33-0.941-0.494-2.024-0.494-3.248c0-1.852,0.337-3.484,1.012-4.896
															c0.674-1.413,1.592-2.588,2.754-3.531c1.161-0.942,2.486-1.656,3.978-2.143c1.49-0.485,3.067-0.728,4.731-0.728
															c1.224,0,2.416,0.116,3.577,0.353c1.161,0.235,2.283,0.533,3.366,0.894c1.082,0.362,2.095,0.754,3.036,1.177
															c0.943,0.423,1.79,0.823,2.542,1.201L69.91,30.947z" />
												</g>
												<path d="M90.294,53.922c-2.165,0-4.096-0.338-5.79-1.012c-1.695-0.674-3.115-1.594-4.262-2.753
														c-1.146-1.162-2.016-2.498-2.613-4.003c-0.596-1.507-0.894-3.091-0.894-4.755c0-1.79,0.29-3.484,0.871-5.084
														c0.581-1.601,1.443-2.997,2.59-4.19c1.144-1.192,2.558-2.142,4.236-2.849c1.679-0.706,3.633-1.06,5.861-1.06
														c2.198,0,4.144,0.354,5.838,1.06c1.696,0.707,3.115,1.648,4.261,2.825c1.145,1.177,2.009,2.542,2.589,4.096
														c0.58,1.553,0.873,3.177,0.873,4.872c0,0.472-0.025,0.951-0.073,1.436c-0.046,0.487-0.102,0.919-0.164,1.296H86.246
														c0.095,1.317,0.58,2.268,1.46,2.848c0.878,0.582,1.833,0.872,2.872,0.872c0.971,0,1.892-0.22,2.754-0.66
														c0.863-0.438,1.436-1.051,1.719-1.836l7.579,2.164c-1.005,1.979-2.551,3.597-4.638,4.851C95.904,53.294,93.339,53.922,90.294,53.922
														z M94.25,38.435c-0.159-1.194-0.598-2.135-1.319-2.827c-0.722-0.689-1.646-1.034-2.776-1.034c-1.132,0-2.057,0.345-2.779,1.034
														c-0.722,0.691-1.161,1.632-1.317,2.827H94.25z" />
												<path d="M106.818,26.616v-7.532h8.944v7.532H106.818z M106.818,53.45V28.688h8.944V53.45H106.818z" />
												<path d="M136.618,53.45l-5.601-9.039l-1.789,1.979v7.061h-8.947V19.084h8.947v18.784l6.589-9.18h9.417l-8.522,10.827
														l9.371,13.935H136.618z" />
												<path d="M158.697,53.922c-2.229,0-4.182-0.354-5.861-1.059c-1.681-0.705-3.092-1.647-4.237-2.823
														c-1.145-1.179-2.009-2.544-2.589-4.096c-0.582-1.555-0.871-3.18-0.871-4.875c0-1.694,0.289-3.318,0.871-4.872
														c0.58-1.554,1.444-2.919,2.589-4.096c1.146-1.177,2.557-2.118,4.237-2.825c1.68-0.706,3.633-1.06,5.861-1.06
														c2.196,0,4.142,0.354,5.838,1.06c1.695,0.707,3.113,1.648,4.261,2.825c1.146,1.177,2.009,2.542,2.589,4.096
														c0.582,1.553,0.871,3.177,0.871,4.872c0,1.695-0.289,3.32-0.871,4.875c-0.58,1.552-1.442,2.917-2.589,4.096
														c-1.147,1.176-2.565,2.118-4.261,2.823C162.839,53.567,160.894,53.922,158.697,53.922z M151.448,24.875v-5.32h14.592v5.32H151.448z
														M154.32,41.069c0,1.663,0.407,2.967,1.226,3.906c0.815,0.943,1.864,1.414,3.151,1.414s2.338-0.471,3.153-1.414
														c0.816-0.939,1.224-2.243,1.224-3.906c0-1.662-0.407-2.965-1.224-3.906c-0.815-0.942-1.866-1.414-3.153-1.414
														s-2.336,0.471-3.151,1.414C154.728,38.104,154.32,39.407,154.32,41.069z" />
											</svg>
										</a>
									</div>
									<div>
										<!-- input-group -->
										<form action="#">
											<div class="input-group">
												<input type="text" class="form-control">
												<span class="input-group-btn">
													<button class="btn btn-default" type="submit"><i class="icon icon-close-envelope"></i></button>
													</span>
											</div>
										</form>
										<!-- /input-group -->
									</div>
								</div>
								<!-- /newsletter -->
							</div>
							<div class="col-md-3">
								<h3><span class="custom-color">HOT</span> Company news </h3>
								<div class="news-item">
									<div class="news-date">21.10.06</div>
									<h4 class="news-title">Neque porro quisquam est</h4>
									<div class="news-text">
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut git, sed quia consequuntur magni dolore</p>
										<p><a href="#" class="readmore">Read more</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<h3>Twitter</h3>
								<a class="twitter-timeline" href="https://twitter.com/ThemeForest" data-chrome="transparent nofooter noborders noheader noscrollbar" data-tweet-limit="1" data-widget-id="677235277925113856">Tweets by @ThemeForest</a>
								<script>
									! function (d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0],
											p = /^http:/.test(d.location) ? 'http' : 'https';
										if (!d.getElementById(id)) {
											js = d.createElement(s);
											js.id = id;
											js.src = p + "://platform.twitter.com/widgets.js";
											fjs.parentNode.insertBefore(js, fjs);
										}
									}(document, "script", "twitter-wjs");
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-middle">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-lg-3">
								<div class="footer-block collapsed-mobile">
									<div class="title">
										<h4>INFORMATION</h4>
										<div class="toggle-arrow"></div>
									</div>
									<div class="collapsed-content">
										<ul class="marker-list">
											<li><a href="about.html">About Us</a></li>
											<li><a href="faq.html">Customer Service</a></li>
											<li><a href="about.html">Privacy Policy</a></li>
											<li><a href="blog.html">Our Blog</a></li>
											<li><a href="search.html">Search Terms</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-lg-3">
								<div class="footer-block collapsed-mobile">
									<div class="title">
										<h4>MY ACCOUNT</h4>
										<div class="toggle-arrow"></div>
									</div>
									<div class="collapsed-content">
										<ul class="marker-list">
											<li><a href="account-create.html">My account</a></li>
											<li><a href="login.html">Logination</a></li>
											<li><a href="cart.html">My cart</a></li>
											<li><a href="wishlist.html">My wishlist</a></li>
											<li><a href="search.html">Search Terms</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-lg-3">
								<div class="footer-block collapsed-mobile">
									<div class="title">
										<h4>CUSTOMER CARE</h4>
										<div class="toggle-arrow"></div>
									</div>
									<div class="collapsed-content">
										<ul class="marker-list">
											<li><a href="blog.html">Our Blog</a></li>
											<li><a href="search.html">Search Terms</a></li>
											<li><a href="contact.html">Contact Us</a></li>
											<li><a href="faq.html">Customer Service</a></li>
											<li><a href="about.html">Privacy Policy</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-lg-3">
								<div class="footer-block collapsed-mobile">
									<div class="title">
										<h4>CONTACT US</h4>
										<div class="toggle-arrow"></div>
									</div>
									<div class="collapsed-content">
										<ul class="simple-list">
											<li><i class="icon icon-phone"></i>+01 234 567 89</li>
											<li><i class="icon icon-close-envelope"></i><a href="mailto:support@seiko.com">support@seiko.com</a></li>
											<li><i class="icon icon-clock"></i>8:00 - 19:00, Monday - Saturday</li>
										</ul>
										<div class="footer-social">
											<a href="#"><i class="icon icon-facebook-logo icon-circled"></i></a> <a href="#"><i class="icon icon-twitter-logo icon-circled"></i></a> <a href="#"><i class="icon icon-skype-logo icon-circled"></i></a> <a href="#"><i class="icon icon-vimeo icon-circled"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bot">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-8">
								<div class="image-banner text-center">
									<a href="#"> <img src="{{asset('frontend_assets/images/banners/footer-banner.jpg')}}" alt="Footer Banner" class="img-responsive"> </a>
								</div>
							</div>
							<div class=" col-md-6 col-lg-4">
								<div class="footer-copyright text-center"> © 2016 Demo Store. All Rights Reserved. </div>
								<div class="footer-payment-link text-center">
									<a href="#"><img src="frontend_assets/images/payment-logo/icon-pay-1.png" alt=""></a>
									<a href="#"><img src="frontend_assets/images/payment-logo/icon-pay-2.png" alt=""></a>
									<a href="#"><img src="frontend_assets/images/payment-logo/icon-pay-3.png" alt=""></a>
									<a href="#"><img src="frontend_assets/images/payment-logo/icon-pay-4.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			<a class="back-to-top back-to-top-mobile" href="#">
				<i class="icon icon-angle-up"></i> To Top
			</a>
		</div>
		<!-- /Page -->
	</div>
	<!-- ProductStack -->
	<div class="productStack disable hide_on_scroll">
		<a href="#" class="toggleStack"><i class="icon icon-cart"></i> (6) items</a>
		<div class="productstack-content">
			<div class="products-list-wrapper">
				<ul class="products-list">
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-10.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a href="#" class="action edit" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-11.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-12.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-13.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-14.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-15.jpg" alt=""></a>
						<span class="item-qty">3</span>
						<div class="actions">
							<a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a>
							<a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="action-cart">
				<button type="button" class="btn" title="Checkout"> <span>Checkout</span> </button>
				<button type="button" class="btn" title="Go to Cart"> <span>Go to Cart</span> </button>
			</div>
			<div class="total-cart">
				<div class="items-total">Items <span class="count">6</span></div>
				<div class="subtotal">Subtotal <span class="price">2.150</span></div>
			</div>
		</div>
	</div>
	<!-- /ProductStack -->
	<!-- Modal Quick View -->
	<div class="modal quick-view zoom" id="quickView">
		<div class="modal-dialog">
			<div class="modalLoader-wrapper">
				<div class="modalLoader bg-striped"></div>
			</div>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&#10006;</button>
			</div>
			<div class="modal-content">
				<iframe></iframe>
			</div>
		</div>
	</div>
	<!-- /Modal Quick View -->

	<!-- jQuery Scripts  -->
	<script src="{{asset('frontend_assets/js/vendor/jquery/jquery.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/swiper/swiper.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/slick/slick.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/parallax/parallax.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/isotope/isotope.pkgd.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/magnificpopup/dist/jquery.magnific-popup.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/countdown/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/ez-plus/jquery.ez-plus.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/tocca/tocca.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/scrollLock/jquery-scrollLock.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/darktooltip/dist/jquery.darktooltip.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/vendor/instafeed/instafeed.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/megamenu.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/tools.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/app.js')}}"></script>


</body>
</html>