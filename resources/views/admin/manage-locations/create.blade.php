@include('templates.header')

  <title>Create Location | Asset Management and Procurement System</title>
</head>

<body>

	<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont-condition">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Create New Location</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('locations.store')}}">
     	 	{{ csrf_field() }}

       			<label for="name" class="lbl-login">Location</label>
              	<input type="text" class="input" name="location" id="location" value="{{old('location')}}">
            		

                <button class="submit-approver-acc">Add Location</button>

                @if(Session::has('success'))
                        <div class="comment-success" id="comment-success" style="margin-top: 25px">
                            <strong> {{ Session::get('success') }}</strong> 
                        </div>
                    @endif

                    @if(Session::has('warning'))
                        <div class="comment-warning" id="comment-warning" style="margin-top: 25px">
                           <strong><center>{{ Session::get('warning') }}</center> </strong> 
                        </div>
                    @endif

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('locations.index') }}" class="back-to-manage">Back to Manage Location</a>

        </form>

    </div>
    
  </div>







	<div class="flex-container" style="width: 80%; margin: auto;">
    	<div class="columns m-t-10">
      		<div class="column">
        		<h1 class="title">Create New Location</h1>
      		</div>
    	</div>
    	<hr class="m-t-0">
    	<form method="POST" action="{{route('locations.store')}}">
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
           			<label for="name" class="label">Location</label>
            		<p class="control">
              			<input type="text" class="input" name="location" id="location" value="{{old('location')}}">
            		</p>
          		</div>

        	</div> <!-- end of .column -->

        	<div class="columns">
		        <div class="column">
		          <hr />
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Add Location</button>
		        </div>

		       <a href="{{ route('locations.index') }}">Back</a>

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