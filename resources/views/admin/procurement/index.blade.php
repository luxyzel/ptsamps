
@include('templates.header')

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
				<a href="{{ route('calendar') }}">
					<div class="dboard-left-but">Calendar</div>
				</a>
				<a href="{{ route('logs.index') }}">
					<div class="dboard-left-but">Logs</div>
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
						<a href="{{ route('po-tracking.index')}}">
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
								<img src="/img/icon6.png">
							</div>
						</a>

						<!-- popup menu name -->
						<div id="dboard-menu-pop6">
							<img src="/img/hoverarrow1.png">
							<p>Categories & Others</p>
						</div>
					</div>
					<div class="dboard-left-menu fl">
						<a href="{{ route('users.index') }}">
							<div class="dboard-menu7-box">
								<img src="/img/icon7.png">
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
           	<div class="comment-success" id ="comment-success" style="margin-top: 25px">
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

		<form id="VendorForm" action="{{ route('procurement.store') }}" method="post" onSubmit="return confirm('Are you sure to submit?');">
			{{ csrf_field() }}

			<div class="manage-content" style="margin-top: 20px;">	
				<div class="app-label" style="margin-top: 10px;">
	                <div class="fl">
	                    <p class="app-page-name" style="font-size: 20px">Select Vendor</p>
	                </div>
	                <div class="fl">
	                    <p class="app-page-sub"></p>
	                </div>
                	<div class="clr"></div>  
            	</div>
				
             	<select name="vendorname" id="vendorname" class="control" required>
	             	<option value="">-- Select Vendor --</option>
	              	@foreach($vendors as $vendor)
	                	<option value="{{ $vendor->company_name }}">{{ $vendor->company_name }}</option>
	              	@endforeach
            	</select>


				<div id="tableDiv" style="display:none">
					<table style="width: 100%; text-align: center;" id="tfilter">
						<thead>
							<tr>
								<th data-type="standard">Company Name</th>
								<th>Contact Person</th>
								<th>Designation</th>
								<th>Email Address</th>
								<th>Contact Number</th>
								<th style="max-width: 200px">Company Address</th>
								<th>Phone</th>
							</tr>
						</thead>
						@foreach ($vendors as $vendor)
							<tr>
								<td>{{$vendor->company_name}}</td>
								<td>{{$vendor->contact_person}}</td>
								<td>{{$vendor->designation}}</td>
								<td>{{$vendor->email_address}}</td>
								<td>{{$vendor->contact_number}}</td>
								<td style="max-width: 200px">{{$vendor->company_address}}</td>
								<td>{{$vendor->phone}}</td>
							</tr>	
						@endforeach
					</table>
				</div>
			</div>

			

			<div class="manage-content" style="margin-top: 20px;">
				<div class="app-label" style="margin-top: 10px;">
	                <div class="fl">
	                    <p class="app-page-name" style="font-size: 20px">Place your orders</p>
	                </div>
	                <div class="fl">
	                    <p class="app-page-sub"></p>
	                </div>
	            	<div class="clr"></div>  
            	</div>
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
							    <div><input type="text" class="quantity" class="quantity" name="quantity[]" size="5" id="quantity-0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></div>
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
								<button type="button" name="add" id="add" class="add-btn" >+</button>
							</td>
						</tr>
				</table>
			</div>

			<div class="manage-content" style="margin-top: 20px;">
				<div class="app-label" style="margin-top: 10px;">
	                <div class="fl">
	                    <p class="app-page-name" style="font-size: 20px">Other Information</p>
	                </div>
	                <div class="fl">
	                    <p class="app-page-sub"></p>
	                </div>
	            	<div class="clr"></div>  
            	</div>
				
				<div class="proc-bot fl" style="padding-right: 20px;">
					<label class="lbl-login">VAT Inclusive:</label>
					<input type="text" class="vatinclusive" name="vatinclusive" id="vatinclusive" readonly style="font-weight: bold">

					<label class="lbl-login">VAT Exclusive:</label>
					<input type="text" class="vatexclusive" name="vatexclusive" id="vatexclusive" readonly style="font-weight: bold" >

					<label class="lbl-login">Less Discount:</label>
					<input type="text" onkeypress="return event.charCode == 46 ||event.charCode == 37|| (event.charCode >= 48 && event.charCode <= 57)" class="lessdiscount" name="lessdiscount" id="lessdiscount">

					<label class="lbl-login">12% VAT:</label>
					<input type="text" class="vat" name="vat" id="vat" readonly style="font-weight: bold">

					<label class="lbl-login">Total Price:</label>
					<input type="text" class="total" name="total" id="total" readonly style="font-weight: bold">
				</div>

				<div class="proc-bot fl">
					<label for="requestor" class="lbl-login">Requestor Name</label>
	                <select name="requestor" id="requestor" class="control" required>
		                <option value="" hidden selected>--Select Requestor--</option>
			                @foreach($requestors as $requestor)
			                	<option value="{{ $requestor->requestor_name }}">{{ $requestor->requestor_name }}</option>
			                @endforeach
	                </select>
	                <label for="remarks" class="lbl-login">Notes/Remarks/Comment:</label>
					<textarea name="remarks" id="remarks" rows="4" cols="30"></textarea>
					<label for="remarks" class="lbl-login">Payment Terms:</label>
					<input type="text" name="paymentterms" id="paymentterms">

					<button class="submit-approver-acc" style="margin-top: 30px" id="submits">Submit Purchase Order</button>
				</div>
				<div class="clr"></div>
			</div>
			<div style="padding: 10px"></div>
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
    $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="item[]" id="item-' + i + '" size="45" class="form-control name_list" required/></td><td><input type="text" value=0 id="quantity-' + i + '" name="quantity[]" class="quantity" placeholder="quantity" size="5" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required/></td><td><input type="text" name="uom[]" id="uom-' + i + '" class="form-control name_list" required/></td><td><input type="text" name="description[]" id="description-' + i + '" size="40" class="form-control name_list" required/></td><td><input type="text" id="unitprice-' + i + '" name="unitprice[]" class="unitprice" value=0  placeholder="price" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required/></td><td><input type="text" id="totalprice-' + i + '" name="totalprice[]" placeholder="total" class="totalprice" readonly /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">x</button></td></tr>');


    $("#quantity-" + i).change(function() {
      upd_art(i)
    });
    $("#unitprice-" + i).change(function() {
      upd_art(i)
    });

  });


  /*$(document).on('click', '.btn_remove', function() {
	var button_id = $(this).attr("id");

	$('#row' + button_id + '').remove();
	ComputePayments();
  });*/

  $(document).on('click', '.btn_remove', function() {
	var button_id = $(this).attr("id");
	if(confirm('Are you sure to remove?')){
        $('#row' + button_id + '').remove();
		ComputePayments();
    }else{
        return false;
    }   
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
function ComputePayments() {
	
	// CALCULATE VAT INC
	var sum = 0;
    $(".totalprice").each(function(){
        sum += parseFloat(+$(this).val());
    });
    $("#vatinclusive").val(parseFloat(sum).toFixed(2));

    // CALCULATE 12% VAT
  	var inclusive = parseFloat($("#vatinclusive").val());
	$("#vat").val(parseFloat(inclusive*0.12).toFixed(2));

	// CALCULATE VAT EXC
	var vat = parseFloat($("#vat").val());
	$("#vatexclusive").val(parseFloat(inclusive - vat).toFixed(2));

	// CALCULATE TOTAL PRICE
	$("#total").val(parseFloat(inclusive).toFixed(2));

	if($('#lessdiscount').val() !== ''){
		/*** WITH LESS DISCOUNT ***/

		if ($('#lessdiscount').val().indexOf('%') >= 0) {
		/*** DISCOUNT IS PERCENTAGE***/
			var input = $('#lessdiscount').val();
			var percent = parseFloat(input) / 100.0;
	       	
	       	// CALCULATE TOTAL PRICE
		    var inclusive = parseFloat($("#vatinclusive").val());
			var amountLess = parseFloat(inclusive * percent).toFixed(2);
			var deducted = parseFloat(inclusive - amountLess).toFixed(2)
			$("#total").val(parseFloat(deducted).toFixed(2));

			// CALCULATE 12% VAT
		  	var total = parseFloat($("#total").val());
			$("#vat").val(parseFloat(total*0.12).toFixed(2));

			// CALCULATE VAT EXC
			var vat = parseFloat($("#vat").val());
			$("#vatexclusive").val(parseFloat(total - vat).toFixed(2));

		} else {
		/*** DISCOUNT IS AMOUNT***/

		   	// CALCULATE TOTAL PRICE
		    var inclusive = parseFloat($("#vatinclusive").val());
			var lessdiscount = parseFloat($("#lessdiscount").val());
			$("#total").val(parseFloat(inclusive - lessdiscount).toFixed(2));

			// CALCULATE 12% VAT
		  	var total = parseFloat($("#total").val());
			$("#vat").val(parseFloat(total*0.12).toFixed(2));

			// CALCULATE VAT EXC
			var vat = parseFloat($("#vat").val());
			$("#vatexclusive").val(parseFloat(total - vat).toFixed(2));
	    }
	}
}


$(document).on("change", ".unitprice", function() {
	var $row = $(this).closest("tr");  
    var qty = parseFloat($row.find('.quantity').val());  
    var price = parseFloat($row.find(".unitprice").val());
    var total = (qty * price);
    var value = total.toFixed(2);
    if (isNaN(value)) {
        $row.find('.totalprice').val("");  
    }else {
        $row.find('.totalprice').val(value);  
    }

	ComputePayments();
});

$(document).on("change", ".quantity", function() {
	var $row = $(this).closest("tr");  
    var qty = parseFloat($row.find('.quantity').val());  
    var price = parseFloat($row.find(".unitprice").val());
    var total = (qty * price);
    var value = total.toFixed(2);
    if (isNaN(value)) {
        $row.find('.totalprice').val("");  
    }else {
        $row.find('.totalprice').val(value);  
    }
	ComputePayments();
});



$('#lessdiscount').on('change blur',function(){
/*	if($(this).val().trim().length === 0){
	$(this).val(0.00);
	}*/

	ComputePayments();
	
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


			



			





 




			
