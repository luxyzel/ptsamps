
@include('templates.header')

  <title>Update Account Information | Asset Management and Procurement System</title>
</head>

<body>

        {{-- Create User Frontend --}}
    <div class="landing-bg">

        {{-- Container Creating User --}}
        <div class="user-interface-cont" style="overflow-y: auto;">

            {{-- TOP LABELS --}}
            <div class="login-title" style="margin-top: 20px;">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Acc Information</p>
                    <p class="system-about">Account Information</p>
                </div>
                <div class="clr"></div>
            </div>

                {{-- FORM APPROVER ACCOUNT CREATION --}}
                <form method="POST" action="{{route('acc.settings.submit')}}" onSubmit="return confirm('Are you sure to submit?');">
                    {{method_field('PUT')}}
                    {{csrf_field()}}

                    <!-- DISPLAY ERRORS -->
                    @if ($errors->any())
                        <div class="login-comment-error" style="margin-bottom: 15px;">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                      </div>
                    @endif

                    <!-- success -->
                    @if(Session::has('success'))
                        <div class="comment-success" id="comment-error" style="margin-bottom: 15px;">
                            <strong> {{ Session::get('success') }}</strong> 
                        </div>
                    @endif

                    <!-- warning changed password -->
                    @if(Session::has('warning'))
                          <div class="comment-error">
                             <strong> {{ Session::get('warning') }}</strong> 
                          </div>
                     @endif
              

                    <label for="name" class="lbl-login">Full Name</label>
                    <p class="control">
                    <input type="text" class="input" name="name" id="name" value="{{$admin->name}}">
                    </p>

          

                    <label for="username" class="lbl-login">Username</label>
                    <p class="control">
                        <input type="text" class="input" name="username" id="username" value="{{$admin->username}}">
                    </p>

                    <label for="email" class="lbl-login">Email Address</label>
                    <p class="control">
                        <input type="text" class="input" name="email" id="email" value="{{$admin->email}}">
                    </p>

                    <label for="currentpass" class="lbl-login">Current Password</label>
                    <p class="control">
                        <input type="password" class="input" name="currentpass" id="currentpass">
                    </p>

                    <label for="password" class="lbl-login">New Password</label>
                    <p class="control">
                        <input type="password" class="input" name="password" id="password">
                    </p>

                    <label for="password" class="lbl-login">Confirm New Password</label>
                    <p class="control">
                        <input type="password" class="input" name="password_confirmation" id="password-confirm">
                    </p>


              


                    <button class="submit-approver-acc" style="margin-top: 20px; margin-bottom: 20px">Update Account</button>


                    <a href="{{ route('dashboard') }}" class="edit-to-back" >Back to Dashboard</a>

                </form>
            </div>

        </div>



@include('templates.footer')