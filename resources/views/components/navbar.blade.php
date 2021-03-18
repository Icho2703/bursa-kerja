
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="index.html">
          <img style="width: 130px; margin-right:5px;" src="{{ asset('logobkkstmj.png') }}" alt="">
        </a>
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              {{--  our  --}}
              <li  class="nav-item">
                <a style="color: white;" class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              @if (Auth::check())
              <li class="nav-item  {{ request()->is('professions.table') ? 'active' : ''}}">
                <a style="color: white" class="nav-link" href="/professions/index">Lowongan</a>
              </li>
              {{--  our  --}}
                <li class="nav-item">
                    <a href="#about" class="nav-link smoothScroll">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="#project" class="nav-link smoothScroll">Berita</a>
                </li>
                <li class="nav-item">
                    <a href="blog.html" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link contact">Contact</a>
                </li>
                @endif
                @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                  @endif
                  
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a style="color: white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>
  
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">
                          Profil Saya
                        </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
  
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
            </ul>
        </div>
    </div>
  </nav>