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
      <a class="navbar-brand" href="/home">
        <img src="/images/logo/logo2.png" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown active dropdown-slide">
          <a class="nav-link" href="/home"  data-toggle="dropdown">Home
            <span>/</span>
          </a>
          <!-- Dropdown list -->
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/home">Homepage</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="speakers.html">Speakers
            <span>/</span>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="#" data-toggle="dropdown">Pages<span>/</span></a>
            <!-- Dropdown list -->
            <div class="dropdown-menu">
              <a class="dropdown-item" href="about-us.html">About Us</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="schedule.html">Schedule<span>/</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sponsors.html">Sponsors<span>/</span></a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="#"  data-toggle="dropdown">News
            <span>/</span>
          </a>
          <!-- Dropdown list -->
          <div class="dropdown-menu">
            <a class="dropdown-item" href="news.html">News without sidebar</a>
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
					<h3>News Details</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  <li class="breadcrumb-item active">News Details</li>
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
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="block">
					<!-- Article -->
					<article class="blog-post single">
						<div class="post-thumb">
							<img src="/images/{{ $event->image_path }}" alt="post-image" class="img-fluid" width="730px" height="464px">
						</div>
						<div class="post-content">
                            @php
                            $date = $event->date;
                            $formattedDate = date("j", strtotime($date));
                            $formattedMonth = substr(date("F", strtotime($date)), 0, 3);
                           @endphp
							<div class="date">
								<h4>{{ $formattedDate }}<span>{{ $formattedMonth }}</span></h4>
							</div>
							<div class="post-title">
								<h3>{{ $event->title }}</h3>
							</div>
							<div class="post-meta">
								<ul class="list-inline">
									<li class="list-inline-item">
										<i class="fa fa-user-o"></i>
										<a href="#">Admin</a>
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
							<div class="post-details">
								<div class="quotes">
									<blockquote>{{ $event->description }}</blockquote>
								</div>

								<div class="share-block">
									<div class="tag">
										<p>
											Organize In:
										</p>
										<ul class="list-inline">
											<li class="list-inline-item">
												<a href="#">{{ $event->place }}</a>
											</li>
										</ul>
									</div>

									<div class="share">
										<p>
											Share:
										</p>
										<ul class="social-links-share list-inline">
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
                            <div class="d-flex">
                                <p class="mr-2 ">
                                    By:
                                </p>
                                <a href="#"><strong>{{ $event->user_name }}</strong></a>
                            </div>

						</div>
					</article>
					<!-- Comment Section -->
					<div class="comments">
						<h5>Comments (3)</h5>
						<!-- Comment -->
						<div class="media comment">
							<img src="/assets/images/speakers/speaker-thumb-four.jpg" alt="image">
							<div class="media-body">
								<h6>Jessica Brown</h6>
								<ul class="list-inline">
									<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
									<li class="list-inline-item"><a href="#">Reply</a></li>
								</ul>
								<p>
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi ut aliquip commodo consequat.
								</p>
								<!-- Nested Comment -->
								<div class="media comment">
									<img src="/assets/images/speakers/speaker-thumb-three.jpg" alt="image">
									<div class="media-body">
										<h6>Jonathan Doe</h6>
										<ul class="list-inline">
											<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
										</ul>
										<p>
											Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- Comment -->
						<div class="media comment">
							<img src="/assets/images/speakers/speaker-thumb-two.jpg" alt="image">
							<div class="media-body">
								<h6>Adam Smith</h6>
								<ul class="list-inline">
									<li class="list-inline-item"><span class="fa fa-calendar"></span>Mar 20, 2016</li>
									<li class="list-inline-item"><a href="#">Reply</a></li>
								</ul>
								<p>
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant tota rem ape riamipsa eaque  quae nisi ut aliquip commodo consequat.
								</p>
							</div>
						</div>
					</div>
					<div class="comment-form">
						<h5>Leave A Comment</h5>
						<form action="#" class="row">
							<div class="col-12">
								<textarea class="form-control main" name="comment" id="comment" rows="10" placeholder="Your Review"></textarea>
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control main" name="text" id="name" placeholder="Your Name">
							</div>
							<div class="col-md-6">
								<input type="email" class="form-control main" name="email" id="email" placeholder="Your Email">
							</div>
							<div class="col-12">
								<button class="btn btn-main-md" type="submit">Submit Now</button>
							</div>
						</form>
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
