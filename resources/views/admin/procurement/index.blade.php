
@include('templates.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
				<a href="#">
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
						<a href="{{route('assets.track')}}">
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
                    <input type="text" class="input" name="ctnumber" id="ctnumber" value="" required>
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
                    <input type="text" class="input" name="phone" id="phone" value="" required>
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
						<tr>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="item[]" size="45" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="quantity[]" size="5" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="uom[]" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="description[]" size="40" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="uppeso[]" required></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="updollar[]" ></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="tppeso[]" ></div>
								</div>
							</td>
							<td>
								<div class="input_fields_wrap">
							    <div><input type="text" name="tpdollar[]" ></div>
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
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="item[]" class="form-control name_list" size="45" required/></td><td><input type="text" name="quantity[]" class="form-control name_list" required/></td><td><input type="text" name="uom[]" class="form-control name_list" required/></td><td><input type="text" name="description[]" class="form-control name_list" size="30" required/></td><td><input type="text" name="uppeso[]" class="form-control name_list" required/></td><td><input type="text" name="updollar[]" class="form-control name_list" /></td><td><input type="text" name="tppeso[]" class="form-control name_list" /></td><td><input type="text" name="tpdollar[]" class="form-control name_list"  /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
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


			
