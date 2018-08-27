
@include('templates.header')

  <title>Edit Assets | Asset Management and Procurement System</title>
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
                    <p class="login-comp-nm">Update Asset Information</p>
                    <p class="system-about">Asset Management</p>
                </div>
                <div class="clr"></div>
            </div>

                {{-- FORM APPROVER ACCOUNT CREATION --}}
                <form method="POST" action="{{route('assets-management.update', $asset->id)}}">
                    {{method_field('PUT')}}
                    {{csrf_field()}}

                    <!-- DISPLAY ERRORS -->
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

                    <label for="category_type" class="lbl-login">Category</label>
                    <select name="category_type" id="category_type" class="control">
                        @foreach($category as $cat)
                            <option value="{{ $cat->category_type }}" {{ $asset->category_type === $cat->category_type? 'selected' : '' }}>{{ $cat->category_type }}</option>
                        @endforeach
                    </select>

                    @if(!is_null($asset->model)) 
                        <label for="model" class="lbl-login">Model</label>
                        <select name="model" id="model" class="control">
                            @foreach($brand as $brand)
                            <option value="{{ $brand->model }}" {{ $asset->model === $brand->model? 'selected' : '' }}>{{ $brand->model }}</option>
                            @endforeach
                        </select>
                    @endif
              
                    @if(!is_null($asset->st_msn))
                        <label for="st_msn" class="lbl-login">ST/MSN</label>
                        <p class="control">
                        <input type="text" class="input" name="st_msn" id="st_msn" value="{{$asset->st_msn}}">
                        </p>
                    @endif
              
                    @if(!is_null($asset->pdsn))
                        <label for="pdsn" class="lbl-login">PDSN</label>
                        <p class="control">
                            <input type="text" class="input" name="pdsn" id="pdsn" value="{{$asset->pdsn}}">
                        </p>
                    @endif
              
                    @if(!is_null($asset->asset_tag)) 
                    <div class="field">
                    <label for="asset_tag" class="lbl-login">Asset Tag</label>
                    <p class="control">
                    <input type="text" class="input" name="asset_tag" id="asset_tag" value="{{$asset->asset_tag}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->asset_number)) 
                    <div class="field">
                    <label for="asset_number" class="lbl-login">Asset Number</label>
                    <p class="control">
                    <input type="text" class="input" name="asset_number" id="asset_number" value="{{$asset->asset_number}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->adapter)) 
                    <div class="field">
                    <label for="adapter" class="lbl-login">Adapter</label>
                    <p class="control">
                        <input type="text" class="input" name="adapter" id="adapter" value="{{$asset->adapter}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->location)) 
                    <div class="field">
                    <label for="location" class="lbl-login">Location</label>
                     <select name="location" id="location" class="control">
                      @foreach($location as $loc)
                        <option value="{{ $loc->location }}" {{ $asset->location === $loc->location? 'selected' : '' }}>{{ $loc->location }}</option>
                      @endforeach
                    </select>
                    </div>
                    @endif

                    @if(!is_null($asset->ws_no)) 
                    <div class="field">
                    <label for="ws_no" class="lbl-login">WS No.</label>
                    <p class="control">
                        <input type="text" class="input" name="ws_no" id="ws_no" value="{{$asset->ws_no}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->st)) 
                    <div class="field">
                    <label for="st" class="lbl-login">ST</label>
                    <p class="control">
                        <input type="text" class="input" name="st" id="st" value="{{$asset->st}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->service_tag)) 
                    <div class="field">
                    <label for="service_tag" class="lbl-login">Service Tag</label>
                    <p class="control">
                        <input type="text" class="input" name="service_tag" id="service_tag" value="{{$asset->service_tag}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->s_n)) 
                    <div class="field">
                    <label for="s_n" class="lbl-login">S/N</label>
                    <p class="control">
                        <input type="text" class="input" name="s_n" id="s_n" value="{{$asset->s_n}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->mouse)) 
                    <div class="field">
                    <label for="mouse" class="lbl-login">Mouse</label>
                    <p class="control">
                        <input type="text" class="input" name="mouse" id="mouse" value="{{$asset->mouse}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->keyboard)) 
                    <div class="field">
                    <label for="keyboard" class="lbl-login">Keyboard</label>
                    <p class="control">
                        <input type="text" class="input" name="keyboard" id="keyboard" value="{{$asset->keyboard}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->code)) 
                    <div class="field">
                    <label for="code" class="lbl-login">Code</label>
                    <p class="control">
                        <input type="text" class="input" name="code" id="code" value="{{$asset->code}}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->description)) 
                    <div class="field">
                    <label for="description" class="lbl-login">Description</label>
                    <p class="control">
                        <input type="text" class="input" name="description" id="description" value="{{$asset->description}}">
                    </p>
                    </div>
                    @endif

              
                    <div class="field">
                    <label for="condition" class="lbl-login">Condition</label>
                     <select name="condition" id="condition" class="control">
                      @foreach($condition as $con)
                        <option value="{{ $con->condition }}" {{ $asset->condition === $con->condition? 'selected' : '' }}>{{ $con->condition }}</option>
                      @endforeach
                    </select>
                    </div>

                    <div class="field">
                    <label for="status" class="lbl-login">Status</label>
                     <select name="status" id="status" class="control">
                      @foreach($status as $status)
                        <option value="{{ $status->status }}" {{ $asset->status === $status->status? 'selected' : '' }}>{{ $status->status }}</option>
                      @endforeach
                    </select>
                    </div>
              
                    @if(!is_null($asset->date_delivered)) 
                    <div class="field">
                    <label for="date_delivered" class="lbl-login">Date Delivered</label>
                    <p class="control">
                        <input type="datetime" class="input" name="date_delivered" id="date_delivered" value="{{ date('F d, Y', strtotime($asset->date_delivered)) }}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->warranty_ends)) 
                    <div class="field">
                    <label for="warranty_ends" class="lbl-login">Warranty Ends</label>
                    <p class="control">
                        <input type="datetime" class="input" name="warranty_ends" id="warranty_ends" value="{{ date('F d, Y', strtotime($asset->warranty_ends)) }}">
                    </p>
                    </div>
                    @endif

                    @if(!is_null($asset->vendor)) 
                    <div class="field">
                    <label for="vendor" class="lbl-login">Vendor</label>
                     <select name="vendor" id="vendor" class="control">
                      @foreach($vendors as $vendor)
                        <option value="{{ $vendor->company_name }}" {{ $asset->vendor === $vendor->company_name? 'selected' : '' }}>{{ $vendor->company_name }}</option>
                      @endforeach
                    </select>
                    </div>
                    @endif
              
                    @if(!is_null($asset->notes)) 
                    <div class="field">
                    <label for="notes" class="lbl-login">Notes</label>
                    <p class="control">
                        <input type="text" class="input" name="notes" id="notes" value="{{$asset->notes}}">
                    </p>
                    </div>
                    @endif

                    <button class="submit-approver-acc" style="margin-top: 20px; margin-bottom: 20px">Update Asset</button>


                    <a href="{{ route('assets-management.index') }}" class="edit-to-back" >Back to Asset Management</a>

                </form>
            </div>

        </div>
    </div>
    
