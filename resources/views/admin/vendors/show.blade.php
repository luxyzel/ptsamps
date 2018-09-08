

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
                <p class="login-comp-nm">Show Vendors Info</p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="view-container">
            <label class="lbl-view">Company Name</label>
            <p class="view-label">{{$vendor->company_name}}</p>
            <!-- Model -->
            <label class="lbl-view" style="margin-top: 20px;">Contact Person</label>
            <p class="view-label">{{$vendor->contact_person}}</p>
            <!-- ST MSN --> 
            <label class="lbl-view" style="margin-top: 20px;">Designation</label>
            <p class="view-label">{{$vendor->designation}}</p>
            <!-- PDSN -->
            <label class="lbl-view" style="margin-top: 20px;">Email Address</label>
            <p class="view-label">{{$vendor->email_address}}</p>
            <!-- Asset Tag --> 
            <label class="lbl-view" style="margin-top: 20px;">Contact Number</label>
            <p class="view-label">{{$vendor->contact_number}}</p>
            <!-- Condition -->
            <label class="lbl-view" style="margin-top: 20px;">Company Address</label>
            <p class="view-label">{{$vendor->company_address}}</p>
            <!-- Status -->
            <label class="lbl-view" style="margin-top: 20px;">Phone</label>
            <p class="view-label">{{$vendor->phone}}</p>
            <!-- Warranty Ends -->
            <label class="lbl-view" style="margin-top: 20px;">Fax</label>
            <p class="view-label">{{$vendor->fax}}</p>
            <!-- Vendor -->  
            <label class="lbl-view" style="margin-top: 20px;">VAT Reg. TIN: </label>
            <p class="view-label">{{$vendor->vat_number}}</p>
        </div>
            
        <a href="{{url()->previous() }}" class="back-to-manage">Back</a>

    </div>
    
</div>

@include('templates.footer')
