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
                <a href="#">
                    <div class="dboard-left-but">Purchase Orders</div>
                </a>
                <a href="#">
                    <div class="dboard-left-but">Approved P.O.</div>
                </a>
                <a href="#">
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
                
            </div>
            
        </div>

        <div class="clr"></div>
        
    </div>


@include('templates.footer')