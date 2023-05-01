<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset("backend/images/logo.svg")}}" class="mr-2" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset("backend/images/logo-mini.svg")}}" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    {{-- <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul> --}}
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" role="button">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name }}</span>
          <img src="{{asset("backend/images/faces/face28.jpg")}}" alt="profile"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" >
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" >
            {{-- <i class="ti-power-off text-primary"></i>
            Logout --}}
            <form action="{{('logout')}}" method="POST">
              @csrf
              <button class="btn btn-primary">Logout</button>
            </form>
          </a>
        </div>
      </li>
      
    </ul>
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin Logout ?</h5>
              </div>

              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form action="{{('logout')}}" method="POST">
                      @csrf
                      <button class="btn btn-primary">Logout</button>
                  </form>
              </div>
          </div>
      </div>
    </div> --}}
  </div>
  
</nav>