<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="TechWave">
<meta name="author" content="SRBThemes">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>User Settings - Boorie</title>


<script>
	if (!localStorage.frenify_skin) {
		localStorage.frenify_skin = 'dark';
	}
	if (!localStorage.frenify_panel) {
		localStorage.frenify_panel = '';
	}
	document.documentElement.setAttribute("data-techwave-skin", 'light');
	if(localStorage.frenify_panel !== ''){
		document.documentElement.classList.add(localStorage.frenify_panel);
	}
  	
</script>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&amp;family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<!-- !Google Fonts -->

<!-- Styles -->
<link type="text/css" rel="stylesheet" href="css/plugins8a54.css?ver=1.0.0" />
<link type="text/css" rel="stylesheet" href="css/style8a54.css?ver=1.0.0" />
<!--[if lt IE 9]> <script type="text/javascript" src="js/modernizr.custom.js"></script> <![endif]-->
<!-- !Styles -->

</head>

<body>


<!-- Moving Submenu -->
<div class="techwave_fn_fixedsub">
	<ul></ul>
</div>
<!-- !Moving Submenu -->

<!-- Preloader -->
<div class="techwave_fn_preloader">
	<svg>
		<circle class="first_circle" cx="50%" cy="50%" r="110"></circle>
		<circle class="second_circle" cx="50%" cy="50%" r="110"></circle>
	</svg>
</div>
<!-- !Preloader -->