@include('templates.footer')

<script type="text/javascript">
  
  /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('.comment-success').fadeOut('fast');
}, 5000); 

</script>




     <{{-- form action="{{route('assets-management.update', $asset->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}

      <div class="columns">
        <div class="column">

              

              <!-- DISPLAY ERRORS -->
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <strong>{{ $error }}</strong>
                      @endforeach
                  </ul>
              </div>
              @endif


              <div class="field">
                <label for="category_type" class="label">Category</label>
                 <select name="category_type" id="category_type" class="control">
                  @foreach($category as $cat)
                    <option value="{{ $cat->category_type }}" {{ $asset->category_type === $cat->category_type? 'selected' : '' }}>{{ $cat->category_type }}</option>
                  @endforeach
                </select>
              </div><br>

              @if(!is_null($asset->model)) 
              <div class="field">
                <label for="model" class="label">Model</label>
                 <select name="model" id="model" class="control">
                  @foreach($brand as $brand)
                    <option value="{{ $brand->model }}" {{ $asset->model === $brand->model? 'selected' : '' }}>{{ $brand->model }}</option>
                  @endforeach
                </select>
              </div><br>
              @endif
              
              @if(!is_null($asset->st_msn)) 
              <div class="field">
                <label for="st_msn" class="label">ST/MSN</label>
                <p class="control">
                    <input type="text" class="input" name="st_msn" id="st_msn" value="{{$asset->st_msn}}">
                </p>
              </div>
              @endif
              
              @if(!is_null($asset->pdsn)) 
              <div class="field">
                <label for="pdsn" class="label">PDSN</label>
                <p class="control">
                    <input type="text" class="input" name="pdsn" id="pdsn" value="{{$asset->pdsn}}">
                </p>
              </div>
              @endif
              
              @if(!is_null($asset->asset_tag)) 
              <div class="field">
                <label for="asset_tag" class="label">Asset Tag</label>
                <p class="control">
                    <input type="text" class="input" name="asset_tag" id="asset_tag" value="{{$asset->asset_tag}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->asset_number)) 
              <div class="field">
                <label for="asset_number" class="label">Asset Number</label>
                <p class="control">
                    <input type="text" class="input" name="asset_number" id="asset_number" value="{{$asset->asset_number}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->adapter)) 
              <div class="field">
                <label for="adapter" class="label">Adapter</label>
                <p class="control">
                    <input type="text" class="input" name="adapter" id="adapter" value="{{$asset->adapter}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->location)) 
              <div class="field">
                <label for="location" class="label">Location</label>
                 <select name="location" id="location" class="control">
                  @foreach($location as $loc)
                    <option value="{{ $loc->location }}" {{ $asset->location === $loc->location? 'selected' : '' }}>{{ $loc->location }}</option>
                  @endforeach
                </select>
              </div><br>
              @endif

              @if(!is_null($asset->ws_no)) 
              <div class="field">
                <label for="ws_no" class="label">WS No.</label>
                <p class="control">
                    <input type="text" class="input" name="ws_no" id="ws_no" value="{{$asset->ws_no}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->st)) 
              <div class="field">
                <label for="st" class="label">ST</label>
                <p class="control">
                    <input type="text" class="input" name="st" id="st" value="{{$asset->st}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->service_tag)) 
              <div class="field">
                <label for="service_tag" class="label">Service Tag</label>
                <p class="control">
                    <input type="text" class="input" name="service_tag" id="service_tag" value="{{$asset->service_tag}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->s_n)) 
              <div class="field">
                <label for="s_n" class="label">S/N</label>
                <p class="control">
                    <input type="text" class="input" name="s_n" id="s_n" value="{{$asset->s_n}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->mouse)) 
              <div class="field">
                <label for="mouse" class="label">Mouse</label>
                <p class="control">
                    <input type="text" class="input" name="mouse" id="mouse" value="{{$asset->mouse}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->keyboard)) 
              <div class="field">
                <label for="keyboard" class="label">Keyboard</label>
                <p class="control">
                    <input type="text" class="input" name="keyboard" id="keyboard" value="{{$asset->keyboard}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->code)) 
              <div class="field">
                <label for="code" class="label">Code</label>
                <p class="control">
                    <input type="text" class="input" name="code" id="code" value="{{$asset->code}}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->description)) 
              <div class="field">
                <label for="description" class="label">Description</label>
                <p class="control">
                    <input type="text" class="input" name="description" id="description" value="{{$asset->description}}">
                </p>
              </div>
              @endif

              
                <div class="field">
                <label for="condition" class="label">Condition</label>
                 <select name="condition" id="condition" class="control">
                  @foreach($condition as $con)
                    <option value="{{ $con->condition }}" {{ $asset->condition === $con->condition? 'selected' : '' }}>{{ $con->condition }}</option>
                  @endforeach
                </select>
              </div><br>

              <div class="field">
                <label for="status" class="label">Status</label>
                 <select name="status" id="status" class="control">
                  @foreach($status as $status)
                    <option value="{{ $status->status }}" {{ $asset->status === $status->status? 'selected' : '' }}>{{ $status->status }}</option>
                  @endforeach
                </select>
              </div><br>
              
              @if(!is_null($asset->date_delivered)) 
              <div class="field">
                <label for="date_delivered" class="label">Date Delivered</label>
                <p class="control">
                    <input type="datetime" class="input" name="date_delivered" id="date_delivered" value="{{ date('F d, Y', strtotime($asset->date_delivered)) }}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->warranty_ends)) 
              <div class="field">
                <label for="warranty_ends" class="label">Warranty Ends</label>
                <p class="control">
                    <input type="datetime" class="input" name="warranty_ends" id="warranty_ends" value="{{ date('F d, Y', strtotime($asset->warranty_ends)) }}">
                </p>
              </div>
              @endif

              @if(!is_null($asset->vendor)) 
              <div class="field">
                <label for="vendor" class="label">Vendor</label>
                 <select name="vendor" id="vendor" class="control">
                  @foreach($vendors as $vendor)
                    <option value="{{ $vendor->company_name }}" {{ $asset->vendor === $vendor->company_name? 'selected' : '' }}>{{ $vendor->company_name }}</option>
                  @endforeach
                </select>
              </div><br>
              @endif
              
              @if(!is_null($asset->notes)) 
              <div class="field">
                <label for="notes" class="label">Notes</label>
                <p class="control">
                    <input type="text" class="input" name="notes" id="notes" value="{{$asset->notes}}">
                </p>
              </div>
              @endif



        </div> <!-- end of .column -->

      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Asset</button>
        </div>
      </div>
      <a href="{{ route('assets-management.index') }}">Back</a>


    <br><br><br><br>
    </form> --}}

