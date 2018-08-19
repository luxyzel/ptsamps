
@include('templates.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <title>Procurement Process | Asset Management and Procurement System</title>
</head>

<body>

	<!-- Start of Dashboard -->
	<div class="dboard-container">

		<!-- Left Side (Panel) -->
		<div class="dboard-left-panel fl">
			
			<!-- Company profile -->
			<div class="dboard-prof">
				<img src="/img/companylogo.png" title="Project T Solutions">

				<!-- Admin -->
				<div class="dboard-admin">
					<div class="admin-avatar fl"></div>
					<div class="admin-profile-name fl">
						<p>{{$admin->name}}</p>
						<p class="admin-subtxt">Administrator</p>
					</div>
					<div class="clr"></div>
				</div>

			</div>

			<!-- Buttons -->
			<div class="dboard-prof">
				<a href="{{ route('deployed-units.index')}}">
					<div class="dboard-left-but">Deployed Units</div>
				</a>
				<a href="{{ route('assets.stocks')}}">
					<div class="dboard-left-but">Stock Assets</div>
				</a>
				<a href="{{ route('procurement.index')}}">
					<div class="dboard-left-but">Procurement</div>
				</a>
				<a href="{{ route('vendor.index')}}">
					<div class="dboard-left-but">Vendors</div>
				</a>
				<a href="{{ route('requestor.index')}}">
					<div class="dboard-left-but">Requestor</div>
				</a>
				<a href="#">
					<div class="dboard-left-but">Calendar</div>
				</a>
			</div>
		</div>

		<!-- Right Side -->
		<div class="dboard-right-panel fr">
			
			<!-- Menu Srip -->
			<div class="dboard-menustrip">
				<div class="dboard-menu-left-cont fl">
					
					<!-- Dashboard Upper Menus Left -->
					<div class="dboard-left-menu fl">
						<a href="{{route('dashboard')}}">
							<div class="dboard-menu1-box">
								<img src="/img/icon1.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop1">
							<img src="/img/hoverarrow1.png">
							<p>Dashboard</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{ route('assets-management.index') }}">
							<div class="dboard-menu3-box">
								<img src="/img/icon3.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop3">
							<img src="/img/hoverarrow1.png">
							<p>Asset Management</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{route('assets-tracking.index')}}">
							<div class="dboard-menu2-box">
								<img src="/img/icon2.png" >
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop2">
							<img src="/img/hoverarrow1.png">
							<p>Asset Tracking</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="">
							<div class="dboard-menu4-box">
								<img src="/img/icon4.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop4">
							<img src="/img/hoverarrow1.png">
							<p>P.O. Tracking</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{ route('peripherals.index') }}">
							<div class="dboard-menu5-box">
								<img src="/img/icon5.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop5">
							<img src="/img/hoverarrow1.png">
							<p>Peripherals</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{ route('category.index') }}">
							<div class="dboard-menu6-box">
								<img src="/img/icon5.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop6">
							<img src="/img/hoverarrow1.png">
							<p>Create Categories</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{ route('users.index') }}">
							<div class="dboard-menu7-box">
								<img src="/img/icon5.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop7">
							<img src="/img/hoverarrow1.png">
							<p>Manage User</p>
						</div>
					</div>
					<div class="clr"></div>

				</div>

				<!-- Dashboard Upper Right menus -->
				<div class="dboard-menu-right-cont fl">

					<!-- Right menus -->
					<div class="dboard-right-menu fr">
						<a href="#" id="acc-but">
							<div class="dboard-rmenu1-box">
								<img src="/img/menuicon.png">
							</div>
						</a>
					</div>

					<div class="dboard-right-menu fr">
						<a href="#" id="acc-but">
							<div class="dboard-rmenu2-box"></div>
						</a>
					</div>

					{{-- Change UI Update to DASHBOARD MENUS --}}
					{{-- <div class="dboard-right-menu fr" style="margin-right: 15px">
						<a href="#" id="acc-but">
							<div class="dboard-rmenu3-box">
								<img src="/img/purchaseorder.png" title="Manage PO">
							</div>
						</a>
					</div>

					<div class="dboard-right-menu fr" style="margin-right: 5px">
						<a href="{{ route('users.index') }}" id="acc-but">
							<div class="dboard-rmenu4-box">
								<img src="/img/adduser.png" title="Manage User">
							</div>
						</a>
					</div> --}}
					<div class="clr"></div>

					<!--Account popup -->
					<div id="acc-but-popup">
						<img src="/img/hoverarrow2.png">
						<div id="acc-but-popup-cont">
							<a href="{{ route('acc.settings') }}">Account Settings</a><br>
							<a href="{{route('admin.logout')}}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit(); ">Logout</a>
						</div>
					</div>

					<form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</div>
				<div class="clr"></div>
			</div><br>

		<!-- SUCCESS ALERT -->
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

		<form id="VendorForm" action="{{ route('procurement.store') }}" method="post">{{ csrf_field() }}


		<div class="manage-content">
			<p><strong>SHIP TO</strong></p><br>
			<div class="field">
                <label for="requestor" class="label">Requestor Name</label>
                 <select name="requestor" id="requestor" class="control" >
                 <option value="none">--Select Requestor--</option>
                  @foreach($requestors as $requestor)
                    <option value="{{ $requestor->requestor_name }}">{{ $requestor->requestor_name }}</option>
                  @endforeach
                </select>
          	</div><br>
		</div>
		<br>
		<div class="manage-content">	
			<p><strong>VENDOR</strong></p><br>
			<div class="field">
                <label for="vendorname" class="label">Vendor Name</label>
                 <select name="vendorname" id="vendorname" class="control">
                 <option value="">--Select Vendor--</option>
                  @foreach($vendors as $vendor)
                    <option value="{{ $vendor->company_name }}">{{ $vendor->company_name }}</option>
                  @endforeach
                </select>
          	</div><br>

			<div id="tableDiv" style="display:none">
				<table style="width: 100%; text-align: center;" id="tfilter">
					<thead>
						<tr>
							<th data-type="standard">Company Name</th>
							<th>Contact Person</th>
							<th>Designation</th>
							<th>Email Address</th>
							<th>Contact Number</th>
							<th>Company Address</th>
							<th>Phone</th>
							<th>Fax</th>
							<th>Vat Number</th>
						</tr>
					</thead>
					@foreach ($vendors as $vendor)
						<tr>
							<td>{{$vendor->company_name}}</td>
							<td>{{$vendor->contact_person}}</td>
							<td>{{$vendor->designation}}</td>
							<td>{{$vendor->email_address}}</td>
							<td>{{$vendor->contact_number}}</td>
							<td>{{$vendor->company_address}}</td>
							<td>{{$vendor->phone}}</td>
							<td>{{$vendor->fax}}</td>
							<td>{{$vendor->vat_number}}</td>
						</tr>	
					@endforeach
				</table>
			</div>
		</div><br>



		<div class="manage-content">
			<p><strong>ORDERS</strong></p><br>
			<table style="width: 100%; text-align: center;" id="dynamic_field">
				<thead>
					<tr>
						<th>Item</th>
						<th>Quantity</th>
						<th>UOM</th>
						<th>Description</th>
						<th>Unit Price (₱)</th>
						<th>Total Price (₱)</th>
						<th>Add</th>
					</tr>
				</thead>
					<tr class="dynamic-added">
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" name="item[]" size="45" id="item-0" required></div>
							</div>
						</td>
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" class="quantity" name="quantity[]" size="5" id="quantity-0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div>
							</div>
						</td>
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" name="uom[]" id="uom-0" required></div>
							</div>
						</td>
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" name="description[]" size="40" id="description-0" required></div>
							</div>
						</td>
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" class="unitprice" name="unitprice[]" id="unitprice-0"  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required></div>
							</div>
						</td>
						<td>
							<div class="input_fields_wrap">
						    <div><input type="text" class="totalprice" name="totalprice[]" id="totalprice-0" placeholder="total" readonly></div>
							</div>
						</td>
						<td>
							<button type="button" name="add" id="add" class="btn btn-success">+</button>
						</td>
					</tr>
			</table>
		</div><br>
		
		<div class="dboard-content-menu">
				
				<p><strong>PAYMENTS</strong></p><br>
			    <div class="fl">
					<label for="remarks" class="label">Notes/Remarks/Comment:</label>
					<textarea name="remarks" id="remarks" rows="4" cols="30"></textarea>
					<br>
					<div class="field">
					<label for="remarks" class="label">Payment Terms:</label>
					<input type="text" name="paymentterms" id="paymentterms">
	            	</div>
	            </div>
	            <div class="fr">
	            	<div class="field">
					<label class="label">VAT Inclusive:</label>
					<input type="text" class="vatinclusive" name="vatinclusive" id="vatinclusive" readonly>
					</div>
					<div class="field">
					<label class="label">VAT Exclusive:</label>
					<input type="text" class="vatexclusive" name="vatexclusive" id="vatexclusive" readonly>
	            	</div>
	            	<div class="field">
					<label class="label">Less Discount:</label>
					<input type="text" class="lessdiscount" name="lessdiscount" id="lessdiscount">
	            	</div>
	            	<div class="field">
					<label class="label">12% VAT:</label>
					<input type="text" class="12vat" name="12vat" id="12vat" readonly>
	            	</div>
	            	<div class="field">
					<label class="label">Total Price:</label>
					<input type="text" class="total" name="total" id="total" readonly>
	            	</div>
	            </div>
	        
		</div>

		<button class="submit-approver-acc" style="margin-top: 40px;" id="submits">Submit</button>
		
	</form>	
			<!-- PAGINATION -->

			<!-- warning no record -->
          	@if(Session::has('warning'))
                <div class="comment-error">
                   <strong><center>{{ Session::get('warning') }}</center> </strong> 
                </div>
            @endif

		</div>
		<div class="clr"></div>
	</div>

	<p id="showing"></p>

