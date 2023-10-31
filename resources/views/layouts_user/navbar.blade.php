<div class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a href="index.html" class="navbar-brand">Confer</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="{{ route('user') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Service</a>
                <a href="feature.html" class="nav-item nav-link">Feature</a>
                <a href="advisor.html" class="nav-item nav-link">Advisor</a>
                <a href="review.html" class="nav-item nav-link">Review</a>
                <a href="{{ route('contack') }}" class="nav-item nav-link">Contact</a>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            </div>
        </div>
    </div>
</div>
@section('navbar')