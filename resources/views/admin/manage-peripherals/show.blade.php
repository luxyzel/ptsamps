

@include('templates.header')

  <title>Show Peripherals Information | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
<div class="landing-bg">

    <div class="view-cont" style="width: 600px;">

        <div class="login-title" style="margin-bottom: 20px;">
            <div class="login-logo fl">
                <img src="/img/companylogo.png" title="Project T Solutions">
            </div>
            <div class="login-text fl">
                <p class="login-comp-nm">Show Peripherals Info</p>
                <p class="system-about">View Peripherals full Information</p>
            </div>
            <div class="clr"></div>
        </div>

        <div class="manage-content">
            <table style="width: 100%; text-align: center;">
                <head>
                    <tr>
                        <th>Property</th>
                        <th>Value</th>
                    </tr>
                </head>
                    <tr>
                        <td>Category</td>
                        <td>{{$peripheral->category_type}}</td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>{{$peripheral->model}}</td>
                    </tr>
                    <tr>
                        <td>STMSN</td>
                        <td>{{$peripheral->stmsn}}</td>
                    </tr>
                    <tr>
                        <td>PDSN</td>
                        <td>{{$peripheral->pdsn}}</td>
                    </tr>
                    <tr>
                        <td>Asset Tag</td>
                        <td>{{$peripheral->asset_tag}}</td>
                    </tr>
                    <tr>
                        <td>Condition</td>
                        <td>{{$peripheral->condition}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$peripheral->status}}</td>
                    </tr>
                    <tr>
                        <td>Date Delivered</td>
                        <td>{{ \Carbon\Carbon::parse(\DB::table('peripherals')->first()->date_delivered)->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <td>Warranty Ends</td>
                        <td>{{$peripheral->warranty_ends}}</td>
                    </tr>
                    <tr>
                        <td>Vendors</td>
                        <td>{{$peripheral->vendor}}</td>
                    </tr>
                    <tr>
                        <td>Notes</td>
                        <td>{{$peripheral->notes}}</td>
                    </tr>
            </table>
        </div>
        <a href="{{ url()->previous()  }}" class="back-but-l">Back to Peripherals</a>

    </div>


    {{-- Container Creating User --}}
    {{-- <div class="viewacc-interface-cont"> --}}

      {{-- TOP LABELS --}}
        {{-- <div class="login-title">
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
            <p class="view-label">{{$peripheral->category_type}}</p>
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
            
        <a href="{{ url()->previous()  }}" class="back-to-manage">Back to Peripherals</a> --}}

    {{-- </div> --}}
    
</div>

@include('templates.footer')
