
@include('templates.header')

  <title>Dashboard | Asset Management and Procurement System</title>
</head>

<body>

	<!-- Start of Dashboard -->
	<div class="dboard-container">

		<!-- Left Side (Panel) -->
		<div class="dboard-left-panel fl">
			
			<!-- Company profile -->
			<div class="dboard-prof">
				<img src="img/companylogo.png" title="Project T Solutions">

				<!-- Admin -->
				<div class="dboard-admin">
					<div class="admin-avatar fl"></div>
					<div class="admin-profile-name fl">
						<p>ANNE SHARMAINE</p>
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
						<a href="">
							<div>
								a
							</div>
						</a>
					</div>
					<div class="dboard-left-menu fl">
						<a href="">
							<div>
								
							</div>
						</a>
					</div>
					<div class="dboard-left-menu fl">
						<a href="">
							<div>
								
							</div>
						</a>
					</div>
					<div class="dboard-left-menu fl">
						<a href="">
							<div>
								
							</div>
						</a>
					</div>
					<div class="dboard-left-menu fl">
						<a href="">
							<div>
								
							</div>
						</a>
					</div>

				</div>
				<div class="dboard-menu-right-cont fl">
					
				</div>
				<div class="clr"></div>
			</div>

		</div>
		<div class="clr"></div>
	</div>	

@include('templates.footer')