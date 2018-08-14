
@include('templates.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <title>Manage Peripherals | Asset Management and Procurement System</title>
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
				<a href="{{ route('assets.deployed')}}">
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

		<form id="VendorForm" action="{{ route('procurement.store') }}" method="post">{{ csrf_field() }}
		<div class="manage-content">	
			<div class="dboard-content-menu">
				<p><strong>VENDOR</strong></p>
				<div class="field">
                <label for="vendorname" class="label">Vendor Name</label>
                 <select name="vendorname" id="vendorname" class="control" >
                 <option value="none">--Select Vendor--</option>
                  @foreach($vendors as $vendor)
                    <option value="{{ $vendor->company_name }}">{{ $vendor->company_name }}</option>
                  @endforeach
                </select>
              </div><br><br><br>
			</div><br><br><br>	
		
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
		</div><br>

			<div class="manage-content">
				<p><strong>SHIP TO</strong></p><br>
				<div class="field">
                <label for="coname" class="label">Company Name</label>
                <p class="control">
                    <input type="text" class="input" name="coname" id="coname" value="" required>
                </p>
              	</div>

              	<div class="field">
                <label for="ctperson" class="label">Contact Person</label>
                <p class="control">
                    <input type="text" class="input" name="ctperson" id="ctperson" value="" required>
                </p>
              	</div>

                <div class="field">
                <label for="designation" class="label">Designation</label>
                <p class="control">
                    <input type="text" class="input" name="designation" id="designation" value="" required>
                </p>
              	</div>

              	<div class="field">
                <label for="emailadd" class="label">Email Address</label>
                <p class="control">
                    <input type="email" class="input" name="emailadd" id="emailadd" value="" required>
                </p>
              	</div>

              	<div class="field">
                <label for="ctnumber" class="label">Contact Number</label>
                <p class="control">
                    <input type="text" class="input" name="ctnumber" id="ctnumber" value="" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                </p>
              	</div>

              	<div class="field">
                <label for="coaddress" class="label">Company Address</label>
                <p class="control">
                    <input type="text" class="input" name="coaddress" id="coaddress" value="" required>
                </p>
              	</div>

              	<div class="field">
                <label for="phone" class="label">Phone</label>
                <p class="control">
                    <input type="text" class="input" name="phone" id="phone" value="" placeholder="###-####" required>
                </p>
              	</div>
			</div>

		<div class="manage-content">
				<table style="width: 100%; text-align: center;" id="dynamic_field">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>UOM</th>
							<th>Description</th>
							<th>Unit Price (₱)</th>
							<th>Unit Price ($)</th>
							<th>Total Price (₱)</th>
							<th>Total Price ($)</th>
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
							    <div><input type="text" class="uppeso" name="uppeso[]" id="uppeso-0"  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" class="updollar" name="updollar[]" id="updollar-0" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)"></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" class="tppeso" name="tppeso[]" id="tppeso-0" placeholder="total" readonly></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" class="tpdollar" id="tpdollar-0" name="tpdollar[]" placeholder="total" readonly></div>
								</div>
							</td>
							<td>
								<button type="button" name="add" id="add" class="btn btn-success">+</button>
							</td>
						</tr>
				</table>
					<button class="submit-approver-acc" style="margin-top: 40px;" id="submits">Submit</button>
			
		</div>
		<br>
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
 
$(document).ready(function() {
  var i = 0;
  $("#quantity-" + i).change(function() {
    upd_art(i)
  });
  $("#uppeso-" + i).change(function() {
    upd_art(i)
  });
 $("#updollar-" + i).change(function() {
    upd_art(i)
  });

  $('#add').click(function() {
    i++;
    $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="item[]" id="item-' + i + '" size="45" class="form-control name_list" required/></td><td><input type="text" value=0 id="quantity-' + i + '" name="quantity[]" placeholder="quantity" size="5" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required/></td><td><input type="text" name="uom[]" id="uom-' + i + '" class="form-control name_list" required/></td><td><input type="text" name="description[]" id="description-' + i + '" size="40" class="form-control name_list" required/></td><td><input type="text" id="uppeso-' + i + '" name="uppeso[]" value=0  placeholder="price" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required/></td><td><input type="text" id="updollar-' + i + '" name="updollar[]" value=0  placeholder="price" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" required/></td><td><input type="text" id="tppeso-' + i + '" name="tppeso[]" placeholder="total" class="form-control name_list" readonly /></td><td><input type="text" id="tpdollar-' + i + '" name="tpdollar[]" placeholder="total" class="form-control name_list" readonly /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');



    $("#quantity-" + i).change(function() {
      upd_art(i)
    });
    $("#uppeso-" + i).change(function() {
      upd_art(i)
    });
    $("#updollar-" + i).change(function() {
      upd_art(i)
    });

  });


  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
  });

  function upd_art(i) {
    var qty = $('#quantity-' + i).val();
    var peso = $('#uppeso-' + i).val();
    var usd = $('#updollar-' + i).val();
    var totPeso = (qty * peso);
    var totUsd = (qty * usd);
    var valPeso = totPeso.toFixed(2);
    var valUsd = totUsd.toFixed(2);
    $('#tppeso-' + i).val(valPeso);
    $('#tpdollar-' + i).val(valUsd);
  }

   /*setInterval(upd_art, 1000);*/
});





//Showing vendor details
$(document).ready(function () {
	$('#tfilter').hide();
 $('#vendorname').on('change', function() {
   	$('#tfilter').toggle(100);
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("vendorname");
 filter = input.value.toUpperCase();
  table = document.getElementById("tfilter");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
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
	});
}); 


</script>


			



			





 




			
