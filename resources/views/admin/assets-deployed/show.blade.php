

@include('templates.header')

  <title>Deployed Asset Information | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="large-cont">

      {{-- TOP LABELS --}}
        <div class="login-title" style="margin-bottom: 20px;">
            <div class="login-logo fl">
                <img src="/img/companylogo.png" title="Project T Solutions">
            </div>
            <div class="login-text fl">
                <p class="login-comp-nm">Show Deployed Asset Info</p>
                <p class="system-about">View Asset full Information</p>
            </div>
            <div class="clr"></div>
        </div>

        {{-- First  --}}
        <div class="lcont-c-asset fl" style="padding-right: 10px">

            {{-- Categories --}}
            <label class="lbl-login">Category</label>
            <p class="view-label-full">{{$asset->category}}</p>

            <!-- Model -->
            <label class="lbl-login" style="margin-top: 20px;">Model</label>
            @if(!is_null($asset->model))   
                <p class="view-label-full">{{$asset->model}}</p>
            @else
                <p class="view-label-full"N/A></p>
            @endif

            <!-- ST MSN -->
            <label class="lbl-login" style="margin-top: 20px;">ST MSN</label>
            @if(!is_null($asset->st_msn))    
                <p class="view-label-full">{{$asset->st_msn}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- PDSN -->
            <label class="lbl-login" style="margin-top: 20px;">PDSN</label>
            @if(!is_null($asset->pdsn))  
                <p class="view-label-full">{{$asset->pdsn}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Asset Tag -->
            <label class="lbl-login" style="margin-top: 20px;">Asset Tag</label>
            @if(!is_null($asset->asset_tag))
                <p class="view-label-full">{{$asset->asset_tag}}</p>
            @else
                <p class="view-label-full">N/A</p>    
            @endif

            <!--  Asset Number -->
            <label class="lbl-login" style="margin-top: 20px;">Asset Number</label>
            @if(!is_null($asset->asset_number))  
                <p class="view-label-full">{{$asset->asset_number}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Adapter -->
            <label class="lbl-login" style="margin-top: 20px;">Adapter</label>
            @if(!is_null($asset->adapter))  
                <p class="view-label-full">{{$asset->adapter}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

        </div>

        {{-- Second --}}
        <div class="lcont-c-asset fl" style="padding-left: 5px; padding-right: 5px;">
            
            <!-- Location -->
            <label class="lbl-login">Location</label>
            @if(!is_null($asset->location))
                <p class="view-label-full">{{$asset->location}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- WS No. -->
            <label class="lbl-login" style="margin-top: 20px;">WS No.</label>
            @if(!is_null($asset->ws_nno))  
                <p class="view-label-full">{{$asset->ws_no}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- ST -->
            <label class="lbl-login" style="margin-top: 20px;">ST</label>
            @if(!is_null($asset->st))  
                <p class="view-label-full">{{$asset->st}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!--  S/N -->
            <label class="lbl-login" style="margin-top: 20px;">S/N</label>
            @if(!is_null($asset->s_n))  
                <p class="view-label-full">{{$asset->s_n}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Mouse -->
            <label class="lbl-login" style="margin-top: 20px;">Mouse</label>
            @if(!is_null($asset->mouse))  
                <p class="view-label-full">{{$asset->mouse}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Keyboard -->
            <label class="lbl-login" style="margin-top: 20px;">Keyboard</label>
            @if(!is_null($asset->keyboard))  
                <p class="view-label-full">{{$asset->keyboard}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Code -->
            <label class="lbl-login" style="margin-top: 20px;">Code</label>
            @if(!is_null($asset->code))  
                <p class="view-label-full">{{$asset->code}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

        </div>

        <div class="lcont-c-asset fl" style="padding-left: 10px">

            <!-- Description -->
            <label class="lbl-login">Description</label>
            @if(!is_null($asset->description))  
                <p class="view-label-full">{{$asset->description}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Condition -->
            <label class="lbl-login" style="margin-top: 20px;">Condition</label>
            @if(!is_null($asset->condition))
                <p class="view-label-full">{{$asset->condition}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Status -->
            <label class="lbl-login" style="margin-top: 20px;">Status</label>
            @if(!is_null($asset->status))  
                <p class="view-label-full">{{$asset->status}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Date Delivered -->
            <label class="lbl-login" style="margin-top: 20px;">Date Delivered</label>
            @if(!is_null($asset->date_delivered))
                <p class="view-label-full">{{ \Carbon\Carbon::parse(\DB::table('assets')->first()->date_delivered)->toFormattedDateString() }}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Warranty Ends -->
            <label class="lbl-login" style="margin-top: 20px;">Warranty Ends</label>
            @if(!is_null($asset->warranty_ends))  
                <p class="view-label-full">{{$asset->warranty_ends}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Vendor -->
            <label class="lbl-login" style="margin-top: 20px;">Vendor</label>
            @if(!is_null($asset->vendor))  
                <p class="view-label-full">{{$asset->vendor}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <!-- Notes -->
            <label class="lbl-login" style="margin-top: 20px;">Notes</label>
            @if(!is_null($asset->notes))  
                <p class="view-label-full">{{$asset->notes}}</p>
            @else
                <p class="view-label-full">N/A</p>
            @endif

            <a href="{{ route('deployed-units.index') }}" class="back-but-l">Back to Assets Deployed Page</a>
        </div>
        

    </div>
    
</div>

@include('templates.footer')
