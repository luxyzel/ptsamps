@include('templates.header')

  <title>Create Location | Asset Management and Procurement System</title>
</head>

<body>
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