@include('templates.header')

  <title>Create Event | Asset Management and Procurement System</title>
</head>

<body>
  <div class="flex-container" style="width: 80%; margin: auto;">
      <div class="columns m-t-10">
          <div class="column">
            <h1 class="title">Create New Event</h1>
          </div>
      </div>
      <hr class="m-t-0">
      <form method="POST" action="{{route('event.store')}}">
       {{ csrf_field() }}
       <div class="columns">
          <div class="column">

          <!-- warning invalid credentials -->
              @if(Session::has('success'))
              <div class="comment-error">
                 <strong> {{ Session::get('success') }}</strong> 
              </div>
              @endif

              <div class="field">
                <label for="name" class="label">Title</label>
                <p class="control">
                    <input type="text" class="input" name="title" id="title" value="{{old('title')}}">
                </p>
              </div>

              <div class="field">
                <label for="name" class="label">Start Date</label>
                <p class="control">
                    <input type="date" class="input" name="start_date" id="start_date" value="{{old('start_date')}}">
                </p>
              </div>

              <div class="field">
                <label for="name" class="label">End Date</label>
                <p class="control">
                    <input type="date" class="input" name="end_date" id="end_date" value="{{old('end_date')}}">
                </p>
              </div>
              </div> <!-- end of .column -->

              <div class="columns">
            <div class="column">
              <hr />
              <button class="button is-primary is-pulled-right" style="width: 250px;">Add Event</button>
            </div>

           <a href="{{ route('event.index') }}">Back</a>

           @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <br><strong>{{ $error }}</strong>
                  @endforeach
              </ul>
          </div>
          @endif
        </div>
      </form>
    </div>

@include('templates.footer')

