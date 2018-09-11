
@include('templates.header')

  <title>Update Account Information | Asset Management and Procurement System</title>
</head>

<body>

        {{-- Create User Frontend --}}
    <div class="landing-bg">

        {{-- Container Creating User --}}
        <div class="user-interface-cont" style="overflow-y: auto;">

            {{-- TOP LABELS --}}
            <div class="login-title" style="margin-top: 20px;">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Edit Vendor Information</p>
                    <p class="system-about">Vendor Information</p>
                </div>
                <div class="clr"></div>
            </div>

            <form action="{{route('vendor.update', $vendor->id)}}" method="POST" onSubmit="return confirm('Are you sure to submit?');">
            {{method_field('PUT')}}
            {{csrf_field()}}
            
                <label for="coname" class="lbl-login">Company Name</label>
                <input type="text" class="input" name="coname" id="coname" value="{{ $vendor->company_name }}" required>

                <label for="ctperson" class="lbl-login">Contact Person</label>
                <input type="text" class="input" name="ctperson" id="ctperson" value="{{ $vendor->contact_person }}" required>

                <label for="designation" class="lbl-login">Designation</label>
                <input type="text" class="input" name="designation" id="designation" value="{{ $vendor->designation }}" required>

                <label for="emailadd" class="lbl-login">Email Address</label>
                <input type="text" class="input" name="emailadd" id="emailadd" value="{{ $vendor->email_address }}" required>

                <label for="ctnumber" class="lbl-login">Contact Number</label>
                <input type="text" class="input" name="ctnumber" id="ctnumber" value="{{ $vendor->contact_number }}">

                <label for="coaddress" class="lbl-login">Company Address</label>
                <input type="text" class="input" name="coaddress" id="coaddress" value="{{ $vendor->company_address }}" required>

                <label for="phone" class="lbl-login">Phone</label>
                <input type="text" class="input" name="phone" id="phone" value="{{ $vendor->phone }}" placeholder="###-####">

                <label for="fax" class="lbl-login">Fax</label>
                <input type="text" class="input" name="fax" id="fax" value="{{ $vendor->fax }}" placeholder="###-####">

                <label for="vat" class="lbl-login">VAT Reg. TIN: </label>
                <input type="text" class="input" name="vat" id="vat" value="{{ $vendor->vat_number }}" required>                   

                <button class="submit-approver-acc" style="margin-top: 20px; margin-bottom: 20px">Update Vendor</button>


                <a href="{{ route('vendor.index') }}" class="edit-to-back" >Back to Vendor List</a>

                @if ($errors->any())
                    <div class="login-comment-error" style="margin-bottom: 15px;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <!-- success -->
                @if(Session::has('success'))
                    <div class="comment-success" id="comment-error" style="margin-bottom: 15px;">
                        <strong> {{ Session::get('success') }}</strong> 
                    </div>
                @endif

                <!-- warning changed password -->
                @if(Session::has('warning'))
                      <div class="comment-error">
                         <strong> {{ Session::get('warning') }}</strong> 
                      </div>
                 @endif

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

