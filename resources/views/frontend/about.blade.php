@extends('frontend.layout.master')
@section('content')

<main>
    <section id="aboutUS_section">
        <div class="top__header-wrappper">
            <div class="overlay">
            </div>
            <section id="subheader-title">
                <div class="container">
                    <h1>About Us</h1>
                </div>
            </section>
        </div>
        @foreach ($menus as $mainMenu)
{{$mainMenu}}
@endforeach
        <div class="informartion section-padding"
            style="background-image: url(assets/Images/bg.png); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="aboutus__image wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="about__image-two">
                                <img src="{{asset('frontend/assets/Images/info.jpg')}}" alt="" width="100%" height="100%">
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
                                    Guinness Public Secondary School
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
                        </div>
                    </div>
                </div>
                <div class="vision__section section-padding">
                    <div class="container">
                        <div class="mb-5 wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="aboutus__title-holder">
                                <h3>VISION</h3>
                            </div>
                            <div class="aboutus__text-holder">
                                <p>To be a reputed regional learning centre that is recognized globally for
                                    excellence in
                                    its
                                    teaching and research in management and development.</p>
                            </div>
                        </div>
                        <div class="mb-5 wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="aboutus__title-holder">
                                <h3>MISSION</h3>
                            </div>
                            <div class="aboutus__text-holder">
                                <p>To develop managers, leaders and entrepreneurs with a strong sense of integrity
                                    and
                                    commitment through creation, preservation and dissemination of knowledge keeping
                                    in
                                    perspective the South Asian values to best serve the interest of business,
                                    government,
                                    non-government organizations and society at large. SAIM is committed and
                                    dedicated to
                                    striving relentlessly in the academic domain to produce scholars and empower its
                                    graduates
                                    to attain positions of leadership in South Asia and abroad.</p>
                            </div>
                        </div>
                        <div class="mb-5 wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="aboutus__title-holder">
                                <h3>OBJECTIVES</h3>
                            </div>
                            <div class="aboutus__text-holder">
                                <ul>
                                    <li>To develop managers with sound management knowledge, skills and values along
                                        with
                                        leadership qualities and a positive attitude.</li>

                                    <li> To build relevant, practical curricula grounded on sound theory and based
                                        on
                                        regional case studies and experience sharing.</li>

                                    <li> To motivate students to bring out the best in them and foster creativity,
                                        innovation
                                        and effective team building.</li>

                                    <li> To inculcate creativity and innovativeness in the faculty through
                                        continuing
                                        education, faculty development programs, consulting and research. To forge
                                        institutional and joint ventures with reputed institutions globally.</li>

                                    <li> To foster close links with the business and academic community in South
                                        Asia and
                                        elsewhere.</li>

                                    <li> To make learning and living at the Institute a unique experience for all
                                        participants, and provide them with a sense of camaraderie and friendship
                                        that
                                        embraces all cultures and religions.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
    </section>

</main>
@stop
