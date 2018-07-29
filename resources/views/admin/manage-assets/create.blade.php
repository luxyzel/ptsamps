
@include('templates.header')

  <title>Create Assets | Asset Management and Procurement System</title>
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
                <label for="category" class="label">Category</label>
                 <select name="category" id="category" class="control">
                  @foreach($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="model" class="label">Model</label>
                <p class="control">
                    <input type="text" class="input" name="model" id="model" value="">
                </p>
              </div>

              <div class="field">
                <label for="stmsn" class="label">ST/MSN</label>
                <p class="control">
                    <input type="text" class="input" name="stmsn" id="stmsn" value="">
                </p>
              </div>

              <div class="field">
                <label for="pdsn" class="label">PDSN</label>
                <p class="control">
                    <input type="text" class="input" name="pdsn" id="pdsn" value="">
                </p>
              </div>

              <div class="field">
                <label for="asset_tag" class="label">Asset Tag</label>
                <p class="control">
                    <input type="text" class="input" name="asset_tag" id="asset_tag" value="">
                </p>
              </div>

              <div class="field">
                <label for="asset_number" class="label">Asset Number</label>
                <p class="control">
                    <input type="text" class="input" name="asset_number" id="asset_number" value="">
                </p>
              </div>

              <div class="field">
                <label for="adapter" class="label">Adapter</label>
                <p class="control">
                    <input type="text" class="input" name="adapter" id="adapter" value="">
                </p>
              </div>

              <div class="field">
                <label for="location" class="label">Location</label>
                 <select name="location" id="location" class="control">
                  @foreach($locations as $location)
                    <option value="{{ $location->location }}">{{ $location->location }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="wsno" class="label">WS NO.</label>
                <p class="control">
                    <input type="text" class="input" name="wsno" id="wsno" value="">
                </p>
              </div>

              <div class="field">
                <label for="st" class="label">ST</label>
                <p class="control">
                    <input type="text" class="input" name="st" id="st" value="">
                </p>
              </div>

              <div class="field">
                <label for="sn" class="label">S/N</label>
                <p class="control">
                    <input type="text" class="input" name="sn" id="sn" value="">
                </p>
              </div>

              <div class="field">
                <label for="mouse" class="label">Mouse</label>
                <p class="control">
                    <input type="text" class="input" name="mouse" id="mouse" value="">
                </p>
              </div>

              <div class="field">
                <label for="keyboard" class="label">Keyboard</label>
                <p class="control">
                    <input type="text" class="input" name="keyboard" id="keyboard" value="">
                </p>
              </div>

               <div class="field">
                <label for="code" class="label">Code</label>
                <p class="control">
                    <input type="text" class="input" name="code" id="code" value="">
                </p>
              </div>

               <div class="field">
                <label for="description" class="label">Description</label>
                <p class="control">
                    <input type="text" class="input" name="description" id="description" value="">
                </p>
              </div>

              <div class="field">
                <label for="condition" class="label">Condition</label>
                 <select name="condition" id="condition" class="control">
                  @foreach($conditions as $condition)
                    <option value="{{ $condition->condition }}">{{ $condition->condition }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="status" class="label">Status</label>
                 <select name="status" id="status" class="control">
                  @foreach($statuses as $status)
                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                  @endforeach
                </select>
              </div><br>

              <!-- DATE delivered-->
               <!-- warranty ends-->

              <div class="field">
                <label for="vendor" class="label">Vendor</label>
                 <select name="vendor" id="vendor" class="control">
                  @foreach($vendors as $vendor)
                    <option value="{{ $vendor->vendor }}">{{ $vendor->vendor }}</option>
                  @endforeach
                </select>
              </div><br>

          		<div class="field">
           			<label for="notes" class="label">Notes</label>
            		<p class="control">
              			<input type="text" class="input" name="notes" id="notes" value="">
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