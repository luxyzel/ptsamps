
@include('templates.header')

  <title>Create User | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    	<div class="columns m-t-10">
      		<div class="column">
        		<h1 class="title">Create New User</h1>
      		</div>
    	</div>
    	<hr class="m-t-0">
    	<form method="POST" action="{{route('users.store')}}">
     	 {{ csrf_field() }}
     	 <div class="columns">
       		<div class="column">

          		<div class="field">
           			<label for="name" class="label">Name</label>
            		<p class="control">
              			<input type="text" class="input" name="name" id="name" value="{{old('name')}}">
            		</p>
          		</div>

          		<div class="field">
            		<label for="name" class="label">Username</label>
            		<p class="control">
              			<input type="text" class="input" name="username" id="username" value="{{old('username')}}">
            		</p>
          		</div>

          		<div class="field">
		            <label for="email" class="label">Email:</label>
		            <p class="control">
		             	<input type="text" class="input" name="email" id="email" value="{{old('email')}}">
		            </p>
          		</div>

          			<!-- PASSWORD -->

		        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		            <label for="password" class="col-md-4 control-label">Password</label>

		            <div class="col-md-6">
		                <input id="password" type="password" class="form-control" name="password" required>

		            </div>
		        </div>

		        <div class="form-group">
		            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

		            <div class="col-md-6">
		                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		            </div>
		        </div>

        	</div> <!-- end of .column -->

        	<div class="columns">
		        <div class="column">
		          <hr />
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Create New User</button>
		        </div>

		       <a href="{{ route('users.index') }}">asdasdasd</a>

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
    		</div>
   	 	</form>
   	</div>

@include('templates.footer')