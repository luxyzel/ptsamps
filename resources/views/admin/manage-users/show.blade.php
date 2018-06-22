

@include('templates.header')

  <title>Show Account Information | Asset Management and Procurement System</title>
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
                <p class="login-comp-nm">Show Account Info</p>
                <p class="system-about">Account Exclusively for Executives</p>
            </div>
            <div class="clr"></div>
        </div>

            <label class="lbl-view">Username</label>
            <pre>{{$user->username}}</pre>
                
            <label class="lbl-view" style="margin-top: 5px">Fullname</label>
            <pre>{{$user->username}}</pre>
               
            <label class="lbl-view" style="margin-top: 5px">Email</label>
            <pre>{{$user->email}}</pre>

        <a href="{{ route('users.index') }}" class="back-to-manage">Back to Manage Users</a>

    </div>
    
</div>

@include('templates.footer')
