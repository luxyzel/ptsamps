
@include('templates.header')

  <title>Create Assets | Asset Management and Procurement System</title>
</head>

<body>
   {{-- Landing BG --}}
   <div class="landing-bg">

      {{-- Container--}}
      <div class="large-cont">
            <div class="login-title">

                {{-- Asset From --}}
                <form  id="CreateForm" method="POST" action="{{route('assets-management.store')}}" onSubmit="return confirm('Are you sure to submit?');">
                    {{ csrf_field() }}

                    {{-- onSubmit="return confirm('Are you sure you wish to delete?');" --}}

                    {{-- 1st Container --}}
                    <div class="lcont-c-asset fl" style="padding-right: 10px">

                        {{-- Logo --}}
                        <div class="login-logo fl">
                            <img src="/img/companylogo.png" title="Project T Solutions">
                        </div>
                        <div class="login-text fl">
                            <p class="login-comp-nm">Create New Assets</p>
                            <p class="system-about">Add Asset to your Inventory</p>
                        </div>
                        <div class="clr"></div>

                        <label class="lbl-login" style="margin-top: 20px">Category Type</label>
                        <select name="category_type" id="category_type" class="control" autofocus>
                         <option value="" selected disabled hidden>--Select Category Type--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_type }}">{{ $category->category_type }}</option>
                            @endforeach
                        </select>

                        <label class="lbl-login">Model</label>
                        <input type="text" class="input" name="model" id="model" value="" autocomplete="off">

                        <label class="lbl-login">ST/MSN</label>
                        <input type="text" class="input" name="st_msn" id="st_msn" value="" autocomplete="off"> 

                        <label class="lbl-login">PDSN</label>
                        <input type="text" class="input" name="pdsn" id="pdsn" value="" autocomplete="off">

                        <label class="lbl-login">Asset Tag</label>
                        <input type="text" class="input" name="asset_tag" id="asset_tag" value="" autocomplete="off">

                        <label class="lbl-login">Asset Number</label>
                        <input type="text" class="input" name="asset_number" id="asset_number" value="" autocomplete="off">

                    </div>

                    {{-- 2nd Container --}}
                    <div class="lcont-c-asset fl" style="padding-left: 5px; padding-right: 5px;">

                        <label class="lbl-login" style="margin-top: 77px;">Adapter</label>
                        <input type="text" class="input" name="adapter" id="adapter" value="" autocomplete="off">

                        <label class="lbl-login">Location</label>
                        <select name="location" id="location" class="control">
                           <option value="" selected disabled hidden>--Select Location--</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->location }}">{{ $location->location }}</option>
                            @endforeach
                        </select>
                        
                        <label class="lbl-login">WS NO.</label>
                        <input type="text" class="input" name="wsno" id="wsno" value="" autocomplete="off">

                        <label class="lbl-login">ST</label>
                        <input type="text" class="input" name="st" id="st" value="" autocomplete="off">

                        <label class="lbl-login">SN</label>
                        <input type="text" class="input" name="s_n" id="s_n" value="" autocomplete="off">

                        <label class="lbl-login">Mouse</label>
                        <input type="text" class="input" name="mouse" id="mouse" value="" autocomplete="off">

                    </div>

                    {{-- 3rd Container --}}
                    <div class="lcont-c-asset fl" style="padding-left: 5px; padding-right: 5px;">
                        
                        <label class="lbl-login" style="margin-top: 77px;">Keyboard</label>
                        <input type="text" class="input" name="keyboard" id="keyboard" value="" autocomplete="off">

                        <label class="lbl-login">Code</label>
                        <input type="text" class="input" name="code" id="code" value="" autocomplete="off">

                        <label class="lbl-login">Description</label>
                        <input type="text" class="input" name="description" id="description" value="" autocomplete="off">

                        <label class="lbl-login">Condition</label>
                        <select name="condition" id="condition" class="control">
                           <option value="" selected disabled hidden>--Select Condition--</option>
                            @foreach($conditions as $condition)
                                <option value="{{ $condition->condition }}">{{ $condition->condition }}</option>
                            @endforeach
                        </select>

                        <label class="lbl-login">Status</label>
                        <select name="status" id="status" class="control">
                         <option value="" selected disabled hidden>--Select Status--</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->status }}">{{ $status->status }}</option>
                            @endforeach
                        </select>

                        <div class="field" >
                            <label for="date_delivered" class="lbl-login">Date Delivered</label>
                            <input type="date" class="input" name="date_delivered" id="date_delivered" value="">
                        </div>

                    </div>

                    {{-- 4th Container --}}
                    <div class="lcont-c-asset fl" style="padding-left: 10px">

                        <div class="field EndsDate" style="margin-top: 77px;">
                        <label for="warranty_ends" class="lbl-login">Warranty Ends</label>
                            <input type="date" class="input" name="warranty_ends" id="warranty_ends" value="">
                        </div>
                        
                        <div>
                            <input type="checkbox" id="others" name="others" class="fl">
                            <label for="warranty_ends" class="lbl-login fl" style="margin-left: 7px;">Specify Other Warranty</label> 
                        </div>
                        
                        <div class="field EndsOther">
                            <p class="control">
                                <input type="text" class="input" name="warranty_ends" id="warranty_ends" value="" disabled>
                            </p>
                        </div>

                        <label class="lbl-login">Vendor</label>
                        <select name="vendor" id="vendor" class="control">
                        <option value="" selected disabled hidden>--Select Vendor--</option>
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->company_name }}">{{ $vendor->company_name }}</option>
                            @endforeach
                        </select>

                        <label class="lbl-login">Notes</label>
                        <input type="text" class="input" name="notes" id="notes" value="" autocomplete="off">

                        <button class="submit-approver-acc" style="margin-top: 12px;">Confirm Asset Creation</button>

                        <!-- onclick="return confirmation();" -->

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

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <br><strong>{{ $error }}</strong>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <a href="{{ route('assets-management.index') }}" class="back-but-l">Back to previous page</a>
                    </div>
                </form>    
            </div>
      </div>
      
   </div>

	{{-- <div class="flex-container" style="width: 80%; margin: auto;">
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
   	</div> --}}

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
    $('#comment-warning').fadeOut('fast');
}, 5000); 


