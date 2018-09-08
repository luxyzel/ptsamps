@include('templates.header')

  <title>Create Status | Asset Management and Procurement System</title>
</head>

<body>

	<div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont-condition">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Create New Status</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('statuses.store')}}">
     	 	{{ csrf_field() }}

       			<label for="name" class="lbl-login">Status</label>
              	<input type="text" class="input" name="status" id="status" value="{{old('status')}}">
            		
                <button class="submit-approver-acc">Add Condition</button>

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