
@include('templates.header')

  <title>Show User Information | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Update User</h1>
      </div>
    </div>
    <hr class="m-t-0">
  
     <form action="{{route('acc.settings.submit')}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="name" class="label">Name:</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name" value="{{$admin->name}}">
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email:</label>
            <p class="control">
              <input type="text" class="input" name="email" id="email" value="{{$admin->email}}">
            </p>
          </div>

          <div class="field">
            <label for="name" class="label">Current Password</label>
            <p class="control">
              <input type="password" class="input" name="currentpass" id="currentpass" value="">
            </p>
          </div>
          <div class="field">
            <label for="name" class="label">New Password</label>
            <p class="control">
              <input id="password" type="password" class="form-control" name="password">
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Confirm New Password</label>
            <p class="control">
               <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </p>
          </div>

          <!-- warning changed password -->
          @if(Session::has('warning'))
                <div class="comment-error">
                   <strong> {{ Session::get('warning') }}</strong> 
                </div>

                <!-- success changed password -->
          @elseif(Session::has('success'))
                <div class="comment-success">
                   <strong> {{ Session::get('success') }} </strong>
                </div>
          @endif
        </div> <!-- end of .column -->

      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Account</button>
        </div>
      </div>

          <!-- DISPLAY ERRORS -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>
            @endforeach
        </ul>
    </div>
    @endif
    
    </form>

<a href="{{ route('dashboard') }}">asdasdasd</a>

@include('templates.footer')