@include('templates.header')

  <title>Update Status | Asset Management and Procurement System</title>
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
                    <p class="login-comp-nm">Update Status</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('statuses.update', $status->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login">Status</label>
                <input type="text" class="input" name="status" id="status" value="{{$status->status}}" autocomplete="off"  required>
                

                <button class="submit-approver-acc">Update Status</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('statuses.index') }}" class="back-to-manage">Back to Manage Status</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')