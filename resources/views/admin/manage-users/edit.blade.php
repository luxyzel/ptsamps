
@include('templates.header')

  <title>Update Account | Asset Management and Procurement System</title>
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
                    <p class="login-comp-nm">Update Approver Account</p>
                    <p class="system-about">Account Exclusively for Executives</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('users.update', $user->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login">Username</label>
                <input type="text" class="input" name="username" id="username" value="{{$user->username}}" autocomplete="off"  required>
                
                <label class="lbl-login" style="margin-top: 5px">Fullname</label>
                <input type="text" class="input" name="name" id="name" value="{{$user->name}}" autocomplete="off"  required>
               
                <label class="lbl-login" style="margin-top: 5px">Email</label>
                <input type="text" class="input" name="email" id="email" value="{{$user->email}}" autocomplete="off"  required>

                <button class="submit-approver-acc">Update Account</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('users.index') }}" class="back-to-manage">Back to Manage Users</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')