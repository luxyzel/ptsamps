
@include('templates.header')

  <title>Create Admin | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    	<div class="columns m-t-10">
      		<div class="column">
        		<h1 class="title">Create New Assets</h1>
      		</div>
    	</div>
    	<hr class="m-t-0">
    	<form method="POST" action="{{route('assets-management.store')}}">
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
                <label for="category_type" class="label">Category</label>
                 <select name="category_type" id="category_type" class="control">
                  @foreach($category as $cat)
                    <option value="{{ $cat->category }}">{{ $cat->category }}</option>
                  @endforeach
                </select>
              </div>


          		<div class="field">
           			<label for="asset_tag" class="label">Asset Tag</label>
            		<p class="control">
              			<input type="text" class="input" name="asset_tag" id="asset_tag" value="">
            		</p>
          		</div>

          		<div class="field">
           			<label for="service_tag" class="label">Service Tag</label>
            		<p class="control">
              			<input type="text" class="input" name="service_tag" id="service_tag" value="">
            		</p>
          		</div>

          		<div class="field">
           			<label for="serial_number" class="label">Serial Number</label>
            		<p class="control">
              			<input type="text" class="input" name="serial_number" id="serial_number" value="">
            		</p>
          		</div>

          		<div class="field">
           			<label for="status" class="label">Status</label>
            		<p class="control">
              			<input type="text" class="input" name="status" id="status" value="">
            		</p>
          		</div>

              <div class="field">
                <label for="remarks" class="label">Remarks</label>
                 <select name="remarks" id="remarks" class="control">
                    <option value="Available">Available</option>
                    <option value="Deployed">Deployed</option>
                </select>
              </div>

          		<div class="field">
           			<label for="status" class="label">Deployment</label>
            		<p class="control">
              			<input type="text" class="input" name="deployment" id="deployment" value="">
            		</p>
          		</div>



        	</div> <!-- end of .column -->

        	<div class="columns">
		        <div class="column">
		          <hr />
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Add Asset</button>
		        </div>

		       <a href="{{ route('assets-management.index') }}">Back</a>

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