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
        <div class="dboard-right-panel fr">

        	<div class="app-label">
                <div class="fl">
                    <p class="app-page-name">Approved P.O.</p>
                </div>
                <div class="fl">
                    <p class="app-page-sub">Purchase Orders</p>
                </div>
                <div class="clr"></div>  
            </div>

            @if(Session::has('success'))
                <div class="comment-success" id="comment-success" style="margin-top: 25px">
                    <strong> {{ Session::get('success') }}</strong> 
                </div>
            @endif

            @if(Session::has('warning'))
                <div class="comment-warning" id="comment-warning" style="margin-top: 25px">
                   <strong><center>{{ Session::get('warning') }}</center> </strong> 
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <br><strong>{{ $error }}</strong>
                        @endforeach
                    </ul>
                </div>
            @endif

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
							<td>{{ Carbon\Carbon::parse($procure->request_date)->format('M. d, Y')}}</td>
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
								<a href="{{ route('approved-po.show', $procure->group_id) }}" class="manage-view-but" title="View">View Details</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
	  	</div>
        <div class="clr"></div>
    </div>
	
	

@include('templates.footer')


<script type="text/javascript">
    /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
    $('#comment-warning').fadeOut('fast');
}, 5000); 
</script>