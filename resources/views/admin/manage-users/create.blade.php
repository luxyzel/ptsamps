
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
				
				<label class="lbl-login">Fullname</label>
              	<input type="text" class="input" name="name" id="name" autofocus autocomplete="off"  required placeholder="fullname" value="{{old('name')}}">

              	<label class="lbl-login">Job Title</label>
              	<input type="text" class="input" name="position" id="position" autofocus autocomplete="off"  required placeholder="Job Title" value="{{old('position')}}">
				
				<label class="lbl-login">Username</label>
              	<input type="text" class="input" name="username" id="username" autocomplete="off"  required placeholder="username" value="{{old('username')}}">
				
				<label class="lbl-login">Email</label>
		        <input type="email" class="input" name="email" id="email" autocomplete="off"  required placeholder="email" value="{{old('email')}}">

		        {{-- PASSWORD AND CONFIRM PASSWORD --}}
		        <label class="lbl-login">Password</label>
		        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		            <input id="password" type="password" class="form-control" name="password" required placeholder="password">
		        </div>
				
				<label class="lbl-login">Confirm Password</label>
		        <div class="form-group">
		            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
		        </div>

		        <button class="submit-approver-acc">Create New Approver</button>

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

<script type="text/javascript">
	
/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);
</script>