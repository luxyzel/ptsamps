
@include('templates.header')

  <title>Create Event | Asset Management and Procurement System</title>
</head>

<body>

    {{-- Background --}}
    <div class="landing-bg">

        {{-- Container of form --}}
        <div class="user-interface-cont-peri">
        
            {{-- TOP LABELS --}}
            <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Create New Event</p>
                    <p class="system-about">Event and Activities Schedule</p>
                </div>
                <div class="clr"></div>
            </div>

            <form method="POST" action="{{route('event.store')}}">
            {{ csrf_field() }}

                <label for="name" class="lbl-login">Title</label>
                <input type="text" class="input" name="title" id="title" value="{{old('title')}}">

                <label for="name" class="lbl-login">Start Date</label>
                <input type="date" class="input" name="start_date" id="start_date" value="{{old('start_date')}}">

                <label for="name" class="lbl-login">End Date</label>
                <input type="date" class="input" name="end_date" id="end_date" value="{{old('end_date')}}">

                <button class="submit-approver-acc">Add Event</button>

                <!-- DISPLAY ERRORS -->
                 @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    </div>
                 @endif

                {{-- Success Message --}}
                @if(Session::has('success'))
                    <div class="comment-success">
                        <strong>{{ Session::get('success') }}</strong> 
                    </div>
                @endif

                <a href="{{ route('event.index') }}" class="back-to-manage">Back to Previous page</a>

            </form>
        </div>

@include('templates.footer')

