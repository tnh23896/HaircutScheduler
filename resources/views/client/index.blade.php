@extends('client.templates.app')
@section('title', 'Trang chủ')
@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" class="jarallax no-top no-bottom v-center">
            <img src="{{ asset('client/images/background/8.jpg')}}" class="jarallax-img" alt="">
            <div class="container z1000">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1>Unleash Your <span class="id-color">Best Look</span>, Right in Our Chair!</h1>
                        <p class="lead">Established with a passion for the art of barbering, we take great pride in our
                            craft and
                            strive to create an atmosphere that feels like home.</p>
                        <div class="spacer-10"></div>
                        <a class="btn btn-light  text-center ml-3" style="width: 450px;  height: 40px; "
                            href="book.html">Book
                            Now</a>
                    </div>
                    <div class="col-lg-6 ">
                        <img src="{{ asset('client/images/misc/man-3.png')}}" class="img-fluid wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1.5s" alt="">
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>

        <section aria-label="section" class="no-top no-bottom">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-jarallax-element="-50">
                        <p class="lead big wow fadeInUp">Established with a passion for the art of barbering, we take great
                            pride
                            in our craft and strive to create an atmosphere that feels like home. From the moment you walk
                            through
                            our doors, you'll be greeted by friendly smiles and a warm ambiance that instantly puts you at
                            ease.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section  class="pt80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h2 class="wow fadeIn">Trending Styles</h2>
                        <div class="de-separator"></div>
                        <div class="spacer-single"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" data-jarallax-element="-20">
                        <div class="d-carousel wow fadeInRight">
                            <div id="item-carousel-big" class="owl-carousel no-hide owl-center" data-wow-delay="1s">
                                @foreach ($trendingStyle as $key => $style)
                                    <div class="c-item">
                                        <a href="#">
                                            <span class="c-item_info">
                                                <span class="c-item_title">{{$style->name}}</span>
                                                <span class="c-item_wm">#{{ $key + 1 }}</span>
                                            </span>

                                            <div class="c-item_wrap">
                                                <img src="{{ asset($style->image)}}" class="lazy img-fluid" alt="">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-arrow-left mod-a"><i class="fa fa-angle-left"></i></div>
                            <div class="d-arrow-right mod-a"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="spacer-double"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-top jarallax">
            <div class="de-gradient-edge-top"></div>
            <img src="{{ asset('client/images/background/1.jpg')}}" class="jarallax-img" alt="">
            <div class="container relative z1000">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h2 class="wow fadeIn">BLOG</h2>
                        <div class="de-separator"></div>
                        <div class="spacer-single"></div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5" data-jarallax-element="-30">
                       <a href=""><img src="{{ asset($latestBlog->image)}}" class="img-fluid wow fadeInRight" alt=""></a>
                    </div>
                    <div class="col-lg-7" data-jarallax-element="-60">
                       <a href=""><h2 class="wow fadeInRight id-color" data-wow-delay=".3s" style="font-size:2rem">{{$latestBlog->title}}</h2></a>
                        <p class="wow fadeInRight" data-wow-delay=".4s">{{$latestBlog->description}}</p>
                        <a href="{{route('client.blog')}}" class="btn-main wow fadeInRight" data-wow-delay=".5s">See More</a>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>

        <section aria-label="section" class="no-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="wow fadeIn">Our Services</h2>
                        <div class="de-separator"></div>
                    </div>
                    @foreach ($categoryService as $category)
                        <div class="col-lg-3 text-center" data-jarallax-element="-20">
                            <div class="de-box-a">
                                <div class="d-image">
                                    <img src="{{ asset($category->image)}}" alt="">
                                </div>
                                <div class="d-deco-1"></div>
                                <div class="d-deco-2"></div>
                            </div>
                            <div class="spacer-20"></div>
                            <h4>{{$category->name}}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="spacer-single"></div>
                <div class="text-center">
                    <a href="{{route('client.service')}}" class="btn-main">All Services &amp; Prices</a>
                </div>
            </div>
        </section>

        <section class="jarallax no-top">
            <div class="de-gradient-edge-top"></div>
            <img src="{{ asset('client/images/background/1.jpg')}}" class="jarallax-img" alt="">
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

        <section aria-label="section" class="no-top">
            <div class="wow fadeInRight d-flex">
              <div class="de-marquee-list wow">
                <div class="d-item">
                  <span class="d-item-txt">Haircut</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Shave</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Faded</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Hair Dye</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Beard Trim</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Hair Color</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Facial</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Masage</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                  <span class="d-item-txt">Hair Wash</span>
                  <span class="d-item-display">
                    <i class="d-item-block"></i>
                  </span>
                 </div>
              </div>
            </div>
        </section>
    </div>

@endsection
 @section('js_footer_custom')
 <script src="{{ asset('client/js/custom-marquee.js')}}"></script>
 @endsection