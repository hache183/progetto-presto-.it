<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">
                <h1 class="text-center my-5">{{__('ui.allArticles')}}</h1>
            </div>
        </div>
        <div class="row">
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
        <div>
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
