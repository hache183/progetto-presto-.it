<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <h2 class="text-center text-uppercase pt-3">{{ __('ui.AreaTraduttore') }}</h2>
            </div>
            <div class="col-12 col-md-8 d-flex justify-content-center mt-5">
                @if (session()->has('message'))
                <div class="alert alert-success text-center shadow rounded w-50 d-flex justify-content-center">
                    {{ session('message') }}
                </div>
                @endif
                @if (session()->has('errorMessage'))
                <div class="alert alert-danger text-center shadow rounded w-50 d-flex justify-content-center">
                    {{ session('errorMessage') }}
                </div>
                @endif
            </div>
            <div class="col-12 mb-5">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr">
                            <th scope="col">#</th>
                            <th scope="col">{{ __('ui.colonnaTitolo') }}</th>
                            <th scope="col">{{ __('ui.colonnaCategoria') }}</th>
                            <th scope="col">{{ __('ui.colonnaLingua') }}</th>
                            <th scope="col">{{ __('ui.colonnaAzione') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ __("ui." . $article->category->name) }}</td>
                            <td>{{ $article->language_code }}</td>
                            <td>
                               <a href="{{ route('translator.show', $article) }}"><button class="buttonCust px-2 py-lg-2 px-lg-5 fw-bold w-100">{{ __('ui.bottoneTraduci') }}</button></a>
                            </td>
                        </tr>
                        @empty
                            <div class="col-12">
                                <h2 class="text-center">{{ __('ui.noAnnunci') }}</h2>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
