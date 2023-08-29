        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Blog Site</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('frontend.home') }}" class="nav-item nav-link {{ Request::path() == '/' ? 'active' : '' }}">Home</a>
                    <a href="{{ route('frontend.bloglist') }}" class="nav-item nav-link {{ Request::path() == 'blog/list' ? 'active' : '' }}">Blog Post</a>
                    @foreach($categories as $category)
                    <a href="{{ route('frontend.blog.filter', $category->id) }}" class="nav-item nav-link {{ Request::path() == 'contact' ? 'active' : '' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                @if (Auth::user())
                <!-- <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block"> Logout<i class="fa fa-user ms-3"></i></a>
                 -->
                <div class="dropdown">
                    <button class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="#!" onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    </ul>
                </div>
                @else
                <button class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block"> <a class="text-white" href="{{ route('login') }}">Login</a>  / <a class="text-white" href="{{ route('register') }}">Signup</a><i class="fa fa-user ms-3"></i></button>
                @endif
            </div>
        </nav>
        <!-- Navbar End -->