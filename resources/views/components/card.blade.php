
  <div class="card text-center cardBorder ">
    @php
      $imageSource = null;

      if (is_null($article->origin_id)) {
          // Articolo originale
          $imageSource = $article->images->isNotEmpty()
              ? $article->images->first()->getUrl(3200, 3200)
              : 'https://picsum.photos/300';
      } else {
          $original = \App\Models\Article::find($article->origin_id);
          $imageSource = ($original && $original->images->isNotEmpty())
              ? $original->images->first()->getUrl(3200, 3200)
              : 'https://picsum.photos/300';
      }
     @endphp
    <img src="{{ $imageSource }}" class="card-img-top heightImgCard" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body border-2 border-bottom">
      <h5 class="card-title">{{$article->title}}</h5>
      <p class="card-text text-truncate">{{ $article->description }}</p>
    </div>
    <div class="card-body border-2 border-bottom">
      <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="card-link text-decoration-none categoryBdg">{{__("ui." . $article->category->name)}}</a>
    </div>
    <div class="card-body border-2 border-bottom">
      <p class="card-text">{{ $article->price }}€</p>
    </div>
    <div class="card-body">
      <a href="{{ route('article.show', compact('article')) }}" class="card-link text-decoration-none">{{ __("ui.Dettaglio") }}</a>

    </div>
  </div>

    
