
@include('templates.header')

  <title>Edit Assets | Asset Management and Procurement System</title>
</head>

<body>
  <div class="flex-container" style="width: 80%; margin: auto;">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Update Asset</h1>
      </div>
    </div>
    <hr class="m-t-0">
    
     <form action="{{route('assets-management.update', $asset->id)}}" method="POST">
      {{method_field('PUT')}}
      {{csrf_field()}}

      <div class="columns">
        <div class="column">

              <!-- success -->
              @if(Session::has('success'))
              <div class="comment-error">
                 <strong> {{ Session::get('success') }}</strong> 
              </div>
              @endif


           <div class="field">
                <label for="category_type" class="label">Category</label>
                 <select name="category_type" id="category_type" class="control">
                  @foreach($category as $cat)
                    <option value="{{ $cat->category }}" {{ $asset->category_type === $cat->category? 'selected' : '' }}>{{ $cat->category }}</option>
                  @endforeach
                </select>
              </div><br>


              <div class="field">
                <label for="asset_tag" class="label">Asset Tag</label>
                <p class="control">
                    <input type="text" class="input" name="asset_tag" id="asset_tag" value="{{$asset->asset_tag}}">
                </p>
              </div>

              <div class="field">
                <label for="service_tag" class="label">Service Tag</label>
                <p class="control">
                    <input type="text" class="input" name="service_tag" id="service_tag" value="{{$asset->service_tag}}">
                </p>
              </div>

              <div class="field">
                <label for="serial_number" class="label">Serial Number</label>
                <p class="control">
                    <input type="text" class="input" name="serial_number" id="serial_number" value="{{$asset->serial_number}}">
                </p>
              </div>

              <div class="field">
                <label for="status" class="label">Status</label>
                 <select name="status" id="status" class="control">
                    <option value="Working" {{ $asset->status === 'Working'? 'selected' : '' }}>Working</option>
                    <option value="Defective" {{ $asset->status === 'Defective'? 'selected' : '' }}>Defective</option>
                    <option value="Pulled out" {{ $asset->status === 'Pulled out'? 'selected' : '' }}>Pulled out</option>
                </select>
              </div><br>

                <div class="field">
                <label for="remarks" class="label">Remarks</label>
                 <select name="remarks" id="remarks" class="control">
                    <option value="Available" {{ $asset->remarks === 'Available'? 'selected' : '' }}>Available</option>
                    <option value="Deployed" {{ $asset->remarks === 'Deployed'? 'selected' : '' }}>Deployed</option>
                    <option value="Not Available" {{ $asset->remarks === 'Not Available'? 'selected' : '' }}>Not Available</option>
                </select>
              </div><br>

              <div class="field">
                <label for="status" class="label">Deployment</label>
                <p class="control">
                    <input type="text" class="input" name="deployment" id="deployment" value="{{$asset->deployment}}">
                </p>
              </div>
 



        </div> <!-- end of .column -->

      </div>
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Update Asset</button>
        </div>
      </div>
      <a href="{{ route('assets-management.index') }}">Back</a>

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
    
    </form>

@include('templates.footer')