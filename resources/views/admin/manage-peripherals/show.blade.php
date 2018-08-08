

@include('templates.header')

  <title>Show Peripherals Information | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="viewacc-interface-cont">

      {{-- TOP LABELS --}}
        <div class="login-title">
            <div class="login-logo fl">
                <img src="/img/companylogo.png" title="Project T Solutions">
            </div>
            <div class="login-text fl">
                <p class="login-comp-nm">Show Peripherals Info</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="view-container">
            <label class="lbl-view">Category</label>
            <p class="view-label">{{$peripheral->category}}</p>
            <!-- Model -->
            <label class="lbl-view" style="margin-top: 20px;">Model</label>
            <p class="view-label">{{$peripheral->model}}</p>
            <!-- ST MSN --> 
            <label class="lbl-view" style="margin-top: 20px;">ST MSN</label>
            <p class="view-label">{{$peripheral->stmsn}}</p>
            <!-- PDSN -->
            <label class="lbl-view" style="margin-top: 20px;">PDSN</label>
            <p class="view-label">{{$peripheral->pdsn}}</p>
            <!-- Asset Tag --> 
            <label class="lbl-view" style="margin-top: 20px;">Asset Tag</label>
            <p class="view-label">{{$peripheral->asset_tag}}</p>
            <!-- Condition -->
            <label class="lbl-view" style="margin-top: 20px;">Condition</label>
            <p class="view-label">{{$peripheral->condition}}</p>
            <!-- Status -->
            <label class="lbl-view" style="margin-top: 20px;">Status</label>
            <p class="view-label">{{$peripheral->status}}</p>
            <!-- Date Delivered -->  
            <label class="lbl-view" style="margin-top: 20px;">Date Delivered</label>
            <p class="view-label">{{ \Carbon\Carbon::parse(\DB::table('peripherals')->first()->date_delivered)->toFormattedDateString() }}</p>
            <!-- Warranty Ends -->
            <label class="lbl-view" style="margin-top: 20px;">Warranty Ends</label>
            <p class="view-label">{{$peripheral->warranty_ends}}</p>
            <!-- Vendor -->  
            <label class="lbl-view" style="margin-top: 20px;">Vendor</label>
            <p class="view-label">{{$peripheral->vendor}}</p>
            <!-- Notes -->
            <label class="lbl-view" style="margin-top: 20px;">Notes</label>
            <p class="view-label">{{$peripheral->notes}}</p>
        </div>
            
        <a href="{{ route('peripherals.index') }}" class="back-to-manage">Back to Peripherals</a>

    </div>
    
</div>

@include('templates.footer')
