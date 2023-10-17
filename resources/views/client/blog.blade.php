@extends('client.templates.app')
@section('title', 'Blog')
@section('content')
     <!-- content begin -->
     <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- section begin -->
        <section id="subheader" class="jarallax">
            <img src="{{asset('client/images/background/4.jpg')}}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h1>Blog</h1>
                        <div class="de-separator"></div>
                    </div>
                </div>
            </div>
            <div class="de-gradient-edge-bottom"></div>
        </section>
        <!-- section close -->

        <section id="section-content" class="no-top" aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($listBlogs as $blog)
                            <div class="de-blog-c1">
                                <div class="row gx-5">
                                    <div class="col-lg-6">
                                        <div class="d-date">
                                        </div>
                                        <div class="d-image">
                                            <img src="{{asset($blog->image)}}" class="" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <h4>{{$blog->title}}</h4>
                                        <p>{{$blog->description}}</p>
                                        <a class="btn-main" href="blog-single.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>                       
                    
                    <div class="spacer-single"></div>
                            
                    <div class="col-lg-12 text-center">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#" class="active">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->

@endsection
 @section('js_footer_custom')
 <script src="{{ asset('client/js/custom-marquee.js')}}"></script>
 @endsection