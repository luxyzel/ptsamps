

            <form method="POST" action="{{route('vendor.store')}}">
                {{ csrf_field() }}
                
        <div class="columns">
            <div class="column">

                <!-- {{-- Success Message --}} -->
                @if(Session::has('success'))
                <div class="comment-error" id="comment-error">
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
                    <input type="text" class="input" name="coname" id="coname" value="">
                </p>
                </div>

                <div class="field">
                <label for="ctperson" class="label">Contact Person</label>
                <p class="control">
                    <input type="text" class="input" name="ctperson" id="ctperson" value="">
                </p>
                </div>

                <div class="field">
                <label for="designation" class="label">Designation</label>
                <p class="control">
                    <input type="text" class="input" name="designation" id="designation" value="">
                </p>
                </div>

                <div class="field">
                <label for="emailadd" class="label">Email Address</label>
                <p class="control">
                    <input type="text" class="input" name="emailadd" id="emailadd" value="">
                </p>
                </div>

                <div class="field">
                <label for="ctnumber" class="label">Contact Number</label>
                <p class="control">
                    <input type="text" class="input" name="ctnumber" id="ctnumber" value="">
                </p>
                </div>

                <div class="field">
                <label for="coaddress" class="label">Company Address</label>
                <p class="control">
                    <input type="text" class="input" name="coaddress" id="coaddress" value="">
                </p>
                </div>

                <div class="field">
                <label for="phone" class="label">Phone</label>
                <p class="control">
                    <input type="text" class="input" name="phone" id="phone" value="" placeholder="###-####">
                </p>
                </div>

                <div class="field">
                <label for="fax" class="label">Fax</label>
                <p class="control">
                    <input type="text" class="input" name="fax" id="fax" value="" placeholder="###-####">
                </p>
                </div>

                <div class="field">
                <label for="vat" class="label">VAT Reg. TIN: </label>
                <p class="control">
                    <input type="text" class="input" name="vat" id="vat" value="">
                </p>
                </div>

                 <button class="submit-approver-acc" style="margin-top: 40px;">Add Vendor</button>
            </div><br>

            </div> <!-- end of .column -->



                <a href="{{ route('vendor.index') }}" class="back-to-manage">Back to Previous Page</a>

          </form>

<script type="text/javascript">
/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);
</script>