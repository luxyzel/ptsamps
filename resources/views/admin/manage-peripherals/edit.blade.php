
@include('templates.header')

  <title>Update Peripheral | Asset Management and Procurement System</title>
</head>

<body>

    <div class="landing-bg">

        <div class="user-interface-cont" style="overflow-y: auto;">

            <div class="login-title" style="margin-top: 20px">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Peripherals</p>
                    <p class="system-about">Asset Management</p>
                </div>
                <div class="clr"></div>
            </div>

            <form action="{{route('peripherals.update', $peripheral->id)}}" method="POST" onSubmit="return confirm('Are you sure to submit?');">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label for="category_type" class="lbl-login">Category Type</label>
                <select name="category_type" id="category_type" class="control" required>
                    @foreach($category as $cat)
                        <option value="{{ $cat->category_type }}" {{ $peripheral->category_type === $cat->category_type? 'selected' : '' }}>{{ $cat->category_type }}</option>
                    @endforeach
                </select>

                <label for="model" class="lbl-login">Model</label>
                <input type="text" class="input" name="model" id="model" value="{{ $peripheral->model }}">

                <label for="stmsn" class="lbl-login">ST/MSN</label>
                <input type="text" class="input" name="stmsn" id="stmsn" value="{{ $peripheral->stmsn }}" required>

                <label for="pdsn" class="lbl-login">PDSN</label>
                <input type="text" class="input" name="pdsn" id="pdsn" value="{{ $peripheral->pdsn }}" required>
               
                <label for="asset_tag" class="lbl-login">Asset Tag</label>
                <input type="text" class="input" name="asset_tag" id="asset_tag" value="{{ $peripheral->asset_tag }}" required>
                
                <label for="condition" class="lbl-login">Condition</label>
                <select name="condition" id="condition" class="control" required>
                    @foreach($condition as $con)
                        <option value="{{ $con->condition }}" {{ $peripheral->condition === $con->condition? 'selected' : '' }}>{{ $con->condition }}</option>
                    @endforeach
                </select>

                <label for="status" class="lbl-login">Status</label>
                <select name="status" id="status" class="control" required>
                    @foreach($status as $status)
                        <option value="{{ $status->status }}" {{ $peripheral->status === $status->status? 'selected' : '' }}>{{ $status->status }}</option>
                    @endforeach
                </select>

                <label for="vendor" class="lbl-login">Vendor</label>
                <select name="vendor" id="vendor" class="control" required>
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->company_name }}" {{ $peripheral->vendor === $vendor->company_name? 'selected' : '' }}>{{ $vendor->company_name }}</option>
                    @endforeach
                </select>

                <label for="date_delivered" class="lbl-login">Date Delivered</label>
                <input type="date" class="input" name="date_delivered" id="date_delivered" value="{{$peripheral->date_delivered}}" required>
               
                <label for="warranty_ends" class="lbl-login">Warranty Ends</label>
                <input type="text" class="input" name="warranty_ends" id="warranty_ends" value="{{$peripheral->warranty_ends}}" required>
               
                <label for="notes" class="lbl-login">Notes</label>
                <input type="text" class="input" name="notes" id="notes" value="{{$peripheral->notes}}">

                <button class="submit-approver-acc" style="margin-top: 20px; margin-bottom: 30px">Update Peripheral</button>


                <a href="{{ route('peripherals.index') }}" class="edit-to-back" >Back to peripherals</a>

                @if(Session::has('success'))
                    <div class="comment-success" id="comment-success" style="margin-top: 25px">
                        <strong> {{ Session::get('success') }}</strong> 
                    </div>
                @endif

                @if(Session::has('warning'))
                    <div class="comment-warning" id="comment-warning" style="margin-top: 25px">
                       <strong><center>{{ Session::get('warning') }}</center> </strong> 
                    </div>
                @endif

        </div>

    </div>


@include('templates.footer')

<script type="text/javascript">
  
  /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>