<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- Link Swiper's CSS end -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- lightbox  -->
    <link rel="stylesheet" href="/frontend/assets/lightbox2-2.11.3/dist/css/lightbox.min.css">
    <!-- lightbox end -->
    <link rel="stylesheet" href="/frontend/assets/css/index.css">
    <link rel="stylesheet" href="{{asset('backend/assets/lightbox2-2.11.3/dist/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/frontendstyle.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/style.css')}}">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>School Website</title>
</head>


<body>
    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
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
    <script src="{{asset('backend/assets/lightbox2-2.11.3/dist/js/lightbox.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script>

        (function() {
            $("[data-slider-wrap]").each(function() {
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
                    .on("init", function(event, slick) {
                        var _current = _slick.find("[data-slick-index='0']"),
                            _input = _current.find("[data-typed]"),
                            _inputNative = _input[0],
                            _data = _input.data("typed");

                        typeInit(_inputNative, _data);
                    })
                    .on("afterChange", function(event, slick, currentSlide) {
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

    @stack('scripts')
</body>

</html>