@include('templates.footer')



<script type="text/javascript">

/*** ADD NEW ROW FOR ITEM ***/
$(document).ready(function() {
  var i = 0;
  $("#quantity-" + i).change(function() {
    upd_art(i)
  });
  $("#unitprice-" + i).change(function() {
    upd_art(i)
  });


  $('#add').click(function() {
    i++;
    $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="item[]" id="item-' + i + '" size="45" class="form-control name_list" required/></td><td><input type="text" value=0 id="quantity-' + i + '" name="quantity[]" placeholder="quantity" size="5" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required/></td><td><input type="text" name="uom[]" id="uom-' + i + '" class="form-control name_list" required/></td><td><input type="text" name="description[]" id="description-' + i + '" size="40" class="form-control name_list" required/></td><td><input type="text" id="unitprice-' + i + '" name="unitprice[]" class="unitprice" value=0  placeholder="price" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required/></td><td><input type="text" id="totalprice-' + i + '" name="totalprice[]" placeholder="total" class="totalprice" readonly /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');


    $("#quantity-" + i).change(function() {
      upd_art(i)
    });
    $("#unitprice-" + i).change(function() {
      upd_art(i)
    });

  });


  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();

  });

	function upd_art(i) {
	    var qty = $('#quantity-' + i).val();
	    var price = $('#unitprice-' + i).val();
	    var total = (qty * price);
	    var value = total.toFixed(2);
	    $('#totalprice-' + i).val(value);
	 
	}
   /*setInterval(upd_art, 1000);*/
});


