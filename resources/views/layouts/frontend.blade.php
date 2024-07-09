<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hello World!</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>

<body>
    <header class="site-header">
        <div class="header-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-10 col-lg-4">
                        <h1 class="flex site-branding">
                            <a href="#">{{$setting->title}}</a>
                        </h1>
                    </div>

                    <div class="col-2 col-lg-8">
                        <nav class="site-navigation">
                            <div class="hamburger-menu d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div><!-- .hamburger-menu -->

                            <ul>
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                                <li><a><i class="fas fa-search"></i></a></li>
                            </ul><!-- flex -->
                        </nav><!-- .site-navigation -->
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- container-fluid -->
        </div><!-- header-bar -->
    </header><!-- .site-header -->

    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-10">
                    <div class="entry-header">
                        <h2>Informatika!</h2>
                    </div><!-- .entry-header -->

                    <div class="flex flex-wrap text-center countdown justify-content-between" data-date="{{$count_down}}">
                        <div class="countdown-holder">
                            <div class="dday"></div>
                            <label>Days</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dhour"></div>
                            <label>Hours</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dmin"></div>
                            <label>Minutes</label>
                        </div><!-- .countdown-holder -->

                        <div class="countdown-holder">
                            <div class="dsec"></div>
                            <label>Seconds</label>
                        </div><!-- .countdown-holder -->
                    </div><!-- .countdown -->
                </div><!-- .col-12 -->
            </div><!-- row -->

            <div class="row">
                <div class="col-12 ">
                    <div class="entry-footer">
                        <a href="{{route('login')}}" class="btn ">Klik untuk Login</a>
                        <a href="{{route('register')}}" class="mt-2 btn current">Daftar akun sekarang!</a>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </div><!-- .hero-content -->

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="pt-5 col-12">
                    <div class="tabs">
                        <ul class="flex tabs-nav">
                            <li class="flex tab-nav justify-content-center align-items-center active" data-target="#tab_details">Details</li>
                            @foreach ($notif as $item)
                            <li class="flex tab-nav justify-content-center align-items-center" data-target="#tab_{{$item->name}}">{{$item->name}}</li>
                            @endforeach
                        </ul><!-- tabs-nav -->

                        <div class="tabs-container">
                            <div id="tab_details" class="tab-content">
                                <div class="flex flex-wrap justify-content-between">
                                    <div class="single-event-details">
                                        <h3>Timeline acara</h3>
                                        @foreach ($timeline as $item)
                                        <div class="single-event-details-row">

                                            <label for="">{{$item->name}}|{{$item->start_time}} - {{$item->end_time}}</label>
                                            <p>{{$item->description}}</p>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="single-event-map">
                                        <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb={{$setting->link_maps}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                                    </div>
                                </div>
                            </div><!-- .tab-content -->
                            @foreach ($notif as $item)
                            <div id="tab_{{$item->name}}" class="tab-content">
                                <p>{{$item->description}}</p>
                            </div><!-- .tab-content -->
                            @endforeach
                        </div><!-- .tabs-container -->
                    </div><!-- .tabs -->
                </div><!-- .col-12 -->
                <div class="col-12">

                    <div class="the-complete-lineup">
                        <div class="entry-title">
                            <p>JUST THE BEST</p>
                            <h2>The Complete Lineup</h2>
                        </div><!-- entry-title -->

                        <div class="row the-complete-lineup-artists">
                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-1.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Miska Smith</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-2.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Hayley Down</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-3.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>The Band Song</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-4.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Pink Machine</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-5.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Brasil Band</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-6.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Mickey</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-7.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>DJ Girl</h2>
                            </div><!-- artist-single -->

                            <div class="col-6 col-md-4 col-lg-3 artist-single">
                                <figure class="featured-image">
                                    <a href="#"> <img src="{{ asset('frontend/images/image-8.jpg') }}" alt=""> </a>
                                    <a href="#" class="box-link"> <img src="{{ asset('frontend/images/box.jpg') }}" alt=""> </a>
                                </figure><!-- featured-image -->

                                <h2>Stan Smith</h2>
                            </div><!-- artist-single -->
                        </div><!-- the-complete-lineup-artists -->

                        <div class="row justify-content-center">
                            <div class="see-complete-lineup">
                                <div class="entry-footer">
                                    <a href="#" class="btn">See all lineup</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- the-complete-lineup -->

                </div><!-- col-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!-- site-footer -->

    <script type='text/javascript' src='{{asset('frontend/js/jquery.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/masonry.pkgd.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/jquery.collapsible.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/swiper.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/jquery.countdown.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/circle-progress.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/jquery.countTo.min.js') }}'></script>
    <script type='text/javascript' src='{{asset('frontend/js/custom.js') }}'></script>
</body>
</html>
