<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4 text-center">{{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center  py-5">
            <div class="col-12 col-md-6 mb-3 pe-md-3">
                @php
                    // Prendi la collezione immagini giusta
                    if (is_null($article->origin_id)) {
                        $images = $article->images;
                    } else {
                        $original = \App\Models\Article::find($article->origin_id);
                        $images = $original ? $original->images : collect();
                    }
                @endphp

                @if($images->count() > 0)
                    <div id="carouselExample" class="carousel slide borderCarousel">
                        <div class="carousel-inner">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(3200, 3200) }}" class="d-block w-100 rounded shadow heightImg" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article->title }}'">
                                </div>
                            @endforeach
                        </div>
                        @if ($images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded shadow heightImg" alt="Immagine segnaposto">
                @endif
            </div>
            <div class="col-12 col-md-6 mb-3 height-custom text-center boxShadows">
                <h2 class="display-5"><span class="fw-bold"></span>{{ $article->title }}</h2>
                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-bold customPrice">{{ __('ui.Prezzo') }}: {{ $article->price }} €</h4>
                    <h5>{{ __('ui.Descrizione') }}:</h5>
                    <p>{{ $article->description }}</p>
                    @if($article->origin_id != NULL)
                        <a href="{{ route('article.origin', ['article' => $article->id]) }}">Guarda l'articolo orginale</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
