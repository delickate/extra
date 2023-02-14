
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>IntelliTUT</title>
<meta content="" name="description">
<meta content="" name="keywords">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="_token" content="{{ csrf_token() }}">
<meta name="api-base-url" content="{{ url('/') }}" />
<!-- Favicons -->

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('css/fancy_fileupload.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">  


<!-- Vendor CSS Files -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<!--<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">  
<!-- Jquery Files -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<!-- Vendor JS Files -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<!-- Template Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>
<!--<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>-->
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('js/jquery.fileupload.js') }}"></script>
<script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('js/jquery.fancy-fileupload.js') }}"></script>

<script src="https://cdn.tiny.cloud/1/e03z2i9rgydpo612und3ghwo9xmh4wdeb3t1ivbp6nyxjgs6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
      var base_url = {!! json_encode(url('/')) !!}
</script>