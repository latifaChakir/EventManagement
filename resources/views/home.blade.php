<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eventre</title>

  <!-- /assets/plugins CSS STYLE -->
  <!-- Bootstrap -->
  <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Themefisher Font -->
  <link href="/assets/plugins/themefisher-font/style.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/assets/plugins/font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="/assets/plugins/slick/slick.css" rel="stylesheet">
  <link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- FAVICON -->
  <link href="/assets/images/favicon.png" rel="shortcut icon">

</head>

<body class="body-wrapper">


<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="index.html">
        <img src="/images/logo/logo2.png" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown active dropdown-slide">
          <a class="nav-link" href="#"  data-toggle="dropdown">Home
            <span>/</span>
          </a>
          <!-- Dropdown list -->
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/home">Homepage</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Speakers
            <span>/</span>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="#" data-toggle="dropdown">Pages<span>/</span></a>
            <!-- Dropdown list -->
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">About Us</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schedule<span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sponsors<span>/</span></a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="/home"  data-toggle="dropdown">News
            <span>/</span>
          </a>
          <!-- Dropdown list -->
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/home">News </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      </ul>
      <a href="#" class="ticket">
        <img src="/assets/images/icon/ticket.png" alt="ticket">
        <span>Buy Ticket</span>
      </a>
      </div>
  </div>
</nav>

<!--====  End of Navigation Section  ====-->



<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Our News</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  <li class="breadcrumb-item active">Our News</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--================================
=            News Posts            =
=================================-->

<section class="news section">
	<div class="container">
		<div class="row mt-30">
			<div class="col-lg-4 col-md-10 mx-auto">
				<div class="sidebar">
					<!-- Search Widget -->
					<div class="widget search p-0">
						<div class="input-group">
						    <input type="text" class="form-control main m-0" id="expire" placeholder="Search...">
						    <span class="input-group-addon"><i class="fa fa-search"></i></span>
					    </div>
					</div>
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Categories</h5>
						<ul class="category-list m-0 p-0">
                            @foreach ($categories as $category)
							<li><a href="">{{ $category->name }}<span class="float-right">(6)</span></a></li>
                            @endforeach

						</ul>
					</div>


					<!-- Latest post -->
					<div class="widget latest-post">
						<h5 class="widget-header">Latest Event</h5>
						<!-- Post -->
                        @foreach ($latestevents as $latestEvent)

						<div class="media">
							<img src="/images/{{ $latestEvent->image_path }}" class="img-fluid" alt="post-thumb" width="40%" height="40%">
							<div class="media-body">
								<h6><a href="">{{ $latestEvent->title }}</a></h6>
								<p href="#"><span class="fa fa-calendar"></span>{{ $latestEvent->date }}</p>
							</div>
						</div>
                        @endforeach
					</div>
					<!-- Popular Tag Widget -->
					<div class="widget tags">
						<!-- Widget Header -->
						<h5 class="widget-header">Popular Tags</h5>
						<ul class="list-inline">
							<li class="list-inline-item"><a href="#">Culture</a></li>
							<li class="list-inline-item"><a href="#">Social</a></li>
							<li class="list-inline-item"><a href="#">News</a></li>
							<li class="list-inline-item"><a href="#">Events</a></li>
							<li class="list-inline-item"><a href="#">Sports</a></li>
							<li class="list-inline-item"><a href="#">Music</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="block">
					<div class="row">
                        @foreach ($events as $event)
						<div class="col-md-6 col-sm-8 col-10 m-auto">
							<div class="blog-post">
								<div class="post-thumb">
									<a href="/eventDetail/{{ $event->id }}">
										<img src="/images/{{ $event->image_path }}" alt="post-image" class="img-fluid">
									</a>
								</div>
                                @php
                                $date = $event->date;
                                $formattedDate = date("j", strtotime($date));
                                $formattedMonth = substr(date("F", strtotime($date)), 0, 3);
                               @endphp

								<div class="post-content">
									<div class="date">
                                        {{-- <h4>20<span>May</span></h4> --}}
                                        <h4>{{ $formattedDate }}<span>{{ $formattedMonth }}</span></h4>
									</div>
									<div class="post-title">
										<h2><a href="/eventDetail/{{ $event->id }}">{{ $event->title }}</a></h2>
									</div>
									<div class="post-meta">
										<ul class="list-inline">
											<li class="list-inline-item">
												<i class="fa fa-ticket"></i>
												<a href="/ticket/{{ $event->id }}">Ticket</a>
											</li>
											<li class="list-inline-item">
												<i class="fa fa-heart-o"></i>
												<a href="#">350</a>
											</li>
											<li class="list-inline-item">
												<i class="fa fa-comments-o"></i>
												<a href="#">30</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
						<div class="col-12">
							<!-- Pagination -->
							<nav>
							  <ul class="pagination">
							  	<li class="page-item">
							      <a class="page-link" href="#" aria-label="prev">
							        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
							        <span class="sr-only">prev</span>
							      </a>
							    </li>
							    <li class="page-item active"><a class="page-link" href="#">1</a></li>
							    <li class="page-item"><a class="page-link" href="#">2</a></li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#" aria-label="Next">
							        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							  </ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of News Posts  ====-->

