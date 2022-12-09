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
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <!-- Toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <style>
        body{
            background-color: #F3F3F4;
        }
    </style>
</head>
<body>
    <div class="content">
        @include('layouts.inc.mininavbar')
        @include('layouts.inc.frontnavbar')
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
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

    <!-- Sweet Alert 2 Toaster -->
    <script>
        window.Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
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
