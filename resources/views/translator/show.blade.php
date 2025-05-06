<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h2 class="text-center text-uppercase pt-3">{{ __('ui.TraduciAnnuncio') }}</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5 mb-5">
            <div class="col-12 col-md-6">
                <div class="boxShadows">
                    <div>
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center text-uppercase pt-3">{{ __('ui.TraduciAnnuncioView') }}</h2>
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">{{ __('ui.Titolo') }}</label>
                          <input type="text" class="form-control" id="title" aria-describedby="emailHelp" value="{{ $article->title }}" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">{{ __('ui.Descrizione') }}</label>
                          <textarea name="description" class="form-control" id="description" cols="30" rows="10" disabled>{{ $article->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="boxShadows">
                    <form method="POST" action="{{ route('translator.store', $article) }}">
                        @csrf
                        <div class="mb-3">
                          <label for="title" class="form-label @error('title') is-invalid @enderror">{{ __('ui.Titolo') }}</label>
                          <input type="text" class="form-control" id="title" name="title">
                          @error('title')
                          <p class="fst-italic text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label @error('description') is-invalid @enderror">{{ __('ui.Descrizione') }}</label>
                          <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                          @error('description')
                          <p class="fst-italic text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <button type="submit" class="buttonCust mt-3 w-100">{{ __('ui.Pubblica') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
