<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase pt-3">Area Revisore</h2>
            </div>
            @if (session()->has('message'))
                <div class="row justify-content-center">
                    <div class="col-5 alert alert-success text-center">{{ session('message') }}</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <form action="{{ route('nullable')}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="buttonCust py-md-2 px-md-5 fw-bold w-100">Annulla azione</button>
                        </form>
                    </div> 
                </div>
            @endif
            @if (session()->has('undoMessage'))
                <div class="row justify-content-center">
                    <div class="col-5 alert alert-success text-center">{{ session('undoMessage') }}</div>
                </div>
            @endif
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @if ($article_to_check)
                @php
                    // Logica immagini: se è una traduzione, prendi le immagini dell'originale
                    if (is_null($article_to_check->origin_id)) {
                        $images = $article_to_check->images;
                    } else {
                        $original = \App\Models\Article::find($article_to_check->origin_id);
                        $images = $original ? $original->images : collect();
                    }
                @endphp

                @if ($images->count())
                    <div class="col-12 col-md-8">
                        <div class="flex-column justify-content-center">
                            @foreach ($images as $key => $image)
                                <div class="row">
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{ $image->getUrl(3200, 3200) }}" class="img-fluid rounded shadow img-cust" alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                    </div>
                                    <div class="col-md-4 ps-3">
                                        <div class="card-body">
                                            <h5>Labels</h5>
                                            @if($image->labels) 
                                                @foreach ($image->labels as $label)
                                                    #{{ $label }},
                                                @endforeach
                                            @else
                                                <p class="fst-italic">Nessun label trovato</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 ps-3 my-5">
                                        <div class="card-body">
                                            <h5>Ratings:</h5>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->adult}}"></div>
                                                </div>
                                                <div class="col-10">Adult</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->violence}}"></div>
                                                </div>
                                                <div class="col-10">violence</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->spoof}}"></div>
                                                </div>
                                                <div class="col-10">spoof</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->racy}}"></div>
                                                </div>
                                                <div class="col-10">racy</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->medical}}"></div>
                                                </div>
                                                <div class="col-10">medical</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-12 col-md-8">
                        <div class="row justify-content-center">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/300" alt="immagine segnaposto" class="img-fluid rounded shadow">
                                </div>
                            @endfor
                        </div>
                    </div>    
                @endif

                <div class="col-12 col-md-10 col-lg-4 ps-lg-4 d-flex flex-column justify-content-between boxShadows ">
                    <div class="d-flex flex-column">
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>Autore: {{ $article_to_check->user->name }}</h3>
                        <h4 class="fw-bold">{{ $article_to_check->price}} €</h4>
                        <span class="fst-italic text-center align-self-end mb-3 categoryBdg">{{ $article_to_check->category->name}}</span>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex flex-column flex-lg-row justify-content-around gap-3 p-md-4 ">
                        <form action="{{ route('accept', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="buttonCust px-2 py-lg-2 px-lg-5 fw-bold w-100">Accetta</button>
                        </form>
                        <form action="{{ route('reject', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="buttonCust px-2 py-lg-2 px-lg-5 fw-bold w-100">Rifiuta</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row justify-content-center align-items-center height-custom text-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4 my-5">Nessun articolo da revisionare</h1>
                        <a href="{{ route('homepage') }}" class="buttonCust text-decoration-none">Torna all'homepage</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>

