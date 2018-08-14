
@include('templates.header')

  <title>Show Locations | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="viewacc-interface-cont">

      {{-- TOP LABELS --}}
        <div class="login-title">
            <div class="login-logo fl">
                <img src="/img/companylogo.png" title="Project T Solutions">
            </div>
            <div class="login-text fl">
                <p class="login-comp-nm">Show Location Info</p>
                
            </div>
            <div class="clr"></div>
        </div>
        <div class="view-container">
            <label class="lbl-view">Location</label>
            <p class="view-label">{{$location->location}}</p>
                
            {{-- <label class="lbl-view" style="margin-top: 20px;">Fullname</label>
            <p class="view-label">{{$user->name}}</p>
               
            <label class="lbl-view" style="margin-top: 20px;">Email</label>
            <p class="view-label">{{$user->email}}</p> --}}
        </div>
            

        <a href="{{ route('locations.index') }}" class="back-to-manage">Back to Manage Locations</a>

    </div>
    
</div>

@include('templates.footer')
