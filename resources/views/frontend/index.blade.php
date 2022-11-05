@extends('frontend.layout.master')
@section('content')

    <div class="modal fade custom__modal" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="text-center mb-4">
                        <h2 class="mb-0">Inquiry Form</h2>
                        <div class="d-flex justify-content-center">
                            <img src="/frontend/assets/Images/line2.png" width="240" height="100%" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm" class="form-label mb-0">Full Name</label>
                                <input type="text" class="form-control" id="textForm" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm2" class="form-label mb-0">Email</label>
                                <input type="email" class="form-control" id="textForm2" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm3" class="form-label mb-0">Phone Number</label>
                                <input type="text" class="form-control" id="textForm3" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm4" class="form-label mb-0">Address</label>
                                <input type="text" class="form-control" id="textForm4" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label mb-0">Write a message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <section id="main__index-section">
            <div class="slider-wrapper">
                <div class="video__holder d-none">
                    <video autoplay="" muted="" loop="" width="100%">
                        <source src="https://raischool.edu.np/uploads/slidervideo/RAI +2 Outdoors Insta Final.mp4"
                            type="video/mp4">
                    </video>
                </div>
                <div class="main__slider">
                    <div class="swiper swiper-container" data-slider-wrap="data-slider-wrap">
                        <div class="wrap" data-slider-wrap="data-slider-wrap">
                            <div class="slider" data-slider="data-slider">
                                <div class="slide">
                                    <div class="slide__inner"
                                        style="background-image: url(/frontend/assets/Images/2.jpeg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                        <div class="slide__text-wrap">
                                            <div class="slide__text"
                                                data-typed="Lorem ipsum dolor sit amet
                                            ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="slide__inner"
                                        style="background-image: url(/frontend/assets/Images/3.jfif); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                        <div class="slide__text-wrap">
                                            <div class="slide__text" data-typed="Lorem ipsum dolor sit amet2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide">
                                    <div class="slide__inner"
                                        style="background-image: url(/frontend/assets/Images/Rectangle\ 69.png); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                        <div class="slide__text-wrap">
                                            <div class="slide__text" data-typed="Lorem ipsum dolor sit amet3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="partner-wrapper">
                <div class="container">
                    <div class="white-box d-flex justify-content-center align-items-center">
                        <div class="image-holder wow fadeInLeft" data-wow-delay="0.1s"
                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                            <a href="#">
                                <img src="/frontend/assets/Images/top1.png" width="100%" height="100%" alt="">
                            </a>
                        </div>
                        <div class="image-holder wow fadeInLeft" data-wow-delay="0.2s"
                            style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                            <a href="#">
                                <img src="/frontend/assets/Images/top2.png" width="100%" height="100%" alt="">
                            </a>
                        </div>
                        <div class="image-holder wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <a href="#">
                                <img src="/frontend/assets/Images/top3.png" width="100%" height="100%" alt="">
                            </a>
                        </div>
                        <div class="image-holder wow fadeInLeft" data-wow-delay="0.4s"
                            style="visibility: visible; -webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">
                            <a href="#">
                                <img src="/frontend/assets/Images/top4.png" width="100%" height="100%" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user__section">
                <div class="container">
                    <div class="college__message d-flex justify-content-center">
                        <div class="moto__top wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <p>“We are what we repeatedly do. Excellence, then, is not an act, but a habit”- Aristotle.
                                Established
                                .</p>
                        </div>
                    </div>
                    <div class="members__section wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        <div class="flex__wrapper d-flex justify-content-center">
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder border__right">
                                    <h4>Years</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>25</span>+</h1>
                                </div>
                            </div>
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder border__right">
                                    <h4>Happy Parents</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>1000</span>+</h1>
                                </div>
                            </div>
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder">
                                    <h4>Alumni</h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1><span>5000</span>+</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="informartion section-padding"
                style="background-image: url(/frontend/assets/Images/bg.png); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="aboutus__image wow fadeInUp" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <div class="about__image-two">
                                    <img src="/frontend/assets/Images/info.jpg" alt="" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="aboutus__description wow fadeInUp" data-wow-delay="0.6s"
                                style="visibility: visible; -webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                                <div class="top__small">
                                    <span> Since 2020 </span>
                                </div>
                                <div class="top__big-text">
                                    <h3>
                                        <span class="typing"></span>
                                    </h3>
                                </div>
                                <div class="moto mb-3">
                                    “We are what we repeatedly do. Excellence, then, is not an act, but a habit”-
                                    Aristotle.”
                                </div>
                                <!-- <div class="top__big-text">
                                        <h3>School Name </h3>
                                    </div> -->

                                <div class="main__decription mb-5">
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed tempora vel
                                        perspiciatis quia veritatis voluptas necessitatibus aspernatur, maiores
                                        blanditiis architecto. Illum aperiam commodi hic adipisci iure nemo veritatis
                                        placeat dolorem. Optio veritatis atque laudantium iste in laborum deleniti,
                                        quaerat rerum natus, laboriosam est. Minima atque incidunt in tempora excepturi
                                        rerum? </p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro soluta commodi,
                                        error repudiandae ab aspernatur, sit veritatis possimus voluptate, ut libero
                                        dicta repellat fugit quisquam voluptatibus. Necessitatibus ipsa dignissimos
                                        tenetur quia! Consectetur a excepturi molestias culpa voluptatum nisi doloribus
                                        nihil fugit distinctio, sunt quidem assumenda facilis animi hic delectus.
                                        Ratione blanditiis eius eligendi enim ipsa asperiores, iste perferendis ducimus?
                                    </p>
                                </div>
                                <a href="about-us.html" class="btn btn-hoverable">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-and-events__section section-margin">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <div class="top__header d-flex justify-content-between flex-wrap mb-4">
                                <h3>News & Events</h3>
                                <a href="News-event.html">All Events <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <div class="event__wrapper">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <a href="New-details.html">
                                            <div class="event-item  wow fadeInLeft" data-wow-delay="0.1s"
                                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                                <div class="event-image mb-2">
                                                    <img src="/frontend/assets/Images/info.jpg" width="100%" height="100%"
                                                        alt="">
                                                </div>
                                                <div class="date mb-2">
                                                    <span>2022-02-29</span>
                                                </div>
                                                <div class="event-details">
                                                    <h6>Lorem ipsum dolor sit, amet consect adipisicing elit.</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <a href="New-details.html">
                                            <div class="event-item wow fadeInLeft" data-wow-delay="0.2s"
                                                style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                                                <div class="event-image mb-2">
                                                    <img src="/frontend/assets/Images/info.jpg" width="100%" height="100%"
                                                        alt="">
                                                </div>
                                                <div class="date mb-2">
                                                    <span>2022-02-29</span>
                                                </div>
                                                <div class="event-details">
                                                    <h6>Lorem ipsum dolor sit, amet consect adipisicing elit.</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <a href="New-details.html">
                                            <div class="event-item wow fadeInLeft" data-wow-delay="0.3s"
                                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                                <div class="event-image mb-2">
                                                    <img src="/frontend/assets/Images/info.jpg" width="100%" height="100%"
                                                        alt="">
                                                </div>
                                                <div class="date mb-2">
                                                    <span>2022-02-29</span>
                                                </div>
                                                <div class="event-details">
                                                    <h6>Lorem ipsum dolor sit, amet consect adipisicing elit.</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="right-notice  wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Notice Board</h5>
                                        <hr>
                                        <ul id="style-7">
                                            <li>
                                                <a href="#">
                                                    <!-- <i class="fa-solid fa-circle-dot"></i> -->
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Cupiditate
                                                        mollitia quibusdam autem maxime assumenda.</p>
                                                    <span><i class="fa-solid fa-calendar-days"></i> 2022-02-29</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Cupiditate
                                                        mollitia quibusdam autem maxime assumenda.</p>
                                                    <span><i class="fa-solid fa-calendar-days"></i> 2022-02-29</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Cupiditate
                                                        mollitia quibusdam autem maxime assumenda.</p>
                                                    <span><i class="fa-solid fa-calendar-days"></i> 2022-02-29</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                        Cupiditate
                                                        mollitia quibusdam autem maxime assumenda.</p>
                                                    <span><i class="fa-solid fa-calendar-days"></i> 2022-02-29</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <div class="elementor-shape-top">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path class="elementor-shape-fill"
                            d="M0,0c0,0,0,6,0,6.7c0,18,240.2,93.6,615.2,92.6C989.8,98.5,1000,25,1000,6.7c0-0.7,0-6.7,0-6.7H0z">
                        </path>
                    </svg>
                </div>
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="image__wrapper">
                                <div class="image__one wow fadeInUp" data-wow-delay="0.1s"
                                    style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                    <img src="/frontend/assets/Images/test1.jpg" alt="No Image" width="100%" height="100%">
                                </div>
                                <div class="image__two wow fadeInUp" data-wow-delay="0.3s"
                                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                    <img src="/frontend/assets/Images/test2.jpg" alt="No Image" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="title__holder ps-5 wow fadeInLeft" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <h1>We earn your <span class="typing2"></span></h1>
                                <h1>and are diligent in your case.</h1>
                            </div>
                            <div class="testi__slider px-5 wow fadeInDown" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <div class="col-xl-9 col-lg-12">
                                    <div class="swiper testi">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Aspernatur ad
                                                    cupiditate pariatur iusto architecto alias perspiciatis, explicabo
                                                    illum
                                                </p>
                                                <div class="user__wrapper">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img">
                                                            <img src="/frontend/assets/Images/small1.jpg" alt=""
                                                                width="100%" height="100%">
                                                        </div>
                                                        <div class="name">
                                                            <p>Lorem, ipsum dolor.</p>
                                                            <span>Lorem, ipsum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Aspernatur ad
                                                    cupiditate pariatur iusto architecto alias perspiciatis, explicabo
                                                    illum
                                                </p>
                                                <div class="user__wrapper">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img">
                                                            <img src="/frontend/assets/Images/small1.jpg" alt=""
                                                                width="100%" height="100%">
                                                        </div>
                                                        <div class="name">
                                                            <p>Lorem, ipsum dolor.</p>
                                                            <span>Lorem, ipsum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Aspernatur ad
                                                    cupiditate pariatur iusto architecto alias perspiciatis, explicabo
                                                    illum
                                                </p>
                                                <div class="user__wrapper">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img">
                                                            <img src="/frontend/assets/Images/small1.jpg" alt=""
                                                                width="100%" height="100%">
                                                        </div>
                                                        <div class="name">
                                                            <p>Lorem, ipsum dolor.</p>
                                                            <span>Lorem, ipsum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing
                                                    elit.
                                                    Aspernatur ad
                                                    cupiditate pariatur iusto architecto alias perspiciatis, explicabo
                                                    illum
                                                </p>
                                                <div class="user__wrapper">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img">
                                                            <img src="/frontend/assets/Images/small1.jpg" alt=""
                                                                width="100%" height="100%">
                                                        </div>
                                                        <div class="name">
                                                            <p>Lorem, ipsum dolor.</p>
                                                            <span>Lorem, ipsum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                                        <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-shape-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path class="elementor-shape-fill"
                            d="M615.2,96.7C240.2,97.8,0,18.9,0,0v100h1000V0C1000,19.2,989.8,96,615.2,96.7z"></path>
                    </svg>
                </div>
            </div>
            <div class="gallery-section section-padding mb-3">
                <div class="container-fluid">
                    <div class="top__header text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                        <h3><a href="photo-album.html">School Gallery</a></h3>
                        <!-- <a href="News-event.html">All Blogs <i class="fa-solid fa-arrow-right"></i></a> -->
                        <div class="bg__line">
                            <img src="/frontend/assets/Images/line.png" alt="">
                        </div>
                    </div>
                    <div class="gg-box wow fadeInUp" data-wow-delay="0.2s"
                        style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/9-1657602665.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/9-1657602665.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/9-1656644339.JPG"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/9-1656644339.JPG">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/2-1655602478.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/2-1655602478.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/9-1655005475.JPG"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/9-1655005475.JPG">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/1-1647350757.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/1-1647350757.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/11-1647222997.JPG"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/11-1647222997.JPG">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/2-1655602478.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/2-1655602478.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/1-1583165642.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/1-1583165642.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link" href="https://saim.edu.np/storage/public/Gallery/1583115163.JPG"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/1583115163.JPG">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/1-1583165642.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/1-1583165642.jpg">
                            </a>
                        </div>
                        <div class="gg-element">
                            <a class="example-image-link"
                                href="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg"
                                data-lightbox="example-set">
                                <img src="https://saim.edu.np/storage/public/Gallery/5-1660024109.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>