/*** CALCULATION ***/
$(document).on("change", ".unitprice", function() {
	// CALCULATE VAT INC
    var sum = 0;
    $(".totalprice").each(function(){
        sum += parseFloat(+$(this).val());
    });
    $("#vatinclusive").val(parseFloat(sum).toFixed(2));

    // CALCULATE 12% VAT
  	var inclusive = parseFloat($("#vatinclusive").val());
	$("#12vat").val(parseFloat(inclusive*0.12).toFixed(2));

	// CALCULATE VAT EXC
	var vat = parseFloat($("#12vat").val());
	$("#vatexclusive").val(parseFloat(inclusive - vat).toFixed(2));

	// CALCULATE TOTAL PRICE
	$("#total").val(parseFloat(inclusive).toFixed(2));

});

/*** WITH DISCOUNT ***/
$('#lessdiscount').on('change blur',function(){
	if($(this).val().trim().length === 0){
	$(this).val(0.00);
	}

	if ($(this).val().indexOf('%') >= 0) {
	/*** DISCOUNT IS PERCENTAGE***/
		var input = $(this).val();
		var percent = parseFloat(input) / 100.0;
       	
       	// CALCULATE TOTAL PRICE
	    var inclusive = parseFloat($("#vatinclusive").val());
		var amountLess = parseFloat(inclusive * percent).toFixed(2);
		var deducted = parseFloat(inclusive - amountLess).toFixed(2)
		$("#total").val(parseFloat(deducted).toFixed(2));

		// CALCULATE 12% VAT
	  	var total = parseFloat($("#total").val());
		$("#12vat").val(parseFloat(total*0.12).toFixed(2));

		// CALCULATE VAT EXC
		var vat = parseFloat($("#12vat").val());
		$("#vatexclusive").val(parseFloat(total - vat).toFixed(2));

    } else {
    /*** DISCOUNT IS AMOUNT***/

	   	// CALCULATE TOTAL PRICE
	    var inclusive = parseFloat($("#vatinclusive").val());
		var lessdiscount = parseFloat($("#lessdiscount").val());
		$("#total").val(parseFloat(inclusive - lessdiscount).toFixed(2));

		// CALCULATE 12% VAT
	  	var total = parseFloat($("#total").val());
		$("#12vat").val(parseFloat(total*0.12).toFixed(2));

		// CALCULATE VAT EXC
		var vat = parseFloat($("#12vat").val());
		$("#vatexclusive").val(parseFloat(total - vat).toFixed(2));
    }
});



/*** Showing vendor details ***/
document.getElementById("vendorname").onchange = function()
{
	var x = document.getElementById("tableDiv");
    if(this.value === "")
    {
        x.style.display = "none";
    }
    else{
    	// Declare variables 
		var input, filter, table, tr, td, i;
		input = document.getElementById("vendorname");
		filter = input.value.toUpperCase();
		table = document.getElementById("tfilter");
		tr = table.getElementsByTagName("tr");

  		// FIND MATCH RECORD
	  	for (i = 0; i < tr.length; i++) {
	    	td = tr[i].getElementsByTagName("td")[0];
	    	if (td) {
	      		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        		tr[i].style.display = "";
	      		} else {
	        		tr[i].style.display = "none";
	      		}
	    	} 
	  	}
    	x.style.display = "block";
    }
};


/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);
</script>


			



			





 




			
