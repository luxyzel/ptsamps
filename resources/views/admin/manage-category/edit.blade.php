
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
                    <p class="login-comp-nm">Update Category</p>
                    <p class="system-about">Update Category to your assets</p>
                </div>
                <div class="clr"></div>
            </div>

            <form method="POST" action="{{route('category.update', $category->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
          
                <label class="lbl-login">Category</label>
                <input type="text" class="input" name="category" id="category" autocomplete="off" value="{{$category->category}}">
                
                <label class="lbl-login">Category Type</label>
                <input type="text" class="input" name="category_type" id="category_type" autocomplete="off" value="{{$category->category_type}}">

                <div class="field">
                <label class="lbl-login">Classification</label>
                 <select name="type" id="type" class="control">
                    <option value="Assets" {{ $category->type === 'Assets'? 'selected' : '' }}>Assets</option>
                    <option value="Peripherals" {{ $category->type === 'Peripherals'? 'selected' : '' }}>Peripherals</option>
                </select>
              </div><br>

                <button class="submit-approver-acc" style="margin-top: 30px;">Update Category</button>

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


                <a href="{{ route('category.index') }}" class="back-to-manage">Back to Previous Page</a>

          </form>

        </div>

    <div>

@include('templates.footer')