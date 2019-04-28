<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Inventory &mdash; Miftah</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('dist/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
          	<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
	            <img alt="image" src="{{asset('dist/img/avatar/avatar-1.png')}}" width="30" class="rounded-circle mr-1">
	            @if(Auth::guard('web')->check())
	            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
	            @elseif(Auth::guard('employee')->check())
	            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('employee')->user()->name }}</span>
	            @endif
        	  </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}">MIF's INVENTORY</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">INV</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
          </ul>
          @if(Auth::guard('web')->check())
      	  @if(Auth::guard('web')->check() && Auth::user()->level->name == "admin")
          <ul class="sidebar-menu">
            <li class="menu-header">Data Master</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Data Master</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{route('room.index')}}">Room</a>
                  <a class="dropdown-item" href="{{route('type.index')}}">Type</a>
                  <a class="dropdown-item" href="{{route('item.index')}}">Item</a>
                  <a class="dropdown-item" href="{{route('user.index')}}">User</a>
                  <a class="dropdown-item" href="{{route('employee.index')}}">Employee</a>
                </li>
              </ul>
            </li>
          </ul>
          @endif

          @if(Auth::guard('web')->check() && Auth::user()->level->name == "operator" || Auth::user()->level->name == "admin")
          <ul class="sidebar-menu">
            <li class="menu-header">Borrow</li>
	      	  <li>
  	      		<a class="nav-link" href="{{ route('borrow.index') }}"><i class="fas fa-fw fa-chart-area"></i> <span>Borrow</span></a>
              <a class="nav-link" href="{{ route('maintenance.index') }}"><i class="fas fa-plug"></i> <span>Maintenance</span></a>
            </li>
          </ul>
	      @endif

	      @if(Auth::guard('web')->check() && Auth::user()->level->name == "admin")
	      <ul class="sidebar-menu">
	      	<li class="menu-header">Report</li>
	        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Report</span></a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ route('reportborrow.index') }}">Report Borrow</a>
                <a class="dropdown-item" href="{{ route('reportroom.index') }}">Report Room</a>
                <a class="dropdown-item" href="{{ route('reportitem.index') }}">Report Item</a>
              </li>
            </ul>
          </li>
	      </ul>
	      @endif

	      @elseif(Auth::guard('employee')->check())
	      <ul class="sidebar-menu">
	      	<li class="menu-header">Borrow</li>
	        <li class="nav-item">
	          <a class="nav-link" href="{{ route('borrow.index') }}"> <i class="fas fa-fw fa-chart-area"></i> <span>Borrow</span>
            </a>
	        </li>	
	      </ul>
	      @endif
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">
          	@yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="#">Muhamad Miftah</a>
        </div>
        <div class="footer-right">
          v2.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('dist/modules/jquery.min.js')}}"></script>
  <script src="{{asset('dist/modules/popper.js')}}"></script>
  <script src="{{asset('dist/modules/tooltip.js')}}"></script>
  <script src="{{asset('dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('dist/modules/moment.min.js')}}"></script>
  <script src="{{asset('dist/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('dist/js/scripts.js')}}"></script>
  <script src="{{asset('dist/js/custom.js')}}"></script>
</body>
</html>