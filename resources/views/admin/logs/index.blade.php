
@include('templates.header')

  <title>Event Logs | Asset Management and Procurement System</title>
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
				<a href="#">
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
					<form method="get" id="UsersForm" action="{{route('logs.filter')}}">{{ csrf_field() }}
			         	<select name="users"  id='users'>
			         		<option value="" selected disabled hidden>Select User</option>
			         		<option value="All">All</option>
		         			@foreach($users as $user)
				            	<option value="{{ $user->user }}">{{ $user->user }}</option>
				          	@endforeach
			        	</select>
		        	</form>
      			</div>

				<div class="clr"></div>			
			</div>

			<div class="manage-content">
				<table style="width: 100%; text-align: center;">
					<thead>
						<tr>
							<th>Action</th>
							<th>Description</th>
							<th>Date | Time</th>
							<th>User</th>
						</tr>
					</thead>
						@foreach ($logs as $log)
							<tr>
								<td>{{$log->action}}</td>
								<td>{{$log->description}}</td>
								<td>{{$log->created_at->format('M. d, Y &\nb\sp; &\nb\sp; h:i:s A')}}</td>
								<td>{{$log->user}}</td>
							</tr>
						@endforeach
				</table>
			</div>

			<!-- PAGINATION -->
			<div class="pagination-bot">
				{{ $logs->appends(request()->input())->links() }}
			</div>

			<!-- SEARCH NO RECORD FOUND -->
		  	@if(Session::has('warning'))
		        <div class="comment-error">
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
   $('#users').change(function() {
     var parentForm = $(this).closest("form");
     if (parentForm && parentForm.length > 0)
       parentForm.submit();
   });
});

</script>