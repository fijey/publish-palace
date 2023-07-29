<div>
    <div>
        <style>
          a {
            color: initial;
            text-decoration: initial;
          }
          
      
          .box {
            width: 8rem; /* Ukuran lebar card */
            height: 10rem;
            background-color: #fff;
            transition: .5s;
            margin: 20px; /* Jarak antar card */
            border: 1px solid #ffffff40;
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
          }
      
          .box:hover {
            box-shadow: 5px 5px 70px rgba(0, 0, 0, 0.3);
          }
      
          .top .tab {
            width: 0.5rem;
            height: 1rem;
            background-color: #ff7526;
            float: right;
            margin-right: 15px;
            margin-top: 0;
          }

          .info-buku{
            height: 10rem;
          }
      
       
        </style>
        <div class="container mt-8">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h3>
                        Your Book Collection
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 justify-content-center d-flex justify-content-md-start w-100-sm">
                    <button class="btn btn-primary btn-sm" wire:click="modal_toggle()">
                        Add New Book
                    </button>
                </div>
                <div class="d-flex col-sm-12 justify-content-center col-md-6 justify-content-md-end w-100-sm mt-3">
                    <input class="form-control" placeholder="Search" type="text" name="" id="" style="width:10rem">
                </div>
            </div>
            <div class="row">
                @forelse ($data_books as $item)
                    <div class="col-sm-6 col-md-4 col-lg-2 d-flex justify-content-center" wire:click="modal_detail_toggle({{$item->id}})" role="button">
                        <div class="box top" style=" 
                        position: relative;
                        background-image: url({{asset('storage/' .@$item->cover)}});
                        background-size: cover;">
                            <div class="tab"></div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center mt-8">
                        <h6>Belum Ada Koleksi Buku</h6>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="modal fade {{$is_show == true ? 'show' : ''}}" style="{{$is_show == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">{{$is_edit == true ? 'Update' : 'Create'}}Book</h5>
                 <a  class="close" data-dismiss="modal" aria-label="Close" wire:click="modal_toggle(false)">
                 <span aria-hidden="true">&times;</span>
                 </a>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" wire:model.debounce.2000ms="judul_buku" required>
                            @error('judul_buku') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" wire:model.debounce.2000ms="slug" required>
                            @error('slug') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_penulis" class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control" id="nama_penulis" wire:model.debounce.2000ms="nama_penulis" required>
                            @error('nama_penulis') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control"  id="isbn" wire:model.debounce.2000ms="isbn" required>
                            @error('isbn') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-control"  wire:model.debounce.2000ms="kategori" required>
                                @foreach ($data_kategori as $item)
                                    @php 
                                    $item = (object) $item;
                                    @endphp
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('kategori') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" wire:model.debounce.2000ms="deskripsi" rows="4" required></textarea>
                            @error('deskripsi') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        @if($is_edit == true)
                        <div class="col d-flex justify-content-center">
                            <div class="cover bg-primary-pp" style="height: 200px; width:150px;
                            background-image: url({{asset('storage/' .$cover)}});
                            background-size: cover;"
                            >
                            </div>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" class="form-control" id="cover" wire:model.debounce.2000ms="cover" required>
                            @error('cover') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file_book" class="form-label">File Buku</label>
                            <input type="file" class="form-control" id="file_book" wire:model.debounce.2000ms="file_book" required>
                            @error('file_book') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" wire:model.debounce.2000ms="harga" required>
                            @error('harga') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_free" class="form-label">Gratis?</label>
                            <select class="form-control" id="is_free" wire:model.debounce.2000ms="is_free" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                            @error('is_free') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lisensi" class="form-label">Lisensi</label>
                            <input type="text" class="form-control" id="lisensi" wire:model.debounce.2000ms="lisensi" required>
                            @error('lisensi') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_publikasi" class="form-label">Status?</label>
                            <select class="form-control" id="is_publikasi" wire:model.debounce.2000ms="is_publikasi" required>
                                <option value="1">Publikasikan</option>
                                <option value="0">Draft</option>
                            </select>
                            @error('is_publikasi') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                        </div>
                
                    </form>
                </div>  
            </div>
         
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" wire:click="modal_toggle(false)">Tutup</button>
                 <button type="button" class="btn btn-primary" wire:click="modal_save('profile')">Simpan</button>
            </div>
            </div>
            </div>
       </div>

      <!-- Modal Detail Buku -->
        <div class="modal fade {{$is_show_detail == true ? 'show' : ''}}" style="{{$is_show_detail == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="modalBookDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">{{$judul_buku}}</h5>
                        <a class="close" data-dismiss="modal" aria-label="Close" wire:click="modal_detail_toggle(false)">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 d-flex justify-content-center">
                                    <div class="cover bg-primary-pp" style="height: 200px; width:150px; background-image: url({{asset('storage/' .$cover)}}); background-size: cover;"></div>
                                </div>
                                <div class="col-sm-12 mt-4 col-md-9 mt-md-0 d-flex justify-content-start">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Nama</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$nama_penulis}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Judul</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start ">{{$judul_buku}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>ISBN</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start ">{{$isbn}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Kategori</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$kategori}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Harga</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$harga}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Apakah Gratis?</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_free}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Lisensi</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$lisensi}}</div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Status</strong></div>
                                        <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_publikasi}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-4 mt-md-2">
                                    <h5 class="text-center">Book Description</h5>
                                    <p>{{$deskripsi}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="modal_detail_toggle(false)">Tutup</button>
                        <button type="button" class="btn btn-primary" wire:click="modal_edit_toggle()">Edit</button>
                        <button type="button" class="btn btn-danger" wire:click="delete_book()">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

</div>
