
@include('templates.header')

  <title>Update Condition | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
  <div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont-condition">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Condition</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('conditions.update', $condition->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login" style="margin-top: 20px">Condition</label>
                <input type="text" class="input" name="condition" id="condition" value="{{$condition->condition}}" autocomplete="off"  required>
                

                <button class="submit-approver-acc">Update Condition</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('conditions.index') }}" class="back-to-manage">Back to Manage Conditions</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')