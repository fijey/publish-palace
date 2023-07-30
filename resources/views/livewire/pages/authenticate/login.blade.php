<div>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 100vh; {{$is_login == false ? 'display:none;' : ''}}">
          <!-- Login Card -->
          <div class="col-md-6 mb-5" style="margin-top:5rem">
            <div class="card bg-primary">
              <div class="card-body">
                <h2 class="card-title text-center text-light">Login</h2>
                <form wire:submit.prevent="login">
                  <!-- Your login form fields here -->
                  <div class="mb-3">
                    <label for="loginEmail" class="form-label text-light text-light">Email address</label>
                    <input wire:model.debounce.2000ms="email" type="email" class="form-control" id="loginEmail" placeholder="Enter your email">
                    @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="loginPassword" class="form-label text-light text-light">Password</label>
                    <input wire:model.debounce.2000ms="password" type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                    @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>

                  <div id="btn-loading" onclick="hideElement('btn-loading')">
                    <button wire:loading.remove type="submit" class="btn btn-secondary d-block mx-auto" >Login</button>
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <button wire:loading wire:target="login" class="btn btn-secondary" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                      </button>
                    </div>
                  </div>

                  <div class="row text-center mt-2">
                      <a role="button" class="text-light" wire:click="is_login()">Daftar Disini Jika Belum Memiliki Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center" style="height: 100vh; {{$is_login == true ? 'display:none' : ''}}">
          <!-- Register Card -->
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="card bg-primary" >
              <div class="card-body">
                <h2 class="card-title text-center text-light">Register</h2>
                <form>
                  <!-- Your register form fields here -->
                  <div class="mb-3">
                    <label for="registerName" class="form-label text-light">Full Name</label>
                    <input type="text" class="form-control" id="registerName" wire:model.debounce.2000ms="name" placeholder="Enter your full name" required>
                    @error('name') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="registerEmail" class="form-label text-light">Email address</label>
                    <input type="email" class="form-control" id="registerEmail" wire:model.debounce.2000ms="email" placeholder="Enter your email" required>
                    @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="registerPassword" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="registerPassword" wire:model.debounce.2000ms="password" placeholder="Enter your password" require>
                    @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                 
                  <button type="button" class="btn btn-secondary d-block mx-auto" wire:click="storeRegister()">Register</button>
                  <div class="row text-center mt-2">
                    <a role="button" class="text-light" wire:click="is_login()">Login Disini Jika Memiliki Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
