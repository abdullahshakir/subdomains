<section id="content">
        <div class="container clearfix mb-6">
            <h3 id="contactus">Contact Us</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            <div class="row align-items-stretch col-mb-50 mb-0">
                <div class="col-lg-6">
                    <div class="form-widget">
                        <div class="form-result"></div>
                        <form class="mb-0" action="{{route('create.contact')}}" method="post"
                              enctype="multipart/form-data" id="template-contactform"
                              name="template-contactform">
                            @csrf
{{--                            {{ dd(Request::url()) }}--}}
                            <input type="hidden" name="themeId" value="1" />
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="name">Name <small>*</small></label>
                                    <input type="text" id="name" name="name" value="" class="sm-form-control required" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="email">Email <small>*</small></label>
                                    <input type="email" id="email" name="email" value="" class="required email sm-form-control" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" value="" class="sm-form-control" />
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-4 form-group">
                                    <label for="subject">Subject <small>*</small></label>
                                    <input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="location">Location <small>*</small></label>
                                    <input type="text" name="location" value="" class="required sm-form-control" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="service">Services</label>
                                    <select id="service" name="service" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Wordpress">Wordpress</option>
                                        <option value="PHP / MySQL">PHP / MySQL</option>
                                        <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                    </select>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12 form-group">
                                    <label for="message">Message <small>*</small></label>
                                    <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
                                </div>
                                <div class="col-12 form-group d-none">
                                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                </div>
                                <div class="col-12 form-group">
                                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0">Submit Comment</button>
                                </div>
                            </div>
                            <input type="hidden" name="prefix" value="template-contactform-">
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 min-vh-50">
                    <div class="gmap h-100" data-address="Melbourne, Australia" data-markers='[{address: "Melbourne, Australia", html: "<div class=\"p-2\" style=\"width: 300px;\"><h4 class=\"mb-2\">Hi! We are <span>Envato!</span></h4><p class=\"mb-0\" style=\"font-size:1rem;\">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day.</p></div>", icon:{ image: "images/icons/map-icon-red.png", iconsize: [32, 39], iconanchor: [32,39] } }]'></div>
                </div>
            </div>
            <div class="row col-mb-50">
                @forelse($connectivity['connectivity'] as $item)
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-bg fbox-plain">
                        <div class="fbox-icon">
                            <a href="#">
                                <img src="{{ $item->file }}"
                                     alt="{{ $item->file }}"
                                    style="border-radius: 50%"
                                >
                            </a>
{{--                            <i class="icon-map-marker2"></i>--}}
{{--                            <i class="icon-twitter2"></i>--}}
{{--                            <i class="icon-skype2"></i>--}}
{{--                            <i class="icon-phone3"></i>--}}
                        </div>
                        <div class="fbox-content">
                            <h3>{{$item->title}}<span class="subtitle">{{$item->description}}</span></h3>
                        </div>
                    </div>
                </div>
                @empty
                    <tr>
                        <td colspan="12" class="text-center"> No record found </td>
                    </tr>
                @endforelse
            </div>
        </div>
</section>
<script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>
