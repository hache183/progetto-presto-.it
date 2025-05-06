<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 d-flex justify-content-center mt-5">
                @if (session()->has('errorMessage'))
                <div class="alert alert-danger text-center shadow rounded w-50 d-flex justify-content-center">
                    {{ session('errorMessage') }}
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-success text-center shadow rounded w-50 d-flex justify-content-center"> 
                {{ session('message') }}    
                </div>    
                @endif
            </div>
            <div class="col-12 col-md-8">
                @guest
                <h1 class="text-center my-5">{{ __('ui.Welcome') }}, {{ __('ui.User') }}</h1>
                @endguest
                @auth
                    <h1 class="text-center my-5">{{ __('ui.WelcomeBack') }}, {{ Auth::user()->name }}</h1>
                    <div class="d-flex justify-content-center mb-5"><a href="{{route('create.article')}}" class="buttonCust buttonCustHome text-decoration-none">{{ __('ui.PublishAListing') }}</a></div> 
                @endauth
            </div>
            
        </div>
    
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <form role="search" method="GET" action="{{ route('article.search') }}">
                    <div class="input-group mb-3 d-flex flex-row justify-content-center form-custom align-items-center">
                        <button class="bg-transparent border-0 px-4 text-light" type="submit" id="button-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg></button>
                        <input type="search" class=" bg-transparent border-0 text-center text-light" placeholder="{{ __('ui.SearchAListing') }}" name="query">
                      </div>
                      
                </form>
            </div>
        </div>
        <div class="row my-5 justify-content-center">
            @forelse ($articles as $article)
                @if(app()->getLocale() ==  $article->language_code)
                    <div class="col-12 col-md-4">
                        <x-card :article="$article" />
                    </div>
                @elseif(app()->getLocale() == $article->language_code)
                    <div class="col-12 col-md-4">
                        <x-card :article="$article" />
                    </div>
                @elseif(app()->getLocale() == $article->language_code)
                    <div class="col-12 col-md-4">
                        <x-card :article="$article" />
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <h2 class="text-center">Nessun annuncio disponibile</h2>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
