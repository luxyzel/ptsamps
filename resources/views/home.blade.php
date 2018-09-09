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
                <a href="#">
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
                    <p class="app-cont-title-blue">Purchase Order Summary</p>
                    {{-- {!! $POchart->html() !!} --}}
                </div>
            </div>  

            <div class="clr"></div>

            {{-- First set of contents dashboard  --}}
            <div class="app-dboard-cont" style="margin-top: 20px">
                <div class="app-cont-box1 fl" style="margin-right: 20px">
                    <p class="app-cont-title-green">Monthly P.O. Cost</p>
                    {{-- <span>Current Month PO Cost: <strong>{{$curCostFormat}}</strong></span>
                    {!! $Costchart->html() !!} --}}
                </div>
                <div class="app-cont-box1 fl">
                    <p class="app-cont-title-pink">Available Asset Summary</p>
                    {{-- {!! $Stockchart->html() !!} --}}
                </div>
                <div class="clr"></div>
            </div>
        </div>

        <div class="clr"></div>
        
    </div>


@include('templates.footer')