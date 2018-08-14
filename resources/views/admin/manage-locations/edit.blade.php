
@include('templates.header')

  <title>Update Location | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
  <div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Location</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('locations.update', $location->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login">Location</label>
                <input type="text" class="input" name="location" id="location" value="{{$location->location}}" autocomplete="off"  required>
                

                <button class="submit-approver-acc">Update Location</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('locations.index') }}" class="back-to-manage">Back to Manage Locations</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')