

@include('templates.header')

  <title>Show Requestor Information | Asset Management and Procurement System</title>
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
                <p class="login-comp-nm">Show Requestor Info</p>
                <p class="system-about">View Requestor full Information</p>
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
                        <td>Company Name</td>
                        <td>{{$requestor->company_name}}</td>
                    </tr>

                    <tr>
                        <td>Company Address</td>
                        <td>{{$requestor->company_address}}</td>
                    </tr>

                    <tr>
                        <td>Requestor Name</td>
                        <td>{{$requestor->requestor_name}}</td>
                    </tr>

                    <tr>
                        <td>Designation</td>
                        <td>{{$requestor->designation}}</td>
                    </tr>

                    <tr>
                        <td>Email Address</td>
                        <td>{{$requestor->email_address}}</td>
                    </tr>

                    <tr>
                        <td>Contact Number</td>
                        <td>{{$requestor->contact_number}}</td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td>{{$requestor->phone}}</td>
                    </tr>

            </table>
        </div>
        <a href="{{ url()->previous() }}" class="back-but-l">Back to Previous Page</a>
      
    </div>
    
</div>

@include('templates.footer')
