include('posts.header', ['user' => Auth::user()])
<div class="row justify-content-center">
            @guest
            <div class="col-md-12">
                <div class="text-left mb-4">
                    <h3 class="text-primary">@yield('header-title')</h3>

                </div>
            </div>
            @endguest
            @auth
            <div class="col-md-10">
                <div class="text-left mb-4">
                    <h3 class="text-primary">@yield('header-title')</h3>

                </div>
            </div>
            <div class="col-md-2 text-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            </div>
            @endauth
            <hr class="bg-primary">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
@include('posts.footer')
