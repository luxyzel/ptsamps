
@include('templates.header')

  <title>Create Category | Asset Management and Procurement System</title>
</head>

<body>

    {{-- Background --}}
    <div class="landing-bg">

        {{-- Container of form --}}
        <div class="user-interface-cont-peri">
        
            {{-- TOP LABELS --}}
            <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Create New Categories</p>
                    <p class="system-about">Add Category to your assets</p>
                </div>
                <div class="clr"></div>
            </div>

            <form method="POST" action="{{route('category.store')}}">
                {{ csrf_field() }}
          
                <label class="lbl-login">Category</label>
                <input type="text" class="input" name="category" id="category" autocomplete="off" placeholder="ex. System Unit" value="{{old('category')}}">
                
                <label class="lbl-login">Category Type</label>
                <select name="type" id="type" class="control">
                    <option value="Assets">Assets</option>
                    <option value="Peripherals">Peripherals</option>
                </select>

                <button class="submit-approver-acc" style="margin-top: 40px;">Add Category</button>

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


                <a href="{{ route('peripherals.index') }}" class="back-to-manage">Back to Previous Page</a>

          </form>

        </div>

    <div>

@include('templates.footer')