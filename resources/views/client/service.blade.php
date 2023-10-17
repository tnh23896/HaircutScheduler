@extends('client.templates.app')
@section('title', 'Service')
@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section id="subheader" class="jarallax">
            <img src="{{ asset('client/images/background/2.jpg') }}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h1>Services</h1>
                        <div class="de-separator"></div>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>

        <section aria-label="section" class="no-top no-bottom">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-jarallax-element="-20">
                        <p class="lead big wow fadeInUp">Step into our stylish and comfortable space, where the blend of
                            vintage and contemporary decor sets the perfect backdrop for your grooming journey. We pay
                            attention to every detail, from the moment you walk through our doors until you leave with a
                            fresh, confident look.


                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-pricing" aria-label="section">
            <div class="container">
                <div class="row g-5" id="gallery">
                    @foreach ($listServices as $category)
                        <div class="col-lg-6 item">
                            <div class="sc-wrap">
                                <h3>{{$category['category'] ?? ''}}</h3>
                                <div class="def-list-dots">
                                    @foreach ($category['services'] as $service)
                                        <dl>
                                            <dt>
                                                <span>{{$service->name ?? ''}}</span>
                                            </dt>
                                            <dd>${{$service->price ?? ''}}</dd>
                                        </dl>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section aria-label="section" class="no-top">
            <div class="container">
                <div class="row">
                    @foreach ($categoryService as $service)
                        <div class="col-lg-3 text-center" data-jarallax-element="-20">
                            <div class="de-box-a">
                                <div class="d-image">
                                    <img src="{{asset($service->image)}}" alt="">
                                </div>
                                <div class="d-deco-1"></div>
                                <div class="d-deco-2"></div>
                            </div>
                            <div class="spacer-20"></div>
                            <h4>{{$service->name}}</h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="jarallax no-top">
            <div class="de-gradient-edge-top"></div>
            <img src="{{asset('client/images/background/1.jpg')}}" class="jarallax-img" alt="">
            <div class="container relative z1000">
                <div class="row gx-5">
                    <div class="col-lg-6 text-center" data-jarallax-element="-50">
                        <div class="d-sch-table">
                            <h2 class="wow fadeIn">We're Open</h2>
                            <div class="de-separator"></div>
                            <div class="d-col">
                                <div class="d-title">Mon - Thu</div>
                                <div class="d-content id-color">7:30AM - 6:30PM</div>
                            </div>
                            <div class="d-col">
                                <div class="d-title">Friday</div>
                                <div class="d-content id-color">8:30AM - 8:30PM</div>
                            </div>
                            <div class="d-col">
                                <div class="d-title">Sat - Sun</div>
                                <div class="d-content id-color">9:30AM - 5:30PM</div>
                            </div>
                            <div class="d-deco"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 text-center" data-jarallax-element="-100">
                        <div class="d-sch-table">
                            <h2 class="wow fadeIn">Location</h2>
                            <div class="de-separator"></div>
                            <div class="d-col">
                                <div class="d-title">Address</div>
                                <div class="d-content id-color">100 Mainstreet Center, NY</div>
                            </div>
                            <div class="d-col">
                                <div class="d-title">Phone</div>
                                <div class="d-content id-color">+1 333 8080 1000</div>
                            </div>
                            <div class="d-col">
                                <div class="d-title">Email</div>
                                <div class="d-content id-color">contact@blaxcut.com</div>
                            </div>
                            <div class="d-deco"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>
    </div>
    <!-- content close -->
@endsection
@section('js_footer_custom')
    <script src="{{ asset('client/js/custom-marquee.js') }}"></script>
@endsection
