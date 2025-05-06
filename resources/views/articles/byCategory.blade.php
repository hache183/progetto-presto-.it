<x-layout>
    <div class="container text-center">
        <div class="row justify-content-center my-5">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.ArticoloCategoria') }}: {{ __("ui.$category->name") }}</h1>
            </div>
        </div>
        <div class="row justify-content-center my-5">
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
                <div class="col-12 mb-5">
                    <h2 class="text-center my-5">{{ __('ui.noCategoryAcc') }}</h2>
                    @auth
                    <a href="{{ route('create.article') }}" class="buttonCust buttonCustHome text-decoration-none">{{ __('ui.PublishAListing') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
