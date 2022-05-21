<!-- Header
  ============================================= -->
<header id="header" class="full-header pl-0 transparent-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                    ============================================= -->
                <div id="logo">
                    <a href="{{route('home-page')}}" class="standard-logo" data-dark-logo="assets/images/logo-dark.png"><img
                            src="{{ URL::asset('assets/images/logo.png') }}" alt="Canvas Logo"></a>
                    <a href="{{route('home-page')}}" class="retina-logo" data-dark-logo="assets/images/logo-dark@2x.png"><img
                            src="{{ URL::asset('assets/images/logo@2x.png') }}" alt="Canvas Logo"></a>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
                    ============================================= -->
                <nav class="primary-menu" id="#navbar">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('home-page')}}">
                                <div>Home</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#services">
                                <div>Services</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#gallery">
                                <div>Gallery</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#portfol">
                                <div>Portfolio</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#aboutus">
                                <div>About us</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#contactus">
                                <div>Contact us</div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #footer end -->

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 pl-0 include-header">
    <div class="slider-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">{{$slider->title}}</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">
                                {{$slider->sub_title}}
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide-bg"
                         style="background-image: url('http://php.subdomain.com:8000/.{{$slider->file}}');"></div>
                </div>
                @empty
                    <p class="text-center">Not record yet</p>
                @endforelse
{{--                <div class="swiper-slide dark">--}}
{{--                    <div class="container">--}}
{{--                        <div class="slider-caption slider-caption-center">--}}
{{--                            <h2 data-animate="fadeInUp">Beautifully Flexible</h2>--}}
{{--                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful--}}
{{--                                &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive--}}
{{--                                functionality that can be adapted to any screen size.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="video-wrap">--}}
{{--                        <video id="slide-video" poster="assets/images/videos/explore-poster.jpg" preload="auto" loop autoplay--}}
{{--                               muted>--}}
{{--                            <source src='assets/images/videos/explore.webm' type='video/webm'/>--}}
{{--                            <source src='assets/images/videos/explore.mp4' type='video/mp4'/>--}}
{{--                        </video>--}}
{{--                        <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="swiper-slide">--}}
{{--                    <div class="container">--}}
{{--                        <div class="slider-caption">--}}
{{--                            <h2 data-animate="fadeInUp">Great Performance</h2>--}}
{{--                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be--}}
{{--                                surprised to see the Final Results of your Creation &amp; would crave for more.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide-bg"--}}
{{--                         style="background-image: url('assets/images/slider/swiper/3.jpg'); background-position: center top;">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
        </div>

        <a href="#" data-scrollto="#content" data-offset="100" class="one-page-arrow dark"><i
                class="icon-angle-down infinite animated fadeInDown"></i></a>

    </div>
</section>
