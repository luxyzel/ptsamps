

             <form action="{{route('vendor.update', $vendor->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}
                
        <div class="columns">
            <div class="column">

                <!-- {{-- Success Message --}} -->
                @if(Session::has('success'))
                <div class="comment-error">
                   <strong> {{ Session::get('success') }}</strong> 
                </div>
                @endif

                <!-- DISPLAY ERRORS -->
                 @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    </div>
                 @endif

 
                <div class="field">
                <label for="coname" class="label">Company Name</label>
                <p class="control">
                    <input type="text" class="input" name="coname" id="coname" value="{{ $vendor->company_name }}">
                </p>
                </div>

                <div class="field">
                <label for="ctperson" class="label">Contact Person</label>
                <p class="control">
                    <input type="text" class="input" name="ctperson" id="ctperson" value="{{ $vendor->contact_person }}">
                </p>
                </div>

                <div class="field">
                <label for="designation" class="label">Designation</label>
                <p class="control">
                    <input type="text" class="input" name="designation" id="designation" value="{{ $vendor->designation }}">
                </p>
                </div>

                <div class="field">
                <label for="emailadd" class="label">Email Address</label>
                <p class="control">
                    <input type="text" class="input" name="emailadd" id="emailadd" value="{{ $vendor->email_address }}">
                </p>
                </div>

                <div class="field">
                <label for="ctnumber" class="label">Contact Number</label>
                <p class="control">
                    <input type="text" class="input" name="ctnumber" id="ctnumber" value="{{ $vendor->contact_number }}">
                </p>
                </div>

                <div class="field">
                <label for="coaddress" class="label">Company Address</label>
                <p class="control">
                    <input type="text" class="input" name="coaddress" id="coaddress" value="{{ $vendor->company_address }}">
                </p>
                </div>

                <div class="field">
                <label for="phone" class="label">Phone</label>
                <p class="control">
                    <input type="text" class="input" name="phone" id="phone" value="{{ $vendor->phone }}" placeholder="###-####">
                </p>
                </div>

                <div class="field">
                <label for="fax" class="label">Fax</label>
                <p class="control">
                    <input type="text" class="input" name="fax" id="fax" value="{{ $vendor->fax }}" placeholder="###-####">
                </p>
                </div>

                <div class="field">
                <label for="vat" class="label">VAT Reg. TIN: </label>
                <p class="control">
                    <input type="text" class="input" name="vat" id="vat" value="{{ $vendor->vat_number }}">
                </p>
                </div>

                 <button class="submit-approver-acc" style="margin-top: 40px;">Update Vendor</button>
            </div><br>

            </div> <!-- end of .column -->



                <a href="{{ route('vendor.index') }}" class="back-to-manage">Back to Previous Page</a>

          </form>
