@extends('layouts.layout')

@section('content')

	<main id="main-container" class="main-container">



        <div class="hero hero-slider hero--1 m-4">
            <div class="swiper-wrapper">
                <!-- Start Hero Image -->
                @foreach($slide as $s)
                <div class="hero-img hero-img--1 swiper-slide">
                    <img src="{{URL::to($s->img)}}" alt="">
                </div> <!-- End Hero Image -->
                @endforeach
            
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination hero__dots"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <!-- Add Arrows -->
                <div class="swiper-button-next hero__nav hero__nav--next"><i class="far fa-chevron-right"></i></div>
                <div class="swiper-button-prev hero__nav hero__nav--prev"><i class="far fa-chevron-left"></i></div>
            </div>
        </div> <!-- ::::::  End Hero Section  ::::::  -->

      
        <div class="news__container">
           
            <div class="container shadow p-3 rounded">
                <h2 class="news__title">Yangiliklar & E'lonlar
                </h2>
                <div class="row flex-column-reverse flex-lg-row-reverse">
                    <!-- Start Rightside - Sidebar -->
                    <div class="col-lg-3">
                        <div class="sidebar">
                           
                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar__widget gray-bg">
                                <div class="sidebar__box">
                                    <h5 class="sidebar__title">Kollej</h5>
                                </div>
                                <ul class="sidebar__catagories list-space--small">
                                    <li><a class="link--gray" href="#">Xonalar <span>({{$num[0]->n1}})</span></a></li>
                                    <li><a class="link--gray" href="#">Obektlar<span>({{$num[0]->n2}})</span></a></li>
                                    <li><a class="link--gray" href="#">Xodimlar  <span>({{$num[0]->n3}})</span></a></li>
                                    
                                </ul>
                            </div>  <!-- End Single Sidebar Widget -->
                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar__widget gray-bg">
                                <div class="sidebar__box">
                                    <h5 class="sidebar__title">Yangiliklar</h5>
                                </div>
                                <ul class="sidebar__post list-space--medium">
                                    @foreach($blog1 as $bl)
                                    <li class="d-flex align-items-center">
                                        <a class="sidebar__post-img" href="{{url('/new/'.$bl->id)}}">
                                            <div class="img-responsive">
                                                <img src="{{URL::to($bl->img)}}" alt="">
                                            </div>
                                        </a>
                                        <div class="sidebar__post-content">
                                            <a class="link--gray" href="{{url('/new/'.$bl->id)}}">{{$bl->name}}</a>
                                            <span class="d-block color-gray">{{$bl->date}}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>  <!-- End Single Sidebar Widget -->
    
                          
                              
                        </div>
                    </div>  <!-- End Rightside - Sidebar -->
    
                     <!-- Start Leftside - Content -->
                    <div class="col-lg-9">
                        <div class="blog">
                            <div class="row">
                                <!-- Start Single Blog Grid -->
                                @foreach($blog as $b)
                                <div class="col-md-6">
                                    <div class="blog__type-grid">
                                        <div class="blog__img"><a href="{{url('/new/'.$b->id)}}"><img src="{{URL::to($b->img)}}" alt=""></a></div>
                                        
                                        <div class="blog__content">
                                            <a class="link--gray" href="{{url('/new/'.$b->id)}}"><h3 class="title title--small title--thin m-t-25">{{$b->name}}</h3></a>
                                            <div class="blog__archive m-t-20">
                                                <a href="{{url('/new/'.$b->id)}}" class="link--gray link--icon-left m-r-30"><i class="far fa-calendar"></i> {{$b->date}}</a>
                                                <a href="#" class="link--gray link--icon-left"><i class="far fa-user"></i> {{$b->owner}}</a>
                                            </div>
                                            <div class="para m-tb-20">
                                                <p class="para__text">
                                                    {{$b->title}}
                                                </p>
                                            </div>
                                            <a class="link--gray link--icon-right" href="{{url('/new/'.$b->id)}}">Batafsil<i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div> 
                                </div> <!-- End Single Blog Grid -->
                                @endforeach
                             
                            </div>
                        </div>
    
                        
                            {{$blog->links()}}
                        
                    </div>  <!-- Start Leftside - Content -->
                    
                </div>
            </div>
        </div>


        <div class="container shadow my-5 p-4 rounded">
            <h3>Xarita</h3>
            <div class="map__uni">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192889.8950832997!2d71.81259499705095!3d40.939757747509056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bca7f55ada8547%3A0x6f23e21bf6cdec6c!2sNorin%20District%2C%20Uzbekistan!5e0!3m2!1sen!2s!4v1647345635117!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="company-logo company-logo--1 swiper-outside-arrow-hover p-tb-100">
            <div class="container">
                <h3 class="py-3 mb-5">Foydali havolalar</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-outside-arrow-fix pos-relative">
                            <div class="company-logo__area overflow-hidden swiper-container-initialized swiper-container-horizontal">
                                <div class="swiper-wrapper" style="width: 1332px; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">

                                    @foreach($link as $l)
                                    <!-- Start Single Company Logo Item -->
                                    <div class="company-logo__item swiper-slide swiper-slide-active" style="order: 0; width: 222px;">
                                        <a href="{{$l->name}}" class="company-logo__link">
                                            <img src="{{URL::to($l->img)}}" alt="" class="company-logo__img">
                                        </a>
                                    </div> <!-- End Single Company Logo Item -->
                                    @endforeach

                                </div>

                                <div class="swiper-buttons">
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next default__nav default__nav--next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="fal fa-chevron-right"></i></div>
                                    <div class="swiper-button-prev default__nav default__nav--prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"><i class="fal fa-chevron-left"></i></div>
                                </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

@endsection