@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="assets/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>
<script src="/frontend/assets/js/main.js"></script>
<script src="/frontend/assets/js/topBtn.js"></script>
<script src="/frontend/assets/js/animation.js"></script>

<script>
(function () {
    $("[data-slider-wrap]").each(function () {
        var _this = $(this),
            _slick = _this.find("[data-slider]");

        function typeInit(target, str, destroy) {
            var typedOptions = {
                strings: [str],
                typeSpeed: 30,
                cursorChar: ""
            },
                _typedjs = new Typed(target, typedOptions);

            if (destroy === true) {
                _typedjs.destroy();
            }
        } //typeInit END

        _slick
            .on("init", function (event, slick) {
                var _current = _slick.find("[data-slick-index='0']"),
                    _input = _current.find("[data-typed]"),
                    _inputNative = _input[0],
                    _data = _input.data("typed");

                typeInit(_inputNative, _data);
            })
            .on("afterChange", function (event, slick, currentSlide) {
                var _getCurrent = _slick.find(
                    "[data-slick-index='" + currentSlide + "']"
                ),
                    _getInput = _getCurrent.find("[data-typed]"),
                    _getInputNative = _getInput[0],
                    _getData = _getInput.data("typed"),

                    _getAll = $("[data-slick-index]"),
                    _getAllInput = _getAll.find("[data-typed]"),
                    _getAllInputNative = _getAllInput[0];

                //destroy
                typeInit(_getAllInputNative, _getData, true);
                _getAllInput
                    .html("")
                    .next().remove();

                //init
                typeInit(_getInputNative, _getData);
            });

        _slick.slick({
            // fade: true,
            speed: 800,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 8000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            pauseOnFocus: false,
        });
    });
})();

</script>
<script>
var typed = new Typed(".typing", {
    strings: ["About Us", "", "About School"],
    typeSpeed: 100,
    startDelay: 0,
    backSpeed: 60,
    backDelay: 500,
    loop: true,
    cursorChar: "|",
    contentType: "html",
});
var typed = new Typed(".typing2", {
    strings: ["trust", "believe", "comitment"],
    typeSpeed: 100,
    startDelay: 0,
    backSpeed: 60,
    backDelay: 500,
    loop: true,
    cursorChar: "|",
    contentType: "html",
});
</script>
<script>
var swiper = new Swiper(".testi", {
    grabCursor: true,
    loop: true,
    effect: "creative",
    speed: 1000,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    creativeEffect: {
        prev: {
            shadow: true,
            origin: "left center",
            translate: ["-5%", 0, -200],
            rotate: [0, 100, 0],
        },
        next: {
            origin: "right center",
            translate: ["5%", 0, -200],
            rotate: [0, -100, 0],
        },
    },
});
</script>
@endpush
