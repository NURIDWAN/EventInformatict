<section class="section">
    <div class="section-header">
      <h1>Invoice</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Invoice</div>
      </div>
    </div>

    <div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-title">
                <h2>Payment</h2>
                <div class="mt-2 invoice-number">Code Payment #{{$code_payment}}<br>
                </div>
                <div class="status">
                    @if ($payment->status == 'pending')
                        <i class="badge badge-warning">Pending</i>
                    @elseif($payment->status == 'complete')
                    <i class="badge badge-success">Complete</i>
                    @else
                    <i class="badge badge-danger">Canceled</i>
                    @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <strong>Nama User : {{$payment->user->name}}</strong><br>
                    <strong>Nama Rekening / E-Wallet : {{$payment->account_name}}</strong><br>
                    <strong>Nomber Rekening / E-Wallet : {{$payment->account_number}}</strong><br>
                    <strong>Nominal : {{$payment->account_number}}</strong><br>
                    <strong>Dibuat : {{$payment->created_at}}</strong><br>
                </div>
                <div class="col-md-6 text-md-right">
                    <strong class="text-md-left">Bukti Pembayaran</strong><br>
                  <img class="m-1 mt-2 " width="200px" src="{{ Storage::url($payment->proof_of_payment)}}" alt="">
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4 row">
            <div class="col-md-12">
              <div class="section-title">Menu yang dipilih</div>

              <div class="table">
                <div class="table">
                    <table class="table text-center table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($menus) --}}
                            @foreach($menus as $menu)
                            <tr>
                                <td>
                                    {{ $menu['name'] }}
                                </td>
                                <td>Rp. {{ number_format($menu['price'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </div>
              <div class="mt-4 row">
                <div class="text-right col-lg-12">
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Total</div>
                      <div class="invoice-detail-value invoice-detail-value-lg">Rp. {{ number_format($total_price, 0, ',', '.') }}</div>
                    </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
        @hasrole('Admin|UserAdmin')
          <div class="mb-3 float-lg-left mb-lg-0">
            @if ($payment->status == 'pending')
            <button wire:click="confirmPayment({{$payment->id}})" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i>Confirm Payment</button>
            <button wire:click="canceledPayment({{$payment->id}})" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>Cancel Payment</a>
            @endif
          </div>
        @endhasrole
        @if ($payment->status == 'complete')
        <a href="{{route('generate.invoice.user', $code_payment)}}" class="btn btn-primary btn-icon icon-left"><i class="fas fa-download"></i>Download Invoice</a>
        @endif
        </div>
      </div>
    </div>
  </section>
