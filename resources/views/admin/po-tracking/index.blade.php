
@include('templates.header')

  <title>PO Tracking | Asset Management and Procurement System</title>
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
			</div>

			<div class="dboard-content-menu">
				<div class="fl">
					<form method="get" id="POTrackForm" action="{{ route('po-tracking.filter') }}">{{ csrf_field() }}
			         	<select name="status"  id='status'>
			         		<option value="" selected disabled hidden>Select Status</option>
			         		<option value="All">All</option>
					        <option value="Pending">Pending</option>
					        <option value="Approved">Approved</option>
					        <option value="Rejected">Rejected</option>
			        	</select>
		        	</form>
      			</div>

      			<div class="fl">
      				<p class="category-count">Total PO Requests: <span>{{$count}}</span></p>
      			</div>

				<div class="fr" style="width: 400px;">
					<form  action="{{ route('po-tracking.search') }}" method="get">
						<input type="text" class="input" name="search" id="search" value="" placeholder="search po number" required autocomplete="off">
						{{ csrf_field() }}
					</form>
				</div>
				<div class="clr"></div>			
			</div>

			 <!-- ALERT SUCCESS -->
            @if(Session::has('success'))
              <div class="comment-success" id ="comment-success" style="margin-top: 25px">
                  <strong> {{ Session::get('success') }}</strong> 
              </div>
            @endif

          <!-- ALERT ERROR -->
            @if(Session::has('error'))
              <div class="comment-error" id ="comment-error" style="margin-top: 25px">
                  <strong> {{ Session::get('success') }}</strong> 
              </div>
            @endif
		
		@if (!is_null($procures))
			<div class="manage-content">
				<table style="width: 100%; text-align: center;">
					<thead>
						<tr>
							<th>Requested Date</th>
							<th>Requested By</th>
							<th>Status</th>
							<th>PO Number</th>
							<th style="max-width:160px;">Items</th>
							<th>Vendor</th>
							<th>Action</th>
						</tr>
					</thead>
						@foreach ($procures as $procure)
							<tr>
								<td>{{ $procure->created_at->toFormattedDateString() }}</td>
								<td>{{ $procure->requested_by }}</td>
								<td>{{ $procure->status }}</td>
								@if($procure->po_id == NULL)
								<td>N/A</td>
								@else
								<td>{{ $procure->ponumbers->po_number }}</td>
								@endif
								<td style="max-width:160px;">{{ $procure->item }}</td>
								<td>{{ $procure->vendors->company_name}}</td>
								<td>
									<a href="{{ route('po-tracking.edit', $procure->group_id) }}" class="manage-view-but" title="View">View Details</a>
									@if($procure->status == 'Rejected')
									<a href="{{ route('po-tracking.show', $procure->group_id) }}" class="manage-view-but" title="View">Re-route</a>
									@endif
									@if($procure->status == 'Approved')
									<a href="{{ route('po-tracking.pdf', $procure->po_id) }}" class="manage-view-but" title="View">Download</a>
									@endif

								</td>
							</tr>
						@endforeach
				</table>
			</div>
		@else
			<div class="manage-content">
				<table style="width: 100%; text-align: center;">
					<thead>
						<tr>
							<th>Requested Date</th>
							<th>Requested By</th>
							<th>Status</th>
							<th>PO Number</th>
							<th style="max-width:160px;">Items</th>
							<th>Vendor</th>
							<th>Action</th>
						</tr>
					</thead>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
				</table>
			</div>
		@endif


			<!-- PAGINATION -->
			<div class="pagination-bot">
				
			</div>

			<!-- SEARCH NO RECORD FOUND -->
		  	@if(Session::has('warning'))
		        <div class="comment-error" id="comment-error">
		           <br><strong><center>{{ Session::get('warning') }}</center> </strong> 
		        </div>
		    @endif

		</div>
		<div class="clr"></div>
	</div>

@include('templates.footer')

<script type="text/javascript">

/*** Auto-Submit Form on Dropdown Change ***/
$(document).ready(function() {
   $('#status').change(function() {
     var parentForm = $(this).closest("form");
     if (parentForm && parentForm.length > 0)
       parentForm.submit();
   });
});

setTimeout(function() {
    $('#comment-success').fadeOut('fast');
    $('#comment-error').fadeOut('fast');
}, 5000);
</script>