
@include('templates.header')

  <title>Create User | Asset Management and Procurement System</title>
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
                    <p class="login-comp-nm">Create Approver Account</p>
                    <p class="system-about">Account Exclusively for Executives</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('users.store')}}">
            	{{ csrf_field() }}

            	<label for="name" class="label">Name</label>
              	<input type="text" class="input" name="name" id="name" autofocus autocomplete="off"  required>

              	<label for="name" class="label">Username</label>
              	<input type="text" class="input" name="username" id="username" autocomplete="off"  required>

              	<label for="email" class="label">Email:</label>
		        <input type="text" class="input" name="email" id="email" autocomplete="off"  required>

		        {{-- PASSWORD AND CONFIRM PASSWORD --}}
		        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		           	<label for="password" class="col-md-4 control-label">Password</label>
		            <input id="password" type="password" class="form-control" name="password" required>
		        </div>

		        <div class="form-group">
		            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
		            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		        </div>

		        <button class="">Create New User</button>

		        <!-- DISPLAY ERRORS -->
			    @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <br><strong>{{ $error }}</strong>
			            @endforeach
			        </ul>
			    </div>
			    @endif

			    <a href="{{ route('users.index') }}">asdasdasd</a>

            </form>

		</div>
		
	</div>

@include('templates.footer')