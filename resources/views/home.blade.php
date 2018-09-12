@include('templates.header')

    <title>Dashboard | Asset Management and Procurement System</title>
</head>

<body>

    {{-- Start of Dashboard --}}
    <div class="dboard-container">

        {{-- Left Menu --}}
        <div class="dboard-left-panel fl">
            <div class="dboard-prof" style="height: 100px">
                <img src="img/companylogo.png" title="Project T Solutions">
            </div>

            <!-- Buttons -->
            <div class="dboard-prof">
                 <a href="{{ route('home') }}">
                    <div class="dboard-left-but">Dashboard</div>
                </a>
                <a href="{{ route('pending-po.index') }}">
                    <div class="dboard-left-but">Purchase Orders</div>
                </a>
                <a href="{{ route('approved-po.index') }}">
                    <div class="dboard-left-but">Approved P.O.</div>
                </a>
                <a href="{{ route('rejected-po.index') }}">
                    <div class="dboard-left-but">Rejected P.O.</div>
                </a>
                <div style="margin-bottom: 40px;"></div>
                <a href="{{ route('account-settings.edit', $approver->id) }}">
                    <div class="dboard-left-but">Account Settings</div>
                </a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <div class="dboard-left-but">Logout</div>
                </a>
            </div>
        </div>

        {{-- Right Menu --}}
        <div class="dboard-right-panel fr">
            
            {{-- Page Label --}}
            <div class="app-label">
                <div class="fl">
                    <p class="app-page-name">Dashboard</p>
                </div>
                <div class="fl">
                    <p class="app-page-sub">Overview</p>
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


                  {{-- 3rd Row of Dashboard pdf downloads --}}
            <div class="app-dboard-cont" style="margin-top: 20px;">
                <div class="app-cont-box2 fl">
                    <p class="app-cont-title-pink" style="margin-bottom: 15px">Downloadable PDF Reports</p>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('monthly-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Monthly PO Cost</a>
                    </div>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('assets-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Available Assets</a>
                    </div>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('approvedPO-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Approved PO</a>                     
                    </div>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('rejectedPO-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Rejected PO</a>
                    </div>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('pendingPO-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Pending PO</a>
                    </div>
                    <div class="dashboard-cont-but fl">
                        <a href="{{ route('delivery-report.pdf') }}" class="manage-db-but" title="View" onclick = "if (! confirm('Are you sure to download?')) { return false; }">Asset Deliveries</a>
                    </div>
                    <div class="clr"></div>       
        
                </div>
            </div>

            <div class="clr"></div>

            
        </div>

        <div class="clr"></div>
        
    </div>

{!! Charts::scripts() !!}
{!! $POchart->script() !!}
{!! $Costchart->script() !!}
{!! $Stockchart->script() !!}
@include('templates.footer')