<!-- MAIN WRAPPER -->
<div class="techwave_fn_wrapper">
	<div class="techwave_fn_wrap">
	
	
		<!-- Searchbar -->
		<div class="techwave_fn_searchbar">
			<div class="search__bar">
				<input class="search__input" type="text" placeholder="Search here...">
				<img src="svg/search.svg" alt="" class="fn__svg search__icon">
				<a class="search__closer" href="#"><img src="svg/close.svg" alt="" class="fn__svg"></a>
			</div>
			<div class="search__results">
				<!-- Results will come here (via ajax after the integration you made after purchase as it doesn't work in HTML) -->
				<div class="results__title">Results</div>
				<div class="results__list">
					<ul>
						<li><a href="#">Artificial Intelligence</a></li>
						<li><a href="#">Learn about the impact of AI on the financial industry</a></li>
						<li><a href="#">Delve into the realm of AI-driven manufacturing</a></li>
						<li><a href="#">Understand the ethical implications surrounding AI</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- !Searchbar -->
		
		<!-- HEADER -->
		<header class="techwave_fn_header">
		
			<!-- Header left: token information -->
			<div class="header__left">
				<div class="fn__token_info">
					<span class="token_summary">
						<span class="count">120</span>
						<span class="text">Tokens<br>Remain</span>
					</span>
					<div class="token__popup">
						Resets in <span>19 hours.</span><br>
						Daily limit is <span>200 tokens</span>
					</div>
				</div>
			</div>
			<!-- /Header left: token information -->
			
			
			<!-- Header right: navigation bar -->
			<div class="header__right">
				<div class="fn__nav_bar">
					
					<!-- Search (bar item) -->
					<div class="bar__item bar__item_search">
						<a href="#" class="item_opener">
							<img src="svg/search.svg" alt="" class="fn__svg">
						</a>
						<div class="item_popup">
							<input type="text" placeholder="Search">
						</div>
					</div>
					<!-- !Search (bar item) -->
					
					<!-- Notification (bar item) -->
					<div class="bar__item bar__item_notification has_notification">
						<a href="#" class="item_opener">
							<img src="svg/bell.svg" alt="" class="fn__svg">
						</a>
						<div class="item_popup">
							<div class="ntfc_header">
								<h2 class="ntfc_title">Notifications</h2>
								<a href="notifications.html">View All</a>
							</div>
							<div class="ntfc_list">
								<ul>
									<li>
										<p><a href="notification-single.html">Version 1.1.0 has been launched</a></p>
										<span>34 Min Ago</span>
									</li>
									<li>
										<p><a href="notification-single.html">Video Generation has been released</a></p>
										<span>12 Apr</span>
									</li>
									<li>
										<p><a href="notification-single.html">Terms has been updated</a></p>
										<span>12 Apr</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- !Notification (bar item) -->
					
					<!-- Full Screen (bar item) -->
					<div class="bar__item bar__item_fullscreen">
						<a href="#" class="item_opener">
							<img src="svg/fullscreen.svg" alt="" class="fn__svg f_screen">
							<img src="svg/smallscreen.svg" alt="" class="fn__svg s_screen">
						</a>
					</div>
					<!-- !Full Screen (bar item) -->
					
					<!-- Language (bar item) -->
					<div class="bar__item bar__item_language">
						<a href="#" class="item_opener">
							<img src="svg/language.svg" alt="" class="fn__svg">
						</a>
						<div class="item_popup">
							<ul>
								<li>
									<span class="active">English</span>
								</li>
								<li>
									<a href="#">Spanish</a>
								</li>
								<li>
									<a href="#">French</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- !Language (bar item) -->
					
					<!-- Site Skin (bar item) -->
					<div class="bar__item bar__item_skin">
						<a href="#" class="item_opener">
							<img src="svg/sun.svg" alt="" class="fn__svg light_mode">
							<img src="svg/moon.svg" alt="" class="fn__svg dark_mode">
						</a>
					</div>
					<!-- !Site Skin (bar item) -->
					
					<!-- User (bar item) -->
					<div class="bar__item bar__item_user">
					@if(isset($userinfo['userimg']))
						<a href="#" class="user_opener fn__tooltip" title="User Profile">
							<img src="{{$userinfo['userimg']}}" alt="">
						</a>
					@else
					<a href="#" class="user_opener fn__tooltip" title="User Profile">
							<img src="/images/user/user.jpg" alt="">
						</a>
					@endif
						<div class="item_popup" data-position="right">
							<div class="user_profile">
								<div class="user_img">
								@if(isset($userinfo['userimg']))
									<img src="{{$userinfo['userimg']}}" alt="">
								@else
									<img src="/images/user/user.jpg" alt="">
								@endif
								</div>
								<div class="user_info">
									<h2 class="user_name"> {{ $userinfo['username'] }}<span>Free</span></h2>
									<p><a href="mailto:cadmail@gmail.com" class="user_email"> {{ $userinfo['usermail'] }}</a></p>
								</div>
							</div>
							<div class="user_nav">
								<ul>
									<li>
										<a href="user-profile.html">
											<span class="icon"><img src="/svg/person.svg" alt="" class="fn__svg"></span>
											<span class="text">Profile</span>
										</a>
									</li>
									<li>
										<a href="{{url('/settings?test=false')}}">
											<span class="icon"><img src="/svg/setting.svg" alt="" class="fn__svg"></span>
											<span class="text">Settings</span>
										</a>
									</li>
									<li>
										<a href="user-billing.html">
											<span class="icon"><img src="/svg/billing.svg" alt="" class="fn__svg"></span>
											<span class="text">Billing</span>
										</a>
									</li>
									<li>
										<a href="{{ url('/') }}">
											<span class="icon"><img src="/svg/logout.svg" alt="" class="fn__svg"></span>
											<span class="text">Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- !User (bar item) -->
					
					
				</div>
			</div>
			<!-- !Header right: navigation bar -->
			
		</header>
		<!-- !HEADER -->
		
		
		<!-- LEFT PANEL -->
		<div class="techwave_fn_leftpanel">
			
			<div class="mobile_extra_closer"></div>
			
<!-- logo (left panel) -->
<div class="leftpanel_logo">
				<a href="{{ url('/dashboard') }}" class="fn_logo">
					<span class="full_logo">
						<img src="/images/logo_boorie.png" alt="" class="desktop_logo">
						<img src="/images/logo_boorie.png" alt="" class="retina_logo">
					</span>
					<span class="short_logo">
						<img src="/images/minilogo.png" alt="" class="desktop_logo">
						<img src="/images/minilogo.png" alt="" class="retina_logo">
					</span>
				</a>
				<a href="#" class="fn__closer fn__icon_button desktop_closer">
					<img src="/svg/arrow.svg" alt="" class="fn__svg">
				</a>
				<a href="#" class="fn__closer fn__icon_button mobile_closer">
					<img src="/svg/arrow.svg" alt="" class="fn__svg">
				</a>
			</div>
			<!-- !logo (left panel) -->
			
			<!-- content (left panel) -->
			<div class="leftpanel_content">
			
<!-- #1 navigation group -->
<div class="nav_group">
					<h2 class="group__title">Start Here</h2>
					<ul class="group__list">
						<li>
							<a href="{{ url('/dashboard') }}" class="fn__tooltip active menu__item" data-position="right" title="Home">
								<span class="icon"><img src="/svg/home.svg" alt="" class="fn__svg"></span>
								<span class="text">Home</span>
							</a>
						</li>
						
					</ul>
				</div>
				<!-- !#1 navigation group -->
			
				<!-- #2 navigation group -->
				<div class="nav_group">
					<h2 class="group__title">User Tools</h2>
					<ul class="group__list">
						<li>
							<a href="{{ url('/mesages/ai-chat-bot') }}" class="fn__tooltip menu__item" data-position="right" title="AI Chat Bot">
								<span class="icon"><img src="/svg/chat.svg" alt="" class="fn__svg"></span>
								<span class="text">AI Chat Bot</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- !#2 navigation group -->
			
				<!-- #3 navigation group -->
				<div class="nav_group">
					<h2 class="group__title">Support</h2>
					<ul class="group__list">
						<li>
							<a href="pricing.html" class="fn__tooltip menu__item" data-position="right" title="Pricing">
								<span class="icon"><img src="svg/dollar.svg" alt="" class="fn__svg"></span>
								<span class="text">Pricing</span>
							</a>
						</li>
						<li class="menu-item-has-children">
							<a href="video-generation.html" class="fn__tooltip menu__item" title="FAQ &amp; Help" data-position="right">
								<span class="icon"><img src="svg/question.svg" alt="" class="fn__svg"></span>
								<span class="text">FAQ &amp; Help</span>
								<span class="trigger"><img src="svg/arrow.svg" alt="" class="fn__svg"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="documentation.html"><span class="text">Documentation</span></a>
								</li>
								<li>
									<a href="faq.html"><span class="text">FAQ</span></a>
								</li>
								<li>
									<a href="changelog.html"><span class="text">Changelog<span class="fn__sup">(1.1.0)</span></span></a>
								</li>
								<li>
									<a href="contact.html"><span class="text">Contact Us</span></a>
								</li>
								<li>
									<a href="index-2.html"><span class="text">Home #2</span></a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ url('/') }}" class="fn__tooltip menu__item" data-position="right" title="Log Out">
								<span class="icon"><img src="svg/logout.svg" alt="" class="fn__svg"></span>
								<span class="text">Log Out</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- !#3 navigation group -->
				
				
			</div>
			<!-- !content (left panel) -->
			
		</div>
		<!-- !LEFT PANEL -->
		
		
		<!-- CONTENT -->
		<div class="techwave_fn_content">
		
			<!-- PAGE (all pages go inside this div) -->
			<div class="techwave_fn_page">
				
				<!-- User Settings Page -->
				<div class="techwave_fn_user_settings_page">
					<!-- Page Title -->
					<div class="techwave_fn_pagetitle">
						<h2 class="title">Settings</h2>
					</div>
					<!-- !Page Title -->
				
					<div class="container small">
						<div class="techwave_fn_user_settings">
							<form  method="POST" action="{{ route('settings.update-userinfo') }}" enctype="multipart/form-data">
							@csrf	
                            <div class="user__settings">
									<div class="settings_left">
									
										<!-- Upload Shortcode -->
										<label class="fn__upload">
											<span onclick="showInputImage()" class="upload_content">
											<div id="boxUpload">	
											<img src="svg/upload.svg" alt="" class="fn__svg">
												</br>
												<span class="title">Drag & Drop a Image</span>
												<span class="fn__lined_text">
													<span class="line"></span>
													<span class="text">Or</span>
													<span class="line"></span>
												</span>
												<span class="title">Browse</span>
												<span >Supports JPG, JPEG, and PNG</span>
											</div>
											<div id="ImageUpload">
												<a href="#" class="fn__closer fn__icon_button">
													<img src="svg/close.svg" alt="" class="fn__svg">
												</a>
												
												<img src="" id="ImageLogin" name="ImageLogin" alt="" class="preview_img">
											</div>
											
											</span>
											
											
											
										</label>
										
										<!-- !Upload Shortcode -->
									
									</div>

									<div class="settings_right">
										<div class="item">
											<label class="input_label" for="username">Username</label>
											<div class="input_item">

												<input class="input" type="text" name="nameuser" id="nameuser" value="{{ $userinfo['username'] }}">
											</div>
										</div>
										<div class="item">
											<label class="input_label" for="email">Email Address</label>
											<div class="input_item">
												<input class="input" type="text" name="emailuser" id="emailuser" value="{{ $userinfo['usermail'] }}">
											</div>
										</div>
										<div class="item">
											<label class="input_label" for="password">Password</label>
											<div class="input_item">
												<input class="input" type="password" name="pwduser" id="pwduser" value="{{ $userinfo['password'] }}">
											</div>
										</div>
										<div id="inputImage" class="item">
											<label class="input_label" for="image">Image URL</label>
											<div class="input_item">
												<input class="input" type="text" name="image" id="image"  accept="image/*">
											</div>
										</div>
										

										<div class="item">
											
                                                <button class="techwave_fn_button">Save Changes</button>
											
										</div>
                                        <input type="text" id="user_email" name="user_email" style="display: none" value="{{ $userinfo['usermail'] }}" />
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
				<!-- !User Settings Page -->
				
			</div>
			<!-- !PAGE (all pages go inside this div) -->
			
			
			<!-- FOOTER (inside the content) -->
			<footer class="techwave_fn_footer">
				<div class="techwave_fn_footer_content">
					<div class="copyright">
						<p><script>document.write(new Date().getFullYear())</script>© SRBThemes</p>
					</div>
					<div class="menu_items">
						<ul>
							<li><a href="terms.html">Terms of Service</a></li>
							<li><a href="privacy.html">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</footer>
			<!-- !FOOTER (inside the content) -->
			
		</div>
		<!-- !CONTENT -->
		
		
	</div>
</div>
<!-- !MAIN WRAPPER -->



<!-- Scripts -->
<script type="text/javascript" src="js/jquery8a54.js?ver=1.0.0"></script>
<script type="text/javascript" src="js/plugins8a54.js?ver=1.0.0"></script>
<!--[if lt IE 10]> <script type="text/javascript" src="js/ie8.js"></script> <![endif]-->
<script type="text/javascript" src="js/init8a54.js?ver=1.0.0"></script>
<!-- !Scripts -->

</body>

<!-- Mirrored from techwave-laravel-light.vercel.app/user-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Apr 2024 10:45:43 GMT -->
</html>
<script>
	
	
	
	document.getElementById("ImageUpload").style.visibility = "hidden";
	document.getElementById("inputImage").style.visibility = "hidden";
	
		var test=JSON.parse("{{ request()->get('test')}}");
  		if (test == true) {
			document.getElementById("ImageUpload").style.visibility = "visible";
			document.getElementById("ImageLogin").src="{{ request()->get('userimg')}}";
			document.getElementById("boxUpload").remove();
		}
		else{
			document.getElementById("boxUpload").add();
			document.getElementById("ImageUpload").style.visibility = "hidden";
		}	
	
	function showInputImage(){
		document.getElementById("inputImage").style.visibility = "visible";
	}
</script>