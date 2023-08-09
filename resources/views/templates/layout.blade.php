<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>|laravel|</title>
</head>

<body>
    <div class="container">
{{-- Menu --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid"><h1 class=" text-primary text-uppercase"> <a class="navbar-brand" href="#">student</a> </h1><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="{{route('list')}}"> Danh sách sinh viên</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add')}}">Thêm</a> </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .navbar-dark .navbar-nav .nav-link {
        color: #ffc107;
    }
    
    .navbar-dark .navbar-nav .nav-link:hover {
        color: #fff;
    }
    
    .navbar-brand {
        color: #ffc107;
    }
    
    .navbar-brand:hover {
        color: #fff;
    }
</style>
{{-- Nội dung --}}
<div>
@include('templates.error')
    @yield('content')
</div>

{{-- Footer --}}
<footer class="mt-3 bg-dark text-warning">
    <div class="bg-secondary py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; Trần Hoàng Phi</p>
        </div>
    </div>
</footer></div>
</body>
<script src="{{asset('bootstrap/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/input-mask/jquery/jquery.inputmask.js')}}"></script>
    <script src="{{asset('bootstrap/input-mask/jquery/jquery.inputmask.date.extension.js')}}"></script>
    <script src="{{asset('bootstrap/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('bootstrap/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_anh").change(function () {
            readURL(this, '#anh_the_preview');
        });

    });
</script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>
