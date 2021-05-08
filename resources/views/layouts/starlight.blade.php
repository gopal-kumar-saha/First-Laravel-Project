<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

     <!-- ajax meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href=" {{ asset("starlight_assets/lib/font-awesome/css/font-awesome.css") }}" rel="stylesheet">

    <link href="{{ asset("starlight_assets/lib/Ionicons/css/ionicons.css") }}" rel="stylesheet">

    <link href="{{ asset("starlight_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link  href="{{ asset("starlight_assets/css/starlight.css") }}" rel="stylesheet">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{ url('home') }}" class="sl-menu-link @yield('dashboard') ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->


        @if (Auth::user()->role == 1)

              <a href="{{ url('category') }}" class="sl-menu-link @yield('category')">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Category </span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{ route('SubCategory') }}" class="sl-menu-link @yield('subcategory')">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Sub category </span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{ url('product') }}" class="sl-menu-link @yield('product')">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Product</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{ url('setting') }}" class="sl-menu-link @yield('setting')">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Setting</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="{{ url('coupon') }}" class="sl-menu-link @yield('coupon')">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Coupon</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            
        @endif
        
   
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Pages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
          <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
          <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
          <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
        </ul>
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"> {{ Auth::user()->name }} </span>
              <img src=" {{ asset("starlight_assets/img/img3.jpg") }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li>
                  <a href="{{ route('logout') }}"  
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"> </i> 
                     Sign Out
                  </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
       
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      @yield('breadcrumb')
    <div class="sl-pagebody">
       






    @yield('content')






      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <script src="{{ asset("starlight_assets/lib/jquery/jquery.js") }}" ></script>
    <script src="{{ asset("starlight_assets/lib/popper.js/popper.js") }}"> </script>
    <script src="{{ asset("starlight_assets/lib/bootstrap/bootstrap.js") }}"> </script>
    <script src="{{ asset("starlight_assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js") }}"> </script>

    <script src="{{ asset("starlight_assets/js/starlight.js") }}"></script>

    @yield('starlight_footer_scripts')

  </body>
</html>
