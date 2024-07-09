<div>
    <section class="section">
        <div class="section-header">
          <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
          <h1>Pembayaran</h1>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('payment.user')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a>Payment</a></div>
          </div>
        </div>

        <div class="section-body">
          <h2 class="section-title">Pembayaran manual</h2>
          @if ($payment_confirmed == true)
            <div class="alert alert-success">
                <div class="alert-title">Perhatian</div>
                Pembayaran berhasil di konfirmasi  <a class="btn btn-primary" href="{{route('payment-confirmed.user')}}">Klick disini</a>
            </div>
            @else
            @if ($isPayment == true)
            <div class="alert alert-warning">
                <div class="alert-title">Perhatian</div>
                Pembayaran sedang di konfirmasi oleh admin mohon tunggu...
            </div>
            @else
                <div class="row">
                <div class="col-12 ">
                    <div class="card">
                          <div class="card-header">
                            <h4>Q&A Pembayaran</h4>
                          </div>
                          <div class="card-body">
                            <div id="accordion">
                                @foreach ($notif as $item)
                                <div class="accordion">
                                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                    <h4>{{$item->name}}</h4>
                                  </div>
                                  <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <p class="mb-0">{{$item->description}}</p>
                                  </div>
                                </div>
                                @endforeach

                            </div>
                          </div>
                        </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Atas Nama</label>
                            <div class="col-sm-12 col-md-7">
                            <input placeholder="Contoh Bagas Mangkualam" wire:model="account_name" type="text" class="form-control">
                            <span class="text-danger">@error('account_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Rek / No Ewallet</label>
                            <div class="col-sm-12 col-md-7">
                            <input placeholder="Contoh 081234567890 / 1233455532232" wire:model="account_number" type="number" class="form-control">
                            <span class="text-danger">@error('account_number') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominal</label>
                            <div class="col-sm-12 col-md-7">
                            <input wire:model="nominal"  type="hidden" value="{{$total_price}}" class="form-control">
                            <input  type="text" disabled value="Total yang harus di bayarkan : Rp.{{$total_price ?   number_format($total_price, 0, ',', '.') : "0,00"}}" class="mt-2 form-control">
                            @if (!$total_price)
                                <i class="mt-1 mb-1 badge badge-warning">Belum ada order,<br>Silahkan pilih menu dahulu <a href="{{route('order.user')}}">Klik disini</a></i>
                            @endif
                            <span class="text-danger">@error('nominal') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bukti Pembayaran</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-file">
                                    <input wire:model="proof_of_payment" type="file" class="form-control" >
                                    <span class="text-danger">@error('proof_of_payment') {{ $message }} @enderror</span>
                                </div>
                            <span class="badge badge-warning" wire:loading wire:target="proof_of_payment">Uploading...</span>
                            </div>
                        </div>

                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Catatan</label>
                            <div class="col-sm-12 col-md-7">
                            <textarea wire:model="description" class="form-control"></textarea>
                            <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="mb-4 form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary"
                                wire:click='confirmSavePayment()'>Konfirmasi Pembayaran</button> <span class="badge badge-warning" wire:loading>Loading...</span>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endif
          @endif

          </div>
        </div>
      </section>
</div>
