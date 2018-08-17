
@include('templates.header')

  <title>Update Account | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
  <div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Approver Account</p>
                    <p class="system-about">Account Exclusively for Executives</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM EDIT REQUESTOR INFORMATION --}}
            <form method="POST" action="{{route('requestor.update', $requestor->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login">Requestor Name</label>
                <input type="text" class="input" name="reqname" id="reqname" autofocus autocomplete="off"  required placeholder="fullname" value="{{$requestor->requestor_name}}">
                
                <label class="lbl-login">Company Name</label>
                <input type="text" class="input" name="comname" id="comname" autocomplete="off"  required placeholder="company name" value="{{$requestor->company_name}}">
                
                <label class="lbl-login">Company Shipping Address</label>
                <input type="text" class="input" name="comaddress" id="comaddress" autocomplete="off"  required placeholder="address" value="{{$requestor->company_address}}">

                <label class="lbl-login">Designation</label>
                <input type="text" class="input" name="designation" id="designation" autocomplete="off"  required placeholder="designation" value="{{$requestor->designation}}">

                <label class="lbl-login">Email Address</label>
                <input type="email" class="input" name="emailadd" id="emailadd" autocomplete="off"  required placeholder="email" value="{{$requestor->email_address}}">

                <label class="lbl-login">Contact Number</label>
                <input type="text" class="input" name="contactnum" id="contactnum" autocomplete="off"  required placeholder="contact number" value="{{$requestor->contact_number}}">

                <label class="lbl-login">Phone Number</label>
                <input type="text" class="input" name="phonenum" id="phonenum" autocomplete="off"  required placeholder="phone number" value="{{$requestor->phone}}">

                <button class="submit-approver-acc">Update Requestor Info</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <!-- ALERT SUCCESS -->
                @if(Session::has('success'))
                <div class="comment-success" id="comment-success" style="margin-top: 25px">
                    <strong> {{ Session::get('success') }}</strong> 
                </div>
                @endif

                <!-- DISPLAY WARNING -->
                @if(Session::has('warning'))
                    <div class="comment-error">
                       <strong><center>{{ Session::get('warning') }}</center> </strong> 
                    </div>
                @endif

                <a href="{{ route('requestor.index') }}" class="back-to-manage">Back to Requestor Page</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')

<script type="text/javascript">

/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>