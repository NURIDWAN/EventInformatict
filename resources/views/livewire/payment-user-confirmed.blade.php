<div>
    <section class="section">
        <div class="section-header">
            <h1>Payment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Table Payment</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Payment Table</h2>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment confirmed</h4>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Kode Pembayaran</th>
                                            <th>Pembayaran Atas Nama</th>
                                            <th>Nomber Pembayaran</th>
                                            <th>Konfirmasi pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($payment_confirmed as $payment)
                                        <tr>
                                            <td>
                                               {{ $payment->user->name }}
                                            </td>
                                            <td>
                                               {{ $payment->code_payment }}
                                            </td>
                                            <td>
                                               {{ $payment->account_name }}
                                            </td>
                                            <td>
                                               {{ $payment->account_number }}
                                            </td>
                                            <td>
                                                @if ($payment->status == 'pending')
                                                <i class="badge badge-warning">pending</i>
                                                @elseif($payment->status == 'complete')
                                                <i class="badge badge-success">complete</i>
                                                @elseif($payment->status == 'canceled')
                                                <i class="badge badge-danger">canceled</i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('show-payment.user',$payment->code_payment) }}" class="btn btn-warning">Show</a>
                                                @if ($payment->status == 'complete')
                                                <a href="{{route('generate.invoice.user',$payment->code_payment)}}" class="mt-1 btn btn-primary btn-icon icon-left"><i class="fas fa-download"></i>Download Invoice</a>
                                                @endif

                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
