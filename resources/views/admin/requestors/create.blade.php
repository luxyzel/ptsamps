
@include('templates.header')

  <title>Create Requestor | Asset Management and Procurement System</title>
</head>

<body>
	
	{{-- Create User Frontend --}}
	<div class="landing-bg">

		{{-- Container Creating User --}}
		<div class="user-interface-cont" style="height: 650px; margin-top: -325px">

			{{-- TOP LABELS --}}
			<div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Add New Requestor</p>
                    <p class="system-about">Requestor Information Details</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('requestor.store')}}">
            	{{ csrf_field() }}
				
				<label class="lbl-login">Requestor Name</label>
              	<input type="text" class="input" name="reqname" id="reqname" autofocus autocomplete="off"  required placeholder="fullname" value="{{old('reqname')}}">
				
				<label class="lbl-login">Company Name</label>
              	<input type="text" class="input" name="comname" id="comname" autocomplete="off"  required placeholder="company name" value="{{old('comname')}}">
				
				<label class="lbl-login">Company Shipping Address</label>
		        <input type="text" class="input" name="comaddress" id="comaddress" autocomplete="off"  required placeholder="address" value="{{old('comaddress')}}">

		        <label class="lbl-login">Designation</label>
		        <input type="text" class="input" name="designation" id="designation" autocomplete="off"  required placeholder="designation" value="{{old('designation')}}">

		        <label class="lbl-login">Email Address</label>
		        <input type="email" class="input" name="emailadd" id="emailadd" autocomplete="off"  required placeholder="email" value="{{old('emailadd')}}">

		        <label class="lbl-login">Contact Number</label>
		        <input type="text" class="input" name="contactnum" id="contactnum" autocomplete="off"  required placeholder="contact number" value="{{old('contactnum')}}">

		        <label class="lbl-login">Phone Number</label>
		        <input type="text" class="input" name="phonenum" id="phonenum" autocomplete="off"  required placeholder="phone number" value="{{old('phonenum')}}">

		        <button class="submit-approver-acc">Add New Requestor</button>

		        <!-- DISPLAY ERRORS -->
			    @if ($errors->any())
			    <div class="login-comment-error">
					@foreach ($errors->all() as $error)
			        	<p>{{ $error }}</p>
			        @endforeach
			    </div>
			    @endif
				
				<!-- ALERT SUCCESS -->
			    @if(Session::has('success'))
	            <div class="comment-success" id="comment-success">
	                <strong> {{ Session::get('success') }}</strong> 
	            </div>
            	@endif

            	<!-- DISPLAY WARNING -->
	          	@if(Session::has('warning'))
	                <div class="comment-error">
	                   <strong><center>{{ Session::get('warning') }}</center> </strong> 
	                </div>
	            @endif

			    <a href="{{ route('requestor.index') }}" class="back-to-manage">Back to Requestor Page</a>

            </form>

		</div>
		
	</div>

@include('templates.footer')

<script type="text/javascript">

/*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>