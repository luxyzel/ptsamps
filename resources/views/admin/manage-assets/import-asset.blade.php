<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
    <title>Asset Import csv and XLS file in Database</title>

</head>
<body>
    <div class="container">
        <h2 class="text-center">
             Excel/CSV Import Assets
        </h2>
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible"  id = "comment-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
 
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Upload File : <input type="file" name="file" class="form-control">
 
    <input type="submit" class="btn btn-primary btn-lg" style="margin-top: 3%">
</form>

 <a href="{{ route('assets-management.index') }}" class="back-but-l">Back to previous page</a>
 
</div>
</body>
</html>

<script type="text/javascript">
    
/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>