<!--==============================================
=            Call to Action Subscribe            =
===============================================-->

<section class="cta-subscribe bg-subscribe overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mr-auto">
				<!-- Subscribe Content -->
				<div class="content">
					<h3>Subscribe to Our <span class="alternate">Newsletter</span></h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
				</div>
			</div>
			<div class="col-md-6 ml-auto align-self-center">
				<!-- Subscription form -->
				<form action="#" class="row">
					<div class="col-lg-8 col-md-12">
						<input type="email" class="form-control main white mb-lg-0" placeholder="Email">
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="subscribe-button">
							<button class="btn btn-main-md">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--====  End of Call to Action Subscribe  ====-->

<!--================================
=            Google Map            =
=================================-->

<section class="map">
	<!-- Google Map -->
	<div id="map"></div>
	<div class="address-block">
		<h4>Docklands Convention</h4>
		<ul class="address-list p-0 m-0">
			<li><i class="fa fa-home"></i><span>1201 Park Street, Fifth Avenue, <br>Dhanmondy, Dhaka.</span></li>
			<li><i class="fa fa-phone"></i><span>[88] 657 524 332</span></li>
		</ul>
		<a href="#" class="btn btn-white-md">Get Direction</a>
	</div>
</section>

<!--====  End of Google Map  ====-->

<!--============================
=            Footer            =
=============================-->

<footer class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <div class="footer-logo">
              <img src="/assets/images/footer-logo.png" alt="logo" class="img-fluid">
            </div>
            <ul class="social-links-footer list-inline">
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-instagram"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-rss"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="fa fa-vimeo"></i></a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
</footer>
<!-- Subfooter -->
<footer class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="copyright-text">
          <p><a href="#">Eventre</a> &#169; 2017 All Right Reserved</p>
        </div>
      </div>
      <div class="col-md-6">
          <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
  </div>
</footer>



  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="/assets/plugins/jquery/jquery.js"></script>
  <!-- Popper js -->
  <script src="/assets/plugins/popper/popper.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Smooth Scroll -->
  <script src="/assets/plugins/smoothscroll/SmoothScroll.min.js"></script>
  <!-- Isotope -->
  <script src="/assets/plugins/isotope/mixitup.min.js"></script>
  <!-- Magnific Popup -->
  <script src="/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="/assets/plugins/slick/slick.min.js"></script>
  <!-- SyoTimer -->
  <script src="/assets/plugins/syotimer/jquery.syotimer.min.js"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="/assets/plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="js/custom.js"></script>
</body>

</html>
