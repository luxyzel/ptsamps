

@include('templates.header')

  <title>Show Account Information | Asset Management and Procurement System</title>
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
                <p class="login-comp-nm">Show Perepherals Info</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="view-container">
            <label class="lbl-view">Category</label>
            <p class="view-label">{{$perepheral->category}}</p>
            <!-- Model -->
            <label class="lbl-view" style="margin-top: 20px;">Model</label>
            <p class="view-label">{{$perepheral->model}}</p>
            <!-- ST MSN --> 
            <label class="lbl-view" style="margin-top: 20px;">ST MSN</label>
            <p class="view-label">{{$perepheral->stmsn}}</p>
            <!-- PDSN -->
            <label class="lbl-view" style="margin-top: 20px;">PDSN</label>
            <p class="view-label">{{$perepheral->pdsn}}</p>
            <!-- Asset Tag --> 
            <label class="lbl-view" style="margin-top: 20px;">Asset Tag</label>
            <p class="view-label">{{$perepheral->asset_tag}}</p>
            <!-- Condition -->
            <label class="lbl-view" style="margin-top: 20px;">Condition</label>
            <p class="view-label">{{$perepheral->condition}}</p>
            <!-- Status -->
            <label class="lbl-view" style="margin-top: 20px;">Status</label>
            <p class="view-label">{{$perepheral->status}}</p>
            <!-- Date Delivered -->  
            <label class="lbl-view" style="margin-top: 20px;">Date Delivered</label>
            <p class="view-label">{{ \Carbon\Carbon::parse(\DB::table('perepherals')->first()->date_delivered)->toFormattedDateString() }}</p>
            <!-- Warranty Ends -->
            <label class="lbl-view" style="margin-top: 20px;">Warranty Ends</label>
            <p class="view-label">{{$perepheral->warranty_ends}}</p>
            <!-- Vendor -->  
            <label class="lbl-view" style="margin-top: 20px;">Vendor</label>
            <p class="view-label">{{$perepheral->vendor}}</p>
            <!-- Notes -->
            <label class="lbl-view" style="margin-top: 20px;">Notes</label>
            <p class="view-label">{{$perepheral->notes}}</p>
        </div>
            
        <a href="{{ route('perepherals.index') }}" class="back-to-manage">Back to Perepherals</a>

    </div>
    
</div>

@include('templates.footer')
