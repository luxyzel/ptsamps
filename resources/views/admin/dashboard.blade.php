
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
						<p>{{$admin->name}}</p>
						<p class="admin-subtxt">Administrator</p>
					</div>
					<div class="clr"></div>
				</div>

			</div>

			<!-- Buttons -->
			<div class="dboard-prof">
				<a href="{{ route('deployed-units.index') }}">
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

				{{-- <div class="container">
				  <div class="notify-container">
				    <span class="notify-bubble">1</span>
				    <button type="button" class="btn btn-notify">Notify Me</button>
				  </div>
				  <h3>click to trigger notification bubble</h3>
				</div> --}}

					@if($notifs != 0)
					<div class="notify-container">
					    <span class="notify-bubble">{{$notifs}}</span></div>
					@endif
					<div class="dboard-left-menu fl">
						<a href="{{ route('po-tracking.index')}}" id="potrack">
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
								<img src="img/menuicon.png">
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
								<img src="img/purchaseorder.png" title="Manage PO">
							</div>
						</a>
					</div> --}}

					{{-- <div class="dboard-right-menu fr" style="margin-right: 5px">
						<a href="{{ route('users.index') }}" id="acc-but">
							<div class="dboard-rmenu4-box">
								<img src="img/adduser.png" title="Manage User">
							</div>
						</a>
					</div> --}}

					<div class="clr"></div>

					<!--Account popup -->
					<div id="acc-but-popup">
						<img src="img/hoverarrow2.png">
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

            {{-- First set of contents dashboard  --}}
            <div class="app-dboard-cont" style="margin-top: 30px">
                <div class="app-cont-box2 fl">
                    <p class="app-cont-title-green" style="margin-bottom: 15px">Purchase Order Summary</p>
                    <center> {!! $POchart->html() !!}</center>
                </div>
       		</div>	

       		<div class="clr"></div>

            {{-- First set of contents dashboard  --}}
            <div class="app-dboard-cont" style="margin-top: 20px; margin-bottom: 20px;">
            	<div class="app-cont-box1 fl" style="margin-right: 20px">
                    <p class="app-cont-title-violet" style="margin-bottom: 25px;">Monthly P.O. Cost</p>
					<span style="margin-left: 20px;">Current Month PO Cost: <strong>{{$curCostFormat}}</strong></span>
                    {!! $Costchart->html() !!}
                </div>
                <div class="app-cont-box1 fl">
                    <p class="app-cont-title-orange">Available Asset Summary</p>
					<center>{!! $Stockchart->html() !!}</center>
                </div>
                <div class="clr"></div>
            </div>

		</div>
		<div class="clr"></div>


	</div>	

{!! Charts::scripts() !!}
{!! $POchart->script() !!}
{!! $Costchart->script() !!}
{!! $Stockchart->script() !!}
@include('templates.footer')

<style type="text/css">
	.container {
  margin: 100px auto;
  text-align: center;
}

.notify-container {
  position: relative;
	display: inline-block;
  margin-top: 10px;
}

  .notify-bubble {
    position: absolute;
    top: -20px;
    right: 250px;
    padding: 2px 6px 2px 5px;
    background-color: #ff5f86;
    color: #fff;
    font-size: 0.65em;
    border-radius: 50%;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, .3);
    display: none;
  }

    g[class^='raphael-group-'][class$='-creditgroup'] {
         display:none !important;
    }
</style>
<script type="text/javascript">

$(document).ready(function() {
$('.notify-bubble').show(400);
});	

// $(document).ready(function(){
//     $('#potrack').click(function(){
//         $('.notify-bubble').none(400);
//     });
// });
</script>