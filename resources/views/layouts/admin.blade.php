<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>{{ $title }}</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!-- Theme CSS -->
<link href="{{ asset('assets/css/agency.min.css') }}" rel="stylesheet">

<!-- CKEditir -->
<!-- <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script> -->
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>

<!-- <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
 -->
 
</head>
<body>

<header id="header_wrapper">

    @yield('header') 
    
    
@if (count($errors) > 0)
    <div class="container">
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="text-left">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session('status'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
@endif
</header>

    @yield('content')


<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

<!-- Contact Form JavaScript -->
<script src="{{ asset('assets/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('assets/js/contact_me.js') }}"></script>

<!-- Theme JavaScript -->
<script src="{{ asset('assets/js/agency.min.js') }}"></script>

</body>

</body>
</html>