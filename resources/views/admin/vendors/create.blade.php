

            <form method="POST" action="{{route('category.store')}}">
                {{ csrf_field() }}
                
        <div class="columns">
            <div class="column">

                <!-- warning invalid credentials -->
                @if(Session::has('success'))
                <div class="comment-error">
                   <strong> {{ Session::get('success') }}</strong> 
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
                    <input type="text" class="input" name="phone" id="phone" value="">
                </p>
                </div>

                <div class="field">
                <label for="fax" class="label">Fax</label>
                <p class="control">
                    <input type="text" class="input" name="fax" id="fax" value="">
                </p>
                </div>

                <div class="field">
                <label for="vrtin" class="label">VAT Reg. TIN: </label>
                <p class="control">
                    <input type="text" class="input" name="vrtin" id="vrtin" value="">
                </p>
                </div>

                 <button class="submit-approver-acc" style="margin-top: 40px;">Add Category</button>
            </div><br>

            </div> <!-- end of .column -->

                <!-- DISPLAY ERRORS -->
                 @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    </div>
                 @endif

                {{-- Success Message --}}
                @if(Session::has('success'))
                    <div class="comment-success">
                    <strong>{{ Session::get('success') }}</strong> 
                </div>
                @endif


                <a href="{{ route('vendor.index') }}" class="back-to-manage">Back to Previous Page</a>

          </form>
