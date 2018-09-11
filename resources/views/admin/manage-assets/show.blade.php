

@include('templates.header')

  <title>Show Account Information | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="view-cont" style="width: 600px;">

      {{-- TOP LABELS --}}
        <div class="login-title" style="margin-bottom: 20px;">
            <div class="login-logo fl">
                <img src="/img/companylogo.png" title="Project T Solutions">
            </div>
            <div class="login-text fl">
                <p class="login-comp-nm">Show Asset Info</p>
                <p class="system-about">View Asset full Information</p>
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
                        <td>{{$asset->category_type}}</td>
                    </tr>

                    @if(!is_null($asset->model))
                        <tr>
                            <td>Model</td>
                            <td>{{$asset->model}}</td>
                        </tr>
                    @else
                    @endif 

                    @if(!is_null($asset->st_msn)) 
                        <tr>
                            <td>ST MSN</td>
                            <td>{{$asset->st_msn}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->pdsn))
                        <tr>
                            <td>PDSN</td>
                            <td>{{$asset->pdsn}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->asset_tag))
                        <tr>
                            <td>Asset Tag</td>
                            <td>{{$asset->asset_tag}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->asset_number)) 
                        <tr>
                            <td>Asset Number</td>
                            <td>{{$asset->asset_number}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->adapter))
                        <tr>
                            <td>Adapter</td>
                            <td>{{$asset->adapter}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->location))
                        <tr>
                            <td>Location</td>
                            <td>{{$asset->location}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->ws_no))
                        <tr>
                            <td>WS No.</td>
                            <td>{{$asset->ws_no}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->st)) 
                        <tr>
                            <td>ST</td>
                            <td>{{$asset->st}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->s_n))
                        <tr>
                            <td>S/N</td>
                            <td>{{$asset->s_n}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->mouse))
                        <tr>
                            <td>Mouse</td>
                            <td>{{$asset->mouse}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->keyboard)) 
                        <tr>
                            <td>Keyboard</td>
                            <td>{{$asset->keyboard}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->code))
                        <tr>
                            <td>Code</td>
                            <td>{{$asset->code}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->description)) 
                        <tr>
                            <td>Description</td>
                            <td>{{$asset->description}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->condition))
                        <tr>
                            <td>Condition</td>
                            <td>{{$asset->condition}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->status))
                        <tr>
                            <td>Status</td>
                            <td>{{$asset->status}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->date_delivered))
                        <tr>
                            <td>Date Delivered</td>
                            <td>{{ Carbon\Carbon::parse($asset->date_delivered)->format('M. d, Y') }}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->warranty_ends))
                        <tr>
                            <td>Warranty Ends</td>
                            @if (strtotime($asset->warranty_ends));
                            <td>{{ Carbon\Carbon::parse($asset->warranty_ends)->format('M. d, Y') }}</td>
                            @else
                            <td>{{ $asset->warranty_ends }}</td>
                            @endif
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->vendor))
                        <tr>
                            <td>Vendor</td>
                            <td>{{$asset->vendor}}</td>
                        </tr>
                    @else
                    @endif

                    @if(!is_null($asset->notes))
                        <tr>
                            <td>Category</td>
                            <td>{{$asset->notes}}</td>
                        </tr>
                    @else
                    @endif
            </table>
        </div>
        <a href="{{ url()->previous() }}" class="back-but-l">Back to Manage Assets</a>


    </div>
    
</div>

@include('templates.footer')
