

@include('templates.header')

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

<style type="text/css">
  
  a {
    text-decoration: none !important;
  }
</style>

  <title>Calendar | Asset Management and Procurement System</title>
</head>

<body>

  <!-- Start of Dashboard -->
  <div class="dboard-container">

    <!-- Left Side (Panel) -->
    <div class="dboard-left-panel fl">
      
      <!-- Company profile -->
      <div class="dboard-prof">
        <img src="/img/companylogo.png" title="Project T Solutions">



        <!-- Admin -->
        <div class="dboard-admin">
          <div class="admin-avatar fl"></div>
          <div class="admin-profile-name fl">
            <p>{{$admin->name}}</p>
            <p class="admin-subtxt">Administrator</p>
          </div>
          <div class="clr"></div>
        </div>

      </div>

      <!-- Buttons -->
      <div class="dboard-prof">
        <a href="{{ route('deployed-units.index')}}">
          <div class="dboard-left-but">Deployed Units</div>
        </a>
        <a href="{{ route('assets.stocks')}}">
          <div class="dboard-left-but">Stock Assets</div>
        </a>
        <a href="{{ route('procurement.index')}}">
          <div class="dboard-left-but">Procurement</div>
        </a>
        <a href="{{ route('vendor.index')}}">
          <div class="dboard-left-but">Vendors</div>
        </a>
        <a href="{{ route('requestor.index')}}">
          <div class="dboard-left-but">Requestor</div>
        </a>
        <a href="{{ route('calendar') }}">
          <div class="dboard-left-but">Calendar</div>
        </a>
        <a href="{{ route('logs.index') }}">
          <div class="dboard-left-but">Logs</div>
        </a>
      </div>
    </div>

    <!-- Right Side -->
    <div class="dboard-right-panel fr">
      
      <!-- Menu Srip -->
      <div class="dboard-menustrip">
        <div class="dboard-menu-left-cont fl">
          
          <!-- Dashboard Upper Menus Left -->
          <div class="dboard-left-menu fl">
            <a href="{{route('dashboard')}}">
              <div class="dboard-menu1-box">
                <img src="/img/icon1.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop1">
              <img src="/img/hoverarrow1.png">
              <p>Dashboard</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{ route('assets-management.index') }}">
              <div class="dboard-menu3-box">
                <img src="/img/icon3.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop3">
              <img src="/img/hoverarrow1.png">
              <p>Asset Management</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{route('assets-tracking.index')}}">
              <div class="dboard-menu2-box">
                <img src="/img/icon2.png" >
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop2">
              <img src="/img/hoverarrow1.png">
              <p>Asset Tracking</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{ route('po-tracking.index')}}">
              <div class="dboard-menu4-box">
                <img src="/img/icon4.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop4">
              <img src="/img/hoverarrow1.png">
              <p>P.O. Tracking</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{ route('peripherals.index') }}">
              <div class="dboard-menu5-box">
                <img src="/img/icon5.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop5">
              <img src="/img/hoverarrow1.png">
              <p>Peripherals</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{ route('category.index') }}">
              <div class="dboard-menu6-box">
                <img src="/img/icon6.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop6">
              <img src="/img/hoverarrow1.png">
              <p>Categories & Others</p>
            </div>
          </div>
          <div class="dboard-left-menu fl">
            <a href="{{ route('users.index') }}">
              <div class="dboard-menu7-box">
                <img src="/img/icon7.png">
              </div>
            </a>

            <!-- popup menu name -->
            <div id="dboard-menu-pop7">
              <img src="/img/hoverarrow1.png">
              <p>Manage User</p>
            </div>
          </div>
          <div class="clr"></div>

        </div>

        <!-- Dashboard Upper Right menus -->
        <div class="dboard-menu-right-cont fl">

          <!-- Right menus -->
          <div class="dboard-right-menu fr">
            <a href="#" id="acc-but">
              <div class="dboard-rmenu1-box">
                <img src="/img/menuicon.png">
              </div>
            </a>
          </div>

          <div class="dboard-right-menu fr">
            <a href="#" id="acc-but">
              <div class="dboard-rmenu2-box"></div>
            </a>
          </div>

          <div class="clr"></div>

          <!--Account popup -->
          <div id="acc-but-popup">
            <img src="/img/hoverarrow2.png">
            <div id="acc-but-popup-cont">
              <a href="{{ route('acc.settings') }}">Account Settings</a><br>
              <a href="{{route('admin.logout')}}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit(); ">Logout</a>
            </div>
          </div>

          <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
        <div class="clr"></div>
      </div>


      <br>
      {{-- <div class="manage-content"> --}}
      {{-- <div class="container"> --}}
        @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
        @endif
        @if(Session::has('warning'))
          <div class="comment-error">
              <br><strong><center>{{ Session::get('warning') }}</center> </strong> 
          </div>
        @endif
        
        <br>
        <a href="{{ route('event.index') }}" class="dboard-add-acc fl" style="padding: 3px 10px;">View Event List</a><br><br>

       <div class="panel panel-default">
             <div class="panel-heading">
                 <h2>Calendar of Events</h2>
             </div>
             <td><br>
             </td>
             <div class="panel-body" >
              
                {!! $calendar->calendar() !!}
            </div>
      </div>
    {{--   </div> --}}
  {{--   </div> --}}

    </div>
    <div class="clr"></div>
  </div>


@include('templates.footer')
{!! $calendar->script() !!}
<script type="text/javascript">
/*** Auto-Submit Form on Dropdown Change ***/
$(document).ready(function() {
   $('#users').change(function() {
     var parentForm = $(this).closest("form");
     if (parentForm && parentForm.length > 0)
       parentForm.submit();
   });
});

</script>


<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>