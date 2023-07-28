<div>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 100vh; {{$is_login == false ? 'display:none;' : ''}}">
          <!-- Login Card -->
          <div class="col-md-6 mb-5" style="margin-top:5rem">
            <div class="card bg-primary-pp">
              <div class="card-body">
                <h2 class="card-title text-center">Login</h2>
                <form>
                  <!-- Your login form fields here -->
                  <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <input wire:model.debounce.2000ms="email" type="email" class="form-control" id="loginEmail" placeholder="Enter your email">
                    @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input wire:model.debounce.2000ms="password" type="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                    @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <button type="button" class="btn btn-primary d-block mx-auto" wire:click="login()">Login</button>
                  <div class="row text-center mt-2">
                      <a role="button" wire:click="is_login()">Daftar Disini Jika Belum Memiliki Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center" style="height: 100vh; {{$is_login == true ? 'display:none' : ''}}">
          <!-- Register Card -->
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="card bg-primary-pp" >
              <div class="card-body">
                <h2 class="card-title text-center">Register</h2>
                <form>
                  <!-- Your register form fields here -->
                  <div class="mb-3">
                    <label for="registerName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="registerName" wire:model.debounce.2000ms="name" placeholder="Enter your full name" required>
                    @error('name') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="registerEmail" wire:model.debounce.2000ms="email" placeholder="Enter your email" required>
                    @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="registerPassword" wire:model.debounce.2000ms="password" placeholder="Enter your password" require>
                    @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                  </div>
                 
                  <button type="button" class="btn btn-primary d-block mx-auto" wire:click="storeRegister()">Register</button>
                  <div class="row text-center mt-2">
                    <a role="button" wire:click="is_login()">Login Disini Jika Memiliki Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
