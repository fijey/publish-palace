@php 
use App\Helper\PPHelper;
@endphp
<div>
    <div class="container mt-6">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h3>
                    TRANSACTION BOOK
                </h3>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h6>
                    HISTORY PEMBELIAN KAMU
                </h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                @forelse($data_history as $item)
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
                                    <a class="btn btn-primary" wire:click="modal_detail_toggle({{$item->book_id}}, {{$item->id}})">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h6 class="text-center mt-6">
                        BELUM ADA TRANSAKSI APAPUN
                    </h6>
                @endforelse

                <!-- Add more cards here for more transactions -->

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
                                      <div class="col-sm-12 col-md-6 text-center text-md-start">{{$nama_kategori}}</div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Harga</strong></div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start">{{$harga ? PPHelper::formatCurrency($harga) : ''}}</div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Apakah Gratis?</strong></div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_free ? 'Ya, Ini Gratis' : 'Tidak Gratis'}}</div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Lisensi</strong></div>
                                      <div class="col-sm-12 col-md-6 text-center text-md-start">{{$lisensi}}</div>
                                      {{-- <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Status</strong></div> --}}
                                      {{-- <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_publikasi ? 'Sudah Di Publikasi' : 'Draft'}}</div> --}}
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
                        @if($transaction != null)
                            @if($transaction['status'] == "PENDING")
                            <a type="button" href="{{$transaction['url_pembayaran']}}" class="btn btn-primary" target="_blank">BAYAR SEKARANG</a>
                            @elseif($transaction['status'] == "EXPIRED")
                            <a type="button" href="#" class="btn btn-disabeld" target="_blank"><span class="fas fa-lock"></span> &nbsp;&nbsp; SUDAH KADALUARSA</a>
                            @elseif($transaction['status'] == "PAID")
                            <a type="button" href="#" class="btn btn-success" target="_blank"><span class="fas fa-check"></span> &nbsp;&nbsp; SUDAH DIBAYAR</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
