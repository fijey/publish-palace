<div>
    {{-- <header class="py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
          <div class="d-flex align-items-center">
    
            {{-- <div class="flex-shrink-0 dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div> --}}

            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-primary-pp">
                <div class="container-fluid">
                  <span class="text-white">PUBLISH PALACE</span>
                    {{-- <img src="{{asset('assets/new-logo.png')}}" alt="logo" width="40" height="40" class="rounded-circle"> --}}
                  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 mx-auto">
                      @if(request()->is('/'))
                      <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                        @if(auth()->user())
                          <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="/dashboard">Dashboard</a>
                          </li>
                        @else
                          <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="#">Login</a>
                          </li>
                        @endif
                      @else
                      <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Book</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Withdraw</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Notification</a>
                      </li>
                      </ul>                      
                        <a class="btn bg-secondary-pp" aria-current="page" href="#">Logout</a>
                      @endif
                    {{-- </ul> --}}
                  </div>
                </div>
              </nav>
</div>
