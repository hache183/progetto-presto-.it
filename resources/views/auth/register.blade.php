<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase pt-3">Registrati</h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12 col-md-5 boxShadows">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="userName" class="form-label">Username</label>
                      <input type="text" class="form-control" id="userName" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Indirizzo Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                      <label for="password-confirmation" class="form-label">Conferma Password</label>
                      <input type="password" class="form-control" id="password-confirmation" name="password_confirmation">
                    </div>
                    
                    <button type="submit" class="buttonCust mt-3 w-100">Register</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>