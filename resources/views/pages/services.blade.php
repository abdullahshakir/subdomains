<section id="content" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="section" id="services">
        <div class="container">
            <h3 class="m-0">Our Services</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            <div class="heading-block center">
                <h2>{{$withSubService->title ?? null}}</h2>
                <span>{{$withSubService->sub_title ?? null}}</span>
            </div>
            <div class="row col-mb-50">
                <div class="col-lg-4 text-center text-lg-start">
                    <img data-animate="fadeInLeftBig"
                         src="{{ $withSubService->file ?? null }}"
                         alt="{{ $withSubService->file ?? null }}"
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
            <h3 class="m-0">Features</h3>
            <div class="divider"><i class="icon-circle"></i></div>
            @forelse($withSubService['subServices'] as $subService)
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                    <div class="fbox-icon">
                        <a href="#">
{{--                            <i class="icon-crop i-alt"></i>--}}
                            <img data-animate="fadeInLeftBig"
                                 src="{{ $withSubService->file ?? null }}"
                                 alt="{{ $withSubService->file ?? null }}"
                                 width="50" height="50"
                                 style="border-radius: 50%;"
                            >
                        </a>
                    </div>
                    <div class="fbox-content">
                        <h3>Premium Sliders Included<span
                                class="subtitle">About 20+ Dedicated Slider Templates</span></h3>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center">Not record yet</p>
            @endforelse
        </div>
    </div>
</section>
