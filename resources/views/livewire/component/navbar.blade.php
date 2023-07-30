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

            

            <header class="bg-light w-100" style="position: fixed; top:0; z-index:2">
              <nav class="navbar navbar-expand-md navbar-light bg-light">
                  <div class="container-fluid">
                      <!-- Logo -->
                      <a class="navbar-brand" href="/"><img class="logo-icon me-2" src="assets/images/site-logo.svg" alt="logo"><span class="logo-text">Publish Palace</span></a>
                      <!-- Tombol untuk versi mobile -->
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <!-- Menu navigasi -->
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav ms-auto">
                            @if(request()->is('/'))
                              <!-- Route URL 1 -->
                              <li class="nav-item">
                                  <button class="nav-link" onclick="scrollToClass('tentang-kami')">TENTANG KAMI</button>
                              </li>
                              <!-- Route URL 2 -->
                              <li class="nav-item">
                                  <a role="button" class="nav-link"onclick="scrollToClass('fitur')">FITUR</a>
                              </li>
                              <!-- Route URL 3 -->
                              <li class="nav-item">
                                  <a role="button" class="nav-link" onclick="scrollToClass('visi-misi')">VISI MISI</a>
                              </li>
                              @if(Auth::user())
                                <li class="nav-item mx-3 ml-3">
                                    <a role="button" class="nav-link btn btn-secondary" href="/dashboard">DASHBOARD</a>
                                </li>
                                <li class="nav-item ml-5">
                                  <a role="button" class="nav-link btn btn-primary" href="/logout" style="width: 10rem">Logout</a>
                                </li>
                              @endif
                            @else
                              @if( !request()->is('/login'))
                                  <li class="nav-item">
                                    <a role="button" class="nav-link" href="/dashboard">DASHBOARD</a>
                                  </li>
                                  <li class="nav-item">
                                    <a role="button" class="nav-link" href="/book">MY BOOK</a>
                                  </li>
                                  <li class="nav-item">
                                    <a role="button" class="nav-link" href="/explore-book">EXPLORE BOOK</a>
                                  </li>
                                  <li class="nav-item">
                                    <a role="button" class="nav-link" href="/purchased-book">PURCHASED BOOK</a>
                                  </li>
                                  <li class="nav-item">
                                    <a role="button" class="nav-link" href="/transaction-book">TRANSACTION BOOK</a>
                                  </li>
                                  @if(Auth::user())
                                    <li class="nav-item ml-5">
                                      <a role="button" class="nav-link btn btn-primary" href="/logout" style="width: 10rem">Logout</a>
                                    </li>
                                  @endif
                              @endif
                            @endif
                          </ul>
                      </div>
                  </div><!--//container-fluid-->
              </nav>
            </header>
</div>
