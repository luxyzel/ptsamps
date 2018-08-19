
@include('templates.header')

  <title>Create Peripherals | Asset Management and Procurement System</title>
</head>

<body>
	<div class="flex-container" style="width: 80%; margin: auto;">
    	<div class="columns m-t-10">
      		<div class="column">
        		<h1 class="title">Create New Peripherals</h1>
      		</div>
    	</div>
    	<hr class="m-t-0">
    	<form method="POST" action="{{route('peripherals.store')}}">
     	 {{ csrf_field() }}
     	 <div class="columns">
       		<div class="column">

			    <!-- SUCCES ALERT -->
	            @if(Session::has('success'))
	            <div class="comment-error" id="comment-error">
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
                <label for="category_type" class="label">Category Type</label>
                 <select name="category_type" id="category_type" class="control">
                  <option value="" selected disabled hidden>--Select Category Type--</option>
                  @foreach($category as $cat)
                    <option value="{{ $cat->category_type }}">{{ $cat->category_type }}</option>
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
                <label for="condition" class="label">Condition</label>
                 <select name="condition" id="condition" class="control">
                  <option value="" selected disabled hidden>--Select Condition--</option>
                  @foreach($condition as $con)
                    <option value="{{ $con->condition }}">{{ $con->condition }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="status" class="label">Status</label>
                 <select name="status" id="status" class="control">
                  <option value="" selected disabled hidden>--Select Status--</option>
                  @foreach($status as $status)
                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="vendor" class="label">Vendor</label>
                 <select name="vendor" id="vendor" class="control">
                  <option value="" selected disabled hidden>--Select Vendor--</option>
                  @foreach($vendors as $vendor)
                    <option value="{{ $vendor->company_name }}">{{ $vendor->company_name }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="date_delivered" class="label">Date Delivered</label>
                <p class="control">
                    <input type="date" class="input" name="date_delivered" id="date_delivered" value="">
                </p>
              </div><br>

              <div class="field EndsDate">
                <label for="warranty_ends" class="label">Warranty Ends</label>
                <p class="control">
                    <input type="date" class="input" name="warranty_ends" id="warranty_ends" value="">
                </p>
              </div>
              
              <div class="col-md-4"><input type="checkbox" id="others" name="others"><label for="warranty_ends" class="label">Specify Other Warranty</label></div>

              <div class="field EndsOther">
                <p class="control">
                    <input type="text" class="input" name="warranty_ends" id="warranty_ends" value="" disabled>
                </p>
              </div>

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
		          <button class="button is-primary is-pulled-right" style="width: 250px;">Add Peripheral</button>
		        </div>

		       <a href="{{ route('peripherals.index') }}">Back</a>


    		</div>
   	 	</form>
   	</div>

@include('templates.footer')

<script>
$(document).ready(function() {
    $('#others').change(function() {
        //alert();
        if ($(this).prop('checked')) {
            $('.EndsOther Input').prop('disabled', false);
            $('.EndsDate Input').prop('disabled', true);
        }
        else {
            $('.EndsOther Input').prop('disabled', true);
            $('.EndsDate Input').prop('disabled', false);
        }
    });
});

/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>