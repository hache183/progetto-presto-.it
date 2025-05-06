<nav class="navbar navbar-expand-lg navbarCustom">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{ route('homepage')}}">
            <img src="/media/logo.png" alt="" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">{{ __('ui.Home') }}</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{ __('ui.Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">{{ __('ui.Register') }}</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index')}}">{{ __('ui.allArticles') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __("ui.Category") }}</a>
                    <ul class="dropdown-menu custom-dropdown">
                        @foreach($categories as $category)
                        <li>
                            <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">{{ __("ui.$category->name") }}</a>
                        </li>
                        @if(!$loop->last)
                            <hr class="dropdown-divider">
                        @endif
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.article')}}">{{ __('ui.CreateListing') }}</a>
                </li>
                {{-- DROPDOWN MENU --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.WelcomeBack') }} {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu custom-dropdownUser">
                        @if (Auth::user()->is_revisor)
                        <li class="">
                            <div class="d-flex flex-row">
                                <a class="dropdown-item position-relative" href="{{ route('revisor.index') }}">{{ __('ui.RevisorZone') }}</a>
                                <span class="badge rounded-pill">{{ \App\Models\Article::toBeRevisedCount()}}</span>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        @endif
                        @if (Auth::user()->is_translator)
                        <li class="">
                            <div class="d-flex flex-row">
                                <a class="dropdown-item position-relative" href="{{ route('translator.index') }}">{{ __('ui.TranslatorZone') }}</a>
                                <span class="badge rounded-pill">{{ \App\Models\Article::toBeTranslatedCount()}}</span>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        @endif
                        <li class="">
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout').submit()">{{ __('ui.Logout') }}</a>
                        </li>
                        <form method="POST" action="{{route('logout')}}" id="logout">
                            @csrf
                        </form>
                        <li><hr class="dropdown-divider"></li>
                        <div class="d-flex justify-content-center text-start">
                            
                            <a class="text-decoration-none" href="#"><x-_locale lang="it"/></a></li>
                            <a class="text-decoration-none" href="#"><x-_locale lang="en"/></a></li>
                            <a class="text-decoration-none" href="#"><x-_locale lang="fr"/></a></li>
                        </div>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
