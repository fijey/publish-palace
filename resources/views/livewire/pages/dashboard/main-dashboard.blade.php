<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }
        .main{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(https://tinypic.host/images/2023/03/20/Shapes-Abstraction-Background-2466799.jpg);
        background-position: center;
        background-size: cover;
        }
        .profile-card{
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 1000px;
        width: 70%;
        border-radius: 25px;
        padding: 30px;
        border: 1px solid #ffffff40;
        box-shadow: 0 5px 20px rgba(0,0,0,0.4);
        }
        .image{
        position: relative;
        height: 150px;
        width: 150px;
        }
        .image .profile-pic{
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 5px 20px rgba(0,0,0,0.4);
        }
        .data{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 15px;
        }
        .data h2{
        font-size: 33px;
        font-weight: 600;
        color: #fff;
        }
        span{
        font-size: 18px;
        }
        .row{
        display: flex;
        align-items: center;
        margin-top: 30px;
        }
        .row .info{
        text-align: center;
        padding: 0 20px;
        }
        .buttons{
        display: flex;
        align-items: center;
        margin-top: 30px;
        }
        .buttons .btn{
        text-decoration: none;
        margin: 0 20px;
        padding: 8px 25px;
        border-radius: 25px;
        font-size: 18px;
        white-space: nowrap;
        background: linear-gradient(to left, #ffc107 0%, #ffc107 100%);
        }
        .buttons .btn:hover{
        box-shadow: inset 0 5px 20px rgba(0,0,0,0.4);
        }
  </style>
    {{-- desktop --}}
    <section class="main container d-none d-md-block">
      <div class="profile-card mt-8 mx-auto bg-primary text-light">
          <div class="image">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjxivAs4UknzmDfLBXGMxQkayiZDhR2ftB4jcIV7LEnIEStiUyMygioZnbLXCAND-I_xWQpVp0jv-dv9NVNbuKn4sNpXYtLIJk2-IOdWQNpC2Ldapnljifu0pnQqAWU848Ja4lT9ugQex-nwECEh3a96GXwiRXlnGEE6FFF_tKm66IGe3fzmLaVIoNL/s1600/img_avatar.png" alt="" class="profile-pic">
          </div>
          <div class="data text-center">
            <h2>{{$user->name}}</h2>
            <span>{{$user->role_user}}</span>
            <span>{{$user->email}}</span>
          </div>
          <div class="row">
             <div class="col-12">
                  {{$user->description}}
             </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-12 col-md-4 info">
              <h6 style="color: #fff">Buku Kamu Telah Dilihat</h6>
              <span>{{$total_buku_dilihat}} x</span>
            </div>
            <div class="col-sm-12 col-md-4 info">
              <h6 style="color: #fff">Buku Kamu Telah Dibeli</h6>
              <span>{{$total_buku_dibeli}} x</span>
            </div>
            <div class="col-sm-12 col-md-4 info" role="button" wire:click="modal_history()">
              <h6 style="color: #fff">Total Hasil Penjualan Buku</h6>
              <span>IDR. {{number_format($total_hasil_penjualan,2)}}</span>
            </div>
          </div>
          <div class="mt-3">
            <a class="btn btn-secondary" wire:click="modal_toggle()">Edit Profile</a>
            <a class="btn btn-success" wire:click="modal_withdraw()">Withdraw</a>
          </div>

          <div class="row">
            <div class="col-12 text-center">
              <h4 class="text-light mb-4">Book Analytics</h4>
              <h6 class="text-white">Coming soon</h6>
            </div>
          </div>
    </section>

    {{-- mobile --}}
    <section class="main container d-block d-md-none">
        <div class="text-center mt-8">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="image">
                      <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjxivAs4UknzmDfLBXGMxQkayiZDhR2ftB4jcIV7LEnIEStiUyMygioZnbLXCAND-I_xWQpVp0jv-dv9NVNbuKn4sNpXYtLIJk2-IOdWQNpC2Ldapnljifu0pnQqAWU848Ja4lT9ugQex-nwECEh3a96GXwiRXlnGEE6FFF_tKm66IGe3fzmLaVIoNL/s1600/img_avatar.png" alt="" class="profile-pic">
                    </div>
                </div>
            </div>
            <div class="data text-center">
              <h2>{{$user->name}}</h2>
              <span>{{$user->role_user}}</span>
              <span>{{$user->email}}</span>
            </div>
            <div class="row">
               <div class="col-12">
                    {{$user->description}}
               </div>
            </div>
            <div class="row">
              <div class="col-6 mt-4 info">
                <h6>Buku Kamu Telah Dilihat</h6>
                <span>{{$total_buku_dilihat}} x</span>
              </div>
              <div class="col-6 mt-4 info">
                <h6>Buku Kamu Telah Dibeli</h6>
                <span>{{$total_buku_dibeli}} x</span>
              </div>
              <div class="col-12 text-center mt-4 info" role="button" wire:click="modal_history()">
                <h6>Total Hasil Penjualan</h6><br>
                <span>{{number_format($total_hasil_penjualan,2)}}</span>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class=" d-block">
                      <a href="#" class="btn btn-secondary" wire:click="modal_toggle()">Edit Profile</a>
                      <a class="btn btn-success" wire:click="modal_withdraw()">Withdraw</a>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <h4 class=" mb-4">Book Analytics</h4>
                <h6 class="">Coming soon</h6>
              </div>
            </div>
        </div>
    </section>

    <x-modal>
        @slot('title')
          Update Profile    
        @endslot
                    <form>
                    <!-- Input Nama -->
                    <div class="form-group">
                        <label for="inputNama">Nama</label>
                        <input type="text" wire:model.debounce.1000ms="name" class="form-control" id="inputNama" placeholder="Masukkan Nama">
                        @error('name') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                    </div>
                    <!-- Input Email -->
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" wire:model.debounce.1000ms="email" class="form-control" id="inputEmail" placeholder="Masukkan Email">
                        @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                    </div>
                    <!-- Input Password -->
                    {{-- <div class="form-group">
                        <label for="inputPassword">Ubah Password</label>
                        <input type="password" wire:model.debounce.1000ms="password" class="form-control" id="inputPassword" placeholder="Masukkan Password">
                        @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                    </div> --}}
                    <!-- Input Description -->
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea class="form-control" wire:model.debounce.1000ms="description" id="inputDescription" rows="3" placeholder="Masukkan Description"></textarea>
                    </div>
                    <!-- Input Role -->
                    <div class="form-group">
                        <label for="inputRole">Sudah Punya Pekerjaan?</label>
                        <input type="text" class="form-control" wire:model.debounce.1000ms="role_user" id="inputEmail" placeholder="Penulis & Penyanyi">
                        @error('role_user') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                    </div>
                    </form>   
    </x-modal>
    
    {{-- modal withdraw --}}
    <div class="modal fade {{$is_show_withdraw == true ? 'show' : ''}}" style="{{$is_show_withdraw == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="modalBookDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Withdraw Balance</h5>
                  <a class="close" role="button" data-dismiss="modal" aria-label="Close" wire:click="modal_withdraw(false)">
                      <span aria-hidden="true">&times;</span>
                  </a>
              </div>
              <div class="modal-body">
                  <form method="POST">
  
                      <div class="form-group mb-3">
                          <label for="saldo">Jumlah Saldo Kamu : </label>
                          <span id="saldo">IDR {{number_format($total_hasil_penjualan,2)}}</span>
                      </div>
  
                      <div class="form-group">
                          <label for="amount">Amount</label>
                          <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" required>
                          @error('amount')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
  
                      <div class="form-group">
                          <label for="bank_account">Bank Account</label>
                          <input id="bank_account" type="text" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" required>
                          @error('bank_account')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="modal_withdraw()">Tutup</button>
                  <button type="button" class="btn btn-primary" wire:click="request_withdraw()">request Withdraw</button>
              </div>
          </div>
      </div>
  </div>
  

    {{-- modal history --}}
    <div class="modal fade {{$is_show_history == true ? 'show' : ''}}" style="{{$is_show_history == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="modalBookDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Rekapan Pembelian Buku</h5>
                  <a class="close" role="button" data-dismiss="modal" aria-label="Close" wire:click="modal_history(false)">
                      <span aria-hidden="true">&times;</span>
                  </a>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    @forelse ($data_book_transaction as $item)
                      <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>{{$item->kode_pembayaran}}</strong>
                                </div>
                                <div class="col-md-3">
                                    Transaction Date: {{$item->created_at}}
                                </div>
                                <div class="col-md-3">
                                    Status: {{$item->status}}
                                </div>
                                <div class="col-md-3">
                                    {{-- <a class="btn btn-primary" wire:click="modal_detail_toggle({{$item->book_id}}, {{$item->id}})">View Details</a> --}}
                                  Harga : {{number_format($item->amount,2)}}
                                </div>
                            </div>
                        </div>
                      </div>
                    @empty
                        Belum Ada Pembelian Pada Buku Kamu
                    @endforelse
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modal_history()">Tutup</button>
              </div>
          </div>
    </div>



    </div>
