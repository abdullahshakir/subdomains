<section id="content" class="p-0">
    <div class="content-wrap">
        <div class="container clearfix" id="aboutus">
            <h3>About Us</h3>
            <div class="divider"><i class="icon-circle"></i></div>
        </div>
        <div class="row p-0 bottommargin-lg align-items-stretch">
            @forelse($aboutUs as $about)
                <div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: {{$about->color}}">
                    <div>
                        <h3 class="text-uppercase" style="font-weight: 600;">{{$about->title}}</h3>
                        <p style="line-height: 1.8;">
                            {{$about->description}}
                        </p>
{{--                        <a href="#" class="button button-border button-light button-rounded--}}
{{--                            button-reveal text-end text-uppercase m-0">--}}
{{--                            <i class="icon-angle-right"></i>--}}
{{--                            <span>Read More</span>--}}
{{--                        </a>--}}
                        <i class="icon-bulb bgicon"></i>
                    </div>
                </div>
            @empty
                <p class="text-center">Not record found</p>
            @endforelse
         </div>
        <div class="section m-0">
            <div class="container clearfix">
                <div class="row col-mb-50">

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn">
                        <i class="i-plain i-xlarge mx-auto icon-line2-directions"></i>
                        <div class="counter counter-lined"><span data-from="100" data-to="846"
                                                                 data-refresh-interval="50" data-speed="2000"></span>K+
                        </div>
                        <h5>Lines of Codes</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="200">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-graph"></i>
                        <div class="counter counter-lined"><span data-from="3000" data-to="15360"
                                                                 data-refresh-interval="100" data-speed="2500"></span>+
                        </div>
                        <h5>KBs of HTML Files</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="400">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-layers"></i>
                        <div class="counter counter-lined"><span data-from="10" data-to="408" data-refresh-interval="25"
                                                                 data-speed="3500"></span>*
                        </div>
                        <h5>No. of Templates</h5>
                    </div>

                    <div class="col-sm-6 col-lg-3 text-center" data-animate="bounceIn" data-delay="600">
                        <i class="i-plain i-xlarge mx-auto mb-0 icon-line2-clock"></i>
                        <div class="counter counter-lined"><span data-from="60" data-to="1200"
                                                                 data-refresh-interval="30" data-speed="2700"></span>+
                        </div>
                        <h5>Hours of Coding</h5>
                    </div>

                </div>

            </div>
        </div>
        <div class="container clearfix">
            <div class="heading-block center mt-lg-5">
                <h2>{{$withTeamMembers->title}}</h2>
                <span>{{$withTeamMembers->sub_title}}</span>
            </div>
            <div class="row col-mb-50 mb-0">
                @forelse($withTeamMembers['teamMembers'] as $members)
                <div class="col-lg-6">
                    <div class="team team-list row align-items-center">
                        <div class="team-image col-sm-6">
                            <img src="assets/images/team/3.jpg" alt="John Doe">
                        </div>
                        <div class="team-desc col-sm-6">
                            <div class="team-title"><h4>{{$members->name}}</h4><span>{{$members->designation}}</span></div>
                            <div class="team-content">
                                <p>{{$members->description}}</p>
                            </div>
                            <a href="{{$members->facebook_link}}" class="social-icon si-rounded si-small si-light si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="{{$members->twitter_link}}" class="social-icon si-rounded si-small si-light si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="{{$members->google_link}}" class="social-icon si-rounded si-small si-light si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-center">Not record found</p>
                @endforelse
            </div>
        </div>
    </div>
</section><!-- #content end -->
