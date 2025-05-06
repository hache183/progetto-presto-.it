<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase pt-3">{{ __('ui.PublishAListing') }}</h2>
            </div>

        </div>
        @if(session()->has('success'))
        <div class="alert alert-success text-center d-flex justify-content-center">
            {{session('success')}}
        </div>
        @endif
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12 col-md-10">
                <div class="boxShadows">
                    <form wire:submit = "store">
                        <div class="mb-3">
                          <label for="title" class="form-label @error('title') is-invalid @enderror">{{ __('ui.Titolo') }}</label>
                          <input type="text" wire:model.blur = "title" class="form-control" id="title" aria-describedby="emailHelp">
                          @error('title')
                          <p class="fst-italic text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">{{ __('ui.Immagini') }}</label>
                            <input type="file" wire:model.live="temporary_images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/ ">
                            @error('temporary_images.*')
                                <p class="fst-italic text-danger">{{ $message }}</p>
                            @enderror
                            @error('temporary_images')
                                <p class="fst-italic text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        @if (!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p>{{ __('ui.AnteprimaImmagini') }}:</p>
                                    <div class="row borderPreview py-4">
                                        @foreach ($images as $key => $image)
                                            <div class="col d-flex flex-column align-items-center my-3">
                                                <div class="img-preview mx-auto shadow rounded"                         style="background-image: url({{ $image->temporaryUrl() }});">
                                                </div>
                                                <button type="button" class="btn mt-1 btn-danger" wire:click = "removeImage({{$key}})">X</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                          <label for="description" class="form-label @error('description') is-invalid @enderror">{{ __('ui.Descrizione') }}</label>
                          <textarea name="description" wire:model.blur = "description" class="form-control" id="description" cols="30" rows="10"></textarea>
                          @error('description')
                          <p class="fst-italic text-danger">{{$message}}</p>
                          @enderror
                        
                        </div>
                        <div class="mb-3">
                          <label for="price" class="form-label @error('price') is-invalid @enderror">{{ __('ui.Prezzo') }}</label>
                          <input type="text" wire:model.blur = "price" class="form-control" id="price" >
                          @error('price')
                          <p class="fst-italic text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <select class="form-select @error('category') is-invalid @enderror" wire:model.blur = "category" aria-label="Default select example">
                                <option selected>{{ __('ui.ScegliUnaCategoria') }}</option>
                                @foreach($categories as $category)
                                <option value = "{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="fst-italic text-danger">{{$message}}</p>
                            @enderror
    
                        </div>
                        
                        <button type="submit" class="buttonCust mt-3 w-100">{{ __('ui.Pubblica') }}</button>
                    </form>
                </div>
        
            </div>
        </div>
    </div>
</div>
