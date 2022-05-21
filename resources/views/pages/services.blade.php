<section id="content" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="section" id="services">
        <div class="container">
            <h3 class="m-0">Our Services</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            <div class="heading-block center">
                <h2>{{$withSubService->title}}</h2>
                <span>{{$withSubService->sub_title}}</span>
            </div>
            <div class="row col-mb-50">
                <div class="col-lg-4 text-center text-lg-start">
                    <img data-animate="fadeInLeftBig"
                         src="{{ $withSubService->file }}"
                         alt="{{ $withSubService->file }}"
                         width="100"
                    >
                </div>
                <div class="col-8">
                    <div class="row">
                        @forelse($withSubService['subServices'] as $subService)
                        <div class="col-lg-6 col-md-6 topmargin">
                            <div class="w-100 mb-5">
                                <div class="feature-box fbox-plain fbox-sm fbox-dark">
                                    <div class="fbox-icon">
                                        <a href="#">
                                            <img src="{{ $subService->icon }}"
                                                 alt="{{ $subService->icon }}"
                                                 width="100"
                                            >
{{--                                            <i class="icon-line-monitor"></i>--}}
                                        </a>
                                    </div>
                                    <div class="fbox-content">
                                        <h3>{{$subService->title}}</h3>
                                        <p>
                                            {{$subService->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p class="text-center">Not record yet</p>
                        @endforelse
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container clearfix">
        <div class="row col-mb-50">
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-crop i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Premium Sliders Included<span
                                class="subtitle">About 20+ Dedicated Slider Templates</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-tint i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Unlimited Color Options<span class="subtitle">16.7+ Million on your fingertips</span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-text-width i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>CUSTOMIZABLE FONTS<span class="subtitle">Unlimited Fonts &amp; Customizations</span>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-ok i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>12+ Header Designs<span class="subtitle">Customizable Headers &amp; Menus</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-thumbs-up i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Awesome Mega menu<span class="subtitle">Stylish &amp; Simple Chunky Menus</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-eye i-alt"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Retina Ready Graphics<span class="subtitle">Crystal Clear Images &amp; Icons</span></h3>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
