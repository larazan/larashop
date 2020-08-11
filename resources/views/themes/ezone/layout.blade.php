<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/ezone/assets/img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/responsive.css') }}">
    <script src="{{ asset('themes/ezone/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    @include('themes.ezone.partials.header')

    @yield('content')

    @include('themes.ezone.partials.services')
    @include('themes.ezone.partials.footer')
    @include('themes.ezone.partials.modals')

    <!-- all js here -->
    <script src="{{ asset('themes/ezone/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/popper.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/main.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/app.js') }}"></script>
    <script>
        $(".delete").on("click", function() {
            return confirm("Do you want to remove this?");
        });
    </script>
    <script>
        $('.brand-logo-active2').owlCarousel({
            loop: true,
            nav: false,
            item: 7,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            }
        })
    </script>

    <script>
        // (function($) {
        //     "use strict";

        //     jQuery(document).ready(function() {

        //         var userFeed = new Instafeed({
        //             get: 'user',
        //             userId: '6665768655',
        //             limit: '5',
        //             accessToken: '6665768655.1677ed0.313e6c96807c45d8900b4f680650dee5',
        //             resolution: 'low_resolution'
        //         });
        //         userFeed.run();


        //     });

        // })(jQuery);
    </script>
    <script>
        // $(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $('.subscribe-form').on('submit', function(e) {
        //         $("#submitButton").prop('disabled', true);

        //         $.ajax({
        //             type: 'POST',
        //             url: '/subscription',
        //             data: $(this).serialize(),
        //             success: function(data) {
        //                 if (data.success) {
        //                     $('.subscribe-section').html('<div class="alert alert-success" role="alert">Yaay, thanks for subscribe</div>');
        //                 }
        //             },
        //             error: function(data) {
        //                 var errorFromServer = JSON.parse(data.responseText);
        //                 $("#emailField").addClass('is-invalid');

        //                 var invalidFeedbackBox = $(".invalid-feedback");
        //                 invalidFeedbackBox.html(errorFromServer.message);
        //                 invalidFeedbackBox.removeClass('d-none');

        //                 $("#submitButton").prop('disabled', false);
        //             }
        //         });
        //     });
        // });
    </script>

    <script>
        function checkSubscriber() {
            var subscriber_email = $(".subscriber_email").val();
            console.log(subscriber_email);
            $.ajax({
                type: 'post',
                url: '/check-subscriber-email',
                data: {
                    subscriber_email: subscriber_email
                },
                success: function(resp) {
                    if (resp == "exists") {
                        // alert("Subscriber email already exist");
                        $("#statusSubscribe").show();
                        $("#btnSubmit").hide();
                        $("#statusSubscribe").html("<span style='margin-top: 10px;'>&nbsp;</span><font color='red'>Error: Subscriber email already exists!</font>");
                    }
                },
                error: function() {
                    alert("Error");
                }
            })
        }

        function addSubscriber() {
            var subscriber_email = $(".subscriber_email").val();
            $.ajax({
                type: 'post',
                url: '/add-subscriber-email',
                data: {
                    subscriber_email: subscriber_email
                },
                success: function(resp) {
                    if (resp == "exists") {
                        // alert("Subscriber email already exist");
                        $("#statusSubscribe").show();
                        $("#statusSubscribe").html("<span style='margin-top: 10px;'>&nbsp;</span><font color='red'>Error: Subscriber email already exists!</font>");
                    } else if (resp == "saved") {
                        $("#statusSubscribe").show();
                        $("#statusSubscribe").html("<span style='margin-top: 10px;''>&nbsp;</span><font color='red'>Success: Thanks for subscribing!</font>");
                    }
                },
                error: function() {
                    alert("Error");
                }
            })
        }

        function enableSubscriber() {
            $("#statusSubscribe").hide();
            $("#btnSubmit").show();
        }
    </script>

</body>


</html>