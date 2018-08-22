
@include('templates.header')

<script src="jquery.js"></script>
<script src="jquery.searchable.js"></script>

</head>  


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
			</div>

			<div class="dboard-content-menu">
				<div class="fl">
					<a href="{{ route('peripherals.create') }}" class="dboard-add-acc fl">Add Peripherals</a>
					<a href="{{ route('import-per') }}" class="dboard-add-acc fl" style="margin-left: 10px;">Import Peripherals</a>
					<div class="clr"></div>
				</div>
				<div class="fr" style="width: 400px;">
					<form  action="{{ route('peripherals.search') }}" method="get">
						<input type="text" class="input" name="search" id="search" value="" placeholder="search peripherals" required autocomplete="off">
						{{ csrf_field() }}
					</form>	
				</div>
				<div class="clr"></div>
			</div>

            
				<!-- SESSION  -->
		        @if(Session::has('success'))
		            <div class="comment-success" style="margin-top: 25px">
		                <strong> {{ Session::get('success') }}</strong> 
		            </div>
	            @endif
				<div class="manage-content">

				<table style="width: 100%; text-align: center;" class="dataTable" id="example">
					<thead>
						<tr>
							<th onclick="sortTable(0)">Category Type</th>
							<th onclick="sortTable(1)">Model</th>
							<th onclick="sortTable(2)">ST/MSN</th>
							<th onclick="sortTable(3)">PDSN</th>
							<th onclick="sortTable(4)">Asset Tag</th>
							<th onclick="sortTable(5)">Action</th>
						</tr>
					</thead>
						@foreach ($peripherals as $per)
							<tr>
								<td>{{$per->category_type}}</td>
								<!-- MODEL -->
								@if($per->model == NULL)
								<td>N/A</td>
								@else
								<td>{{$per->model}}</td>
								@endif
								<!-- ST MSN -->
								@if($per->stmsn == NULL)
								<td>N/A</td>
								@else
								<td>{{$per->stmsn}}</td>
								@endif
								<!-- PDSN -->
								@if($per->pdsn == NULL)
								<td>N/A</td>
								@else
								<td>{{$per->pdsn}}</td>
								@endif
								<!-- ASSET TAG -->
								@if($per->asset_tag == NULL)
								<td>N/A</td>
								@else
								<td>{{$per->asset_tag}}</td>
								@endif

								<td>
									<a href="{{ route('peripherals.show', $per->id) }}" class="manage-view-but" title="View">View</a>
									<a href="{{ route('peripherals.edit', $per->id) }}" class="manage-edit-but" title="Edit">Edit</a>
									{{-- <a href="#" class="manage-archive-but" title="Archive User">Archive</a> --}}
									<form action="{{ route('peripherals.destroy', $per->id) }}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="manage-archive-but">Delete</button>
									</form>
								</td>
							</tr>
							
						@endforeach
				</table>

			</div> 
				 
			<br>
			
			<!-- PAGINATION -->
			<div class="pagination-bot">
				{{$peripherals->links()}}
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
	
/*** SEARCH TABLE BY INPUT ***/
/*$("#search").keyup(function () {

});*/

/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>