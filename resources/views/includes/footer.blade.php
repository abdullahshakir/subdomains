<footer id="footer" class="dark p-0">
    <div class="container">
        <div class="footer-widgets-wrap">
            <div class="row col-mb-50">
                <div class="col-lg-8">
                    <div class="row col-mb-50">
                        <div class="col-md-6">
                            <div class="widget clearfix">
                                <img src="assets/images/footer-widget-logo.png" alt="Image" class="footer-logo">
                                <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong>
                                    Design Standards.</p>
                                <div
                                    style="background: url('assets/images/world-map.png') no-repeat center center; background-size: 100%;">
                                    <address>
                                        <strong>Headquarters:</strong>
                                        {{$footer->address}}
                                    </address>
                                    <abbr title="Phone Number"><strong>Phone:</strong></abbr>{{$footer->phone}}<br>
                                    <abbr title="Fax"><strong>Fax:</strong></abbr>{{$footer->fax}}<br>
                                    <abbr title="Email Address"><strong>Email:</strong></abbr> {{$footer->email}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row col-mb-50">
                        <div class="col-md-4 col-lg-12">
                            <div class="widget clearfix" style="margin-bottom: -20px;">
                                <div class="row">
                                    <div class="col-lg-6 bottommargin-sm">
                                        <div class="counter counter-small"><span data-from="50" data-to="{{$footer->total_download}}"
                                                                                 data-refresh-interval="80"
                                                                                 data-speed="3000"
                                                                                 data-comma="true"></span></div>
                                        <h5 class="mb-0">Total Downloads</h5>
                                    </div>
                                    <div class="col-lg-6 bottommargin-sm">
                                        <div class="counter counter-small"><span data-from="100" data-to="{{$footer->total_client}}"
                                                                                 data-refresh-interval="50"
                                                                                 data-speed="2000"
                                                                                 data-comma="true"></span></div>
                                        <h5 class="mb-0">Clients</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-12">
                            <div class="widget subscribe-widget clearfix">
                                <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers
                                    &amp; Inside Scoops:</h5>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="widget-subscribe-form" action="include/subscribe.php" method="post"
                                      class="mb-0">
                                    <div class="input-group mx-auto">
                                        <div class="input-group-text"><i class="icon-email2"></i></div>
                                        <input type="email" id="widget-subscribe-form-email"
                                               name="widget-subscribe-form-email" class="form-control required email"
                                               placeholder="Enter your Email">
                                        <button class="btn btn-success" type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-12">
                            <div class="widget clearfix" style="margin-bottom: -20px;">
                                <div class="row">
                                    <div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
                                        <a href="#" class="social-icon si-dark si-colored si-facebook mb-0"
                                           style="margin-right: 10px;">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="{{$footer->facebook_link}}"><small style="display: block; margin-top: 3px;"><strong>Like
                                                    us</strong><br>on Facebook</small></a>
                                    </div>
                                    <div class="col-6 col-md-12 col-lg-6 clearfix">
                                        <a href="{{$footer->subscriber_link}}" class="social-icon si-dark si-colored si-rss mb-0"
                                           style="margin-right: 10px;">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#"><small
                                                style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to
                                                RSS Feeds</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .footer-widgets-wrap end -->
    </div>
    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">
            <div class="row col-mb-30">
                <div class="col-md-12 text-center">
                    Copyrights &copy; {{ now()->year }} All Rights Reserved by
                    {{--                            <span>site name.</span>--}}
                    <br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>
{{--                <div class="col-md-6 text-center text-md-end">--}}
{{--                    <div class="clear mt-4"></div>--}}
{{--                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i--}}
{{--                        class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i--}}
{{--                        class="icon-skype2"></i> CanvasOnSkype--}}
{{--                </div>--}}
            </div>
        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->
<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<!-- JavaScripts
============================================= -->
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ URL::asset('assets/js/functions.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#datatable1').dataTable();
    });
</script>
<script src="{{ asset('assets/js/components/bs-datatable.js')}}"></script>

