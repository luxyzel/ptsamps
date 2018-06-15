
@include('templates.header')

  <title>Edit User | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Update User</h1>
      </div>
    </div>
    <hr class="m-t-0">
    
     <form action="{{route('users.update', $user->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
      <div class="columns">
        <div class="column">
           <div class="field">
            <label for="name" class="label">Userame:</label>
            <p class="control">
              <input type="text" class="input" name="username" id="username" value="{{$user->username}}">
            </p>
          </div>
          <div class="field">
            <label for="name" class="label">Name:</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email:</label>
            <p class="control">
              <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
            </p>
          </div>

        </div> <!-- end of .column -->

      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Edit User</button>
        </div>
      </div>
      <a href="{{ route('users.index') }}">asdasdasd</a>

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

@include('templates.footer')