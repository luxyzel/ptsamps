
@include('templates.header')

  <title>Update Peripheral | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    	<div class="columns m-t-10">
      		<div class="column">
        		<h1 class="title">Update Peripheral</h1>
      		</div>
    	</div>
    	<hr class="m-t-0">

     <form action="{{route('peripherals.update', $peripheral->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}

     	 <div class="columns">
       		<div class="column">

			    <!-- warning invalid credentials -->
	            @if(Session::has('success'))
	            <div class="comment-error">
	               <strong> {{ Session::get('success') }}</strong> 
	            </div>
	            @endif

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


              <div class="field">
                <label for="category" class="label">Category</label>
                 <select name="category" id="category" class="control">
                  @foreach($category as $cat)
                    <option value="{{ $cat->category }}" {{ $peripheral->category === $cat->category? 'selected' : '' }}>{{ $cat->category }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="model" class="label">Model</label>
                <p class="control">
                    <input type="text" class="input" name="model" id="model" value="{{ $peripheral->model }}">
                </p>
              </div>


              <div class="field">
                <label for="stmsn" class="label">ST/MSN</label>
                <p class="control">
                    <input type="text" class="input" name="stmsn" id="stmsn" value="{{ $peripheral->stmsn }}">
                </p>
              </div>

              <div class="field">
                <label for="pdsn" class="label">PDSN</label>
                <p class="control">
                    <input type="text" class="input" name="pdsn" id="pdsn" value="{{ $peripheral->pdsn }}">
                </p>
              </div>

              <div class="field">
                <label for="asset_tag" class="label">Asset Tag</label>
                <p class="control">
                    <input type="text" class="input" name="asset_tag" id="asset_tag" value="{{ $peripheral->asset_tag }}">
                </p>
              </div>

                <div class="field">
                <label for="condition" class="label">Condition</label>
                 <select name="condition" id="condition" class="control">
                  @foreach($condition as $con)
                    <option value="{{ $con->condition }}" {{ $peripheral->condition === $con->condition? 'selected' : '' }}>{{ $con->condition }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="status" class="label">Status</label>
                 <select name="status" id="status" class="control">
                  @foreach($status as $status)
                    <option value="{{ $status->status }}" {{ $peripheral->status === $status->status? 'selected' : '' }}>{{ $status->status }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="vendor" class="label">Vendor</label>
                 <select name="vendor" id="vendor" class="control">
                  @foreach($vendor as $vendor)
                    <option value="{{ $vendor->vendor }}" {{ $peripheral->vendor === $vendor->vendor? 'selected' : '' }}>{{ $vendor->vendor }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="date_delivered" class="label">Date Delivered</label>
                <p class="control">
                    <input type="date" class="input" name="date_delivered" id="date_delivered" value="{{$peripheral->date_delivered}}" required>
                </p>
              </div><br>

              <div class="field">
                <label for="warranty_ends" class="label">Warranty Ends</label>
                <p class="control">
                    <input type="text" class="input" name="warranty_ends" id="warranty_ends" value="{{$peripheral->warranty_ends}}">
                </p>
              </div>

              <div class="field">
                <label for="notes" class="label">Notes</label>
                <p class="control">
                    <input type="text" class="input" name="notes" id="notes" value="{{$peripheral->notes}}">
                </p>
              </div>

        	</div> <!-- end of .column -->

        	<div class="columns">
		        <div class="column">
		          <hr />
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Peripheral</button>
		        </div>

		       <a href="{{ route('peripherals.index') }}">Back</a>


    		</div>
   	 	</form>
   	</div>

@include('templates.footer')
