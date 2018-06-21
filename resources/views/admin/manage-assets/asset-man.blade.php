
@include('templates.header')

  <title>Manage User | Asset Management and Procurement System</title>
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
				<a href="#">
					<div class="dboard-left-but">Deployed Units</div>
				</a>
				<a href="#">
					<div class="dboard-left-but">Stock Assets</div>
				</a>
				<a href="#">
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
						<a href="">
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
						<a href="">
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

					<div class="dboard-right-menu fr" style="margin-right: 15px">
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
					</div>
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
				<a href="{{ route('category.index') }}" class="dboard-add-acc fl">Create Categories</a>
				<a href="{{ route('create.assets') }}" class="dboard-add-acc fl" style="margin-left: 10px;">Create Assets</a>
				<div class="clr"></div>
			</div>

			<div class="manage-content">
				<table style="width: 100%; text-align: center;">
					<thead>
						<tr>
							<th>Category Type</th>
							<th>Asset Tag</th>
							<th>Service Tag</th>
							<th>Serial Number</th>
							<th>Status</th>
							<th>Remarks</th>
							<th>Deployment</th>
							<th>Date Added</th>
							<th>Action</th>
						</tr>
					</thead>
						@foreach ($assets as $asset)
							<tr>
								<td>{{$asset->category_type}}</td>
								<td>{{$asset->asset_tag}}</td>
								<td>{{$asset->service_tag}}</td>
								<td>{{$asset->serial_number}}</td>
								<td>{{$asset->status}}</td>
								<td>{{$asset->remarks}}</td>
								<td>{{$asset->deployment}}</td>
								<td>{{$asset->created_at->toFormattedDateString()}}</td>

								<td>
									<a href="{{ route('assets-management.edit', $asset->id) }}" class="manage-edit-but" title="Edit User">Edit</a>
									{{-- <a href="#" class="manage-archive-but" title="Archive User">Archive</a> --}}
									<form action="{{ route('assets-management.destroy', $asset->id) }}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button class="manage-archive-but">Archive</button>
									</form>
								</td>
							</tr>
						@endforeach
				</table>
			</div>

		</div>
		<div class="clr"></div>
	</div>

@include('templates.footer')