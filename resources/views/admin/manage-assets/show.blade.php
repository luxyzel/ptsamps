

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
                <p class="login-comp-nm">Show Asset Info</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="view-container">
            <label class="lbl-view">Category</label>
            <p class="view-label">{{$asset->category}}</p>
            <!-- Model -->
            @if(!is_null($asset->model))   
            <label class="lbl-view" style="margin-top: 20px;">Model</label>
            <p class="view-label">{{$asset->model}}</p>
            @endif
            <!-- ST MSN -->
            @if(!is_null($asset->st_msn))    
            <label class="lbl-view" style="margin-top: 20px;">ST MSN</label>
            <p class="view-label">{{$asset->st_msn}}</p>
            @endif
            <!-- PDSN -->
            @if(!is_null($asset->pdsn))  
            <label class="lbl-view" style="margin-top: 20px;">PDSN</label>
            <p class="view-label">{{$asset->pdsn}}</p>
            @endif
            <!-- Asset Tag -->
            @if(!is_null($asset->asset_tag))  
            <label class="lbl-view" style="margin-top: 20px;">Asset Tag</label>
            <p class="view-label">{{$asset->asset_tag}}</p>
            @endif
           <!--  Asset Number -->
            @if(!is_null($asset->asset_number))  
            <label class="lbl-view" style="margin-top: 20px;">Asset Number</label>
            <p class="view-label">{{$asset->asset_number}}</p>
            @endif
            <!-- Adapter -->
            @if(!is_null($asset->adapter))  
            <label class="lbl-view" style="margin-top: 20px;">Adapter</label>
            <p class="view-label">{{$asset->adapter}}</p>
            @endif
            <!-- Location -->
            @if(!is_null($asset->location))  
            <label class="lbl-view" style="margin-top: 20px;">Location</label>
            <p class="view-label">{{$asset->location}}</p>
            @endif
            <!-- WS No. -->
            @if(!is_null($asset->ws_nno))  
            <label class="lbl-view" style="margin-top: 20px;">WS No.</label>
            <p class="view-label">{{$asset->ws_no}}</p>
            @endif
            <!-- ST -->
            @if(!is_null($asset->st))  
            <label class="lbl-view" style="margin-top: 20px;">ST</label>
            <p class="view-label">{{$asset->st}}</p>
            @endif
           <!--  S/N -->
            @if(!is_null($asset->s_n))  
            <label class="lbl-view" style="margin-top: 20px;">S/N</label>
            <p class="view-label">{{$asset->s_n}}</p>
            @endif
            <!-- Mouse -->
            @if(!is_null($asset->mouse))  
            <label class="lbl-view" style="margin-top: 20px;">Mouse</label>
            <p class="view-label">{{$asset->mouse}}</p>
            @endif
            <!-- Keyboard -->
            @if(!is_null($asset->keyboard))  
            <label class="lbl-view" style="margin-top: 20px;">Keyboard</label>
            <p class="view-label">{{$asset->keyboard}}</p>
            @endif
            <!-- Code -->
            @if(!is_null($asset->code))  
            <label class="lbl-view" style="margin-top: 20px;">Code</label>
            <p class="view-label">{{$asset->code}}</p>
            @endif
            <!-- Description -->
            @if(!is_null($asset->description))  
            <label class="lbl-view" style="margin-top: 20px;">Description</label>
            <p class="view-label">{{$asset->description}}</p>
            @endif
            <!-- Condition -->
            @if(!is_null($asset->condition))  
            <label class="lbl-view" style="margin-top: 20px;">Condition</label>
            <p class="view-label">{{$asset->condition}}</p>
            @endif
            <!-- Status -->
            @if(!is_null($asset->status))  
            <label class="lbl-view" style="margin-top: 20px;">Status</label>
            <p class="view-label">{{$asset->status}}</p>
            @endif
            <!-- Date Delivered -->
            @if(!is_null($asset->date_delivered))  
            <label class="lbl-view" style="margin-top: 20px;">Date Delivered</label>
            <p class="view-label">{{ \Carbon\Carbon::parse(\DB::table('assets')->first()->date_delivered)->toFormattedDateString() }}</p>
            @endif
            <!-- Warranty Ends -->
            @if(!is_null($asset->warranty_ends))  
            <label class="lbl-view" style="margin-top: 20px;">Warranty Ends</label>
            <p class="view-label">{{$asset->warranty_ends}}</p>
            @endif
            <!-- Vendor -->
            @if(!is_null($asset->vendor))  
            <label class="lbl-view" style="margin-top: 20px;">Vendor</label>
            <p class="view-label">{{$asset->vendor}}</p>
            @endif
            <!-- Notes -->
            @if(!is_null($asset->notes))  
            <label class="lbl-view" style="margin-top: 20px;">Notes</label>
            <p class="view-label">{{$asset->notes}}</p>
            @endif
        </div>
            
        <a href="{{ route('assets-management.index') }}" class="back-to-manage">Back to Manage Users</a>

    </div>
    
</div>

@include('templates.footer')
