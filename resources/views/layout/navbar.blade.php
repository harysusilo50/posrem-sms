      <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
              <ul class="navbar-nav">
                  <li class="nav-item d-block d-xl-none">
                      <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                          <i class="ti ti-menu-2"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <h4 class="d-none d-xl-block">
                        {{ Request::is('/') || Request::is('dashboard') ? '' : 'POSYANDU REMAJA SRENGSENG MENUJU SEHAT' }}
                      </h4>
                  </li>
              </ul>
              <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                  <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                      <li class="nav-item dropdown">
                          <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="{{ asset('img/user.png') }}" alt="" width="35" height="35"
                                  class="rounded-circle">
                          </a>
                          <!-- Cek jika user belum login -->
                          @guest
                              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                  <div class="message-body">
                                      <a href="{{ route('login') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-login fs-6"></i>
                                          <p class="mb-0 fs-3">Login</p>
                                      </a>
                                      <a href="{{ route('register') }}"
                                          class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-user-plus fs-6"></i>
                                          <p class="mb-0 fs-3">Register</p>
                                      </a>
                                  </div>
                              </div>
                          @endguest

                          <!-- Cek jika user sudah login -->
                          @auth
                              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                  <div class="message-body">
                                      <a class="d-flex align-items-center gap-2 dropdown-item">
                                          <p class="mb-0 fs-3">Halo, {{ Auth::user()->nama }}</p>
                                      </a>
                                      <a href="{{ route('user.profil') }}"
                                          class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-user fs-6"></i>
                                          <p class="mb-0 fs-3">Profile Saya</p>
                                      </a>
                                      <form method="POST" action="{{ route('logout') }}">
                                          @csrf
                                          <button class="btn btn-outline-primary mx-auto mt-2 d-block" type="submit">
                                              Logout
                                          </button>
                                      </form>
                                  </div>
                              </div>
                          @endauth
                      </li>
                  </ul>
              </div>
          </nav>
      </header>
