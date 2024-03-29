<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Dynamic Title -->
    <title>@yield('title')</title>
    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <!-- jQuery UI css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <!-- Toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <style>
        body{
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="content">
        @include('layouts.inc.mininavbar')
        @include('layouts.inc.frontnavbar')
        @yield('content')
    </div>

    <!-- Whatsapp Chat -->
{{--    <div class="whatsapp-chat">--}}
{{--        <a href="https://wa.me/923025390916?text=I%20need%20some%20assistance!" target="_blank">--}}
{{--            <img src="{{ asset('assets/images/whatsapp-logo.png') }}" alt="whatsapp-logo" width="70px">--}}
{{--        </a>--}}
{{--    </div>--}}

    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
            var availableTags = [];

            $.ajax({
                method: "GET",
                url: "/product-list",
                success: function (response){
                    startAutoComplete(response)
                }
            })

            function startAutoComplete(availableTags){
                $( "#search_product").autocomplete({
                    source: availableTags
                });
            }
    </script>
    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!-- Sweet Alerts 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Toastify -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Mini Navbar -->
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/63979ac0b0d6371309d415a8/1gk4390mf';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- Sweet Alert 2 Toaster -->
    <script>
        window.Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    <!-- Sweetalert2 script starts -->
    @if(session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                text: "{{session('status')}}",
            }).then(function(){
                    location.reload();
                }
            );
        </script>
    @endif
    <!-- Sweetalert script ends -->


    <!--Toastify-->
{{--    <script>--}}
{{--        Toastify({--}}
{{--            text: "Muzana bought a Samsung Glaxy A53 from Islamabad",--}}
{{--            duration: 3000,--}}
{{--            destination: "http://localhost:8000/category/smartphones/samsung-galaxy-a53",--}}
{{--            newWindow: true,--}}
{{--            close: true,--}}
{{--            gravity: "bottom", // `top` or `bottom`--}}
{{--            position: "left", // `left`, `center` or `right`--}}
{{--            stopOnFocus: true, // Prevents dismissing of toast on hover--}}
{{--            style: {--}}
{{--                background: "#000",--}}
{{--                color: "#ffffff"--}}
{{--            },--}}
{{--            onClick: function(){} // Callback after click--}}
{{--        }).showToast();--}}
{{--    </script>--}}
    <!--Toastify-->

    @yield('scripts')
</body>
</html>