/*** Showing vendor details ***/
document.getElementById("category_type").onchange = function()
{
    if(this.value === "Firewall")
    {
      $("#asset_number").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);
      $("#adapter").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_tag").prop("required", true);

    }
    else if(this.value === "Wifi Router"){
      $("#asset_number").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);
      $("#adapter").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_tag").prop("required", true);
    }
    else if(this.value === "Server"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Data Switch"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "Voice Switch"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "Core Switch"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "System Units"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#wsno").prop("disabled", false);
      $("#stmsn").prop("disabled", false);
      $("#mouse").prop("disabled", false);
      $("#keyboard").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "Monitor"){
      $("#stmsn").prop("disabled", true);
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#wsno").prop("disabled", false);
      $("#st").prop("disabled", false);
      $("#sn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#st").prop("required", true);
      $("#sn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "Laptop"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
     }
    else if(this.value === "RPS"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "MPS"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#pdsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "UPS"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "IP Phone"){
      $("#asset_tag").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_number").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_number").prop("required", true);
     }
    else if(this.value === "Printer"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Biometrics"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "CCTV"){
      $("#pdsn").prop("disabled", true);
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
     }
    else if(this.value === "Headset"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
     }
    else if(this.value === "TV"){
      $("#pdsn").prop("disabled", true);
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Refregirator"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Microwave"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Coffee Maker"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#asset_tag").prop("required", true);
     }
    else if(this.value === "Office Chair"){
      $("#stmsn").prop("disabled", true);
      $("#pdsn").prop("disabled", true);
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);

      $("#code").prop("disabled", false);
      $("#description").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#description").prop("required", true);
     }
    else if(this.value === "Tables"){
      $("#stmsn").prop("disabled", true);
      $("#pdsn").prop("disabled", true);
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);

      $("#code").prop("disabled", false);
      $("#description").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#description").prop("required", true);
     }
    else if(this.value === "Projector"){
      $("#asset_number").prop("disabled", true);
      $("#adapter").prop("disabled", true);
      $("#wsno").prop("disabled", true);
      $("#st").prop("disabled", true);
      $("#sn").prop("disabled", true);
      $("#mouse").prop("disabled", true);
      $("#keyboard").prop("disabled", true);
      $("#code").prop("disabled", true);
      $("#description").prop("disabled", true);

      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);

      $("#stmsn").prop("required", true);
     }
     else{
      $("#stmsn").prop("disabled", false);
      $("#pdsn").prop("disabled", false);
      $("#asset_tag").prop("disabled", false);
      $("#asset_number").prop("disabled", false);
      $("#adapter").prop("disabled", false);
      $("#wsno").prop("disabled", false);
      $("#st").prop("disabled", false);
      $("#sn").prop("disabled", false);
      $("#mouse").prop("disabled", false);
      $("#keyboard").prop("disabled", false);
      $("#code").prop("disabled", false);
      $("#description").prop("disabled", false);
     }
};

// function confirmation(){
//     if(confirm('Are you sure to submit?')){
//         document.getElementById('CreateForm').submit();
//     }else{
//         return false;
//     }   
// }
</script>