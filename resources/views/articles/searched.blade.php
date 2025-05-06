<x-layout>
    <div class="container-fluid py-5">
        <div class="row py-5 justify-content-center aling-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('ui.searchTab') }}: "<span class="fst-italic">{{ $query }}"</span></h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h2 class="text-center">{{ __('ui.searchTitle') }}</h2>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
