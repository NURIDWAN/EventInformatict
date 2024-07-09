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
                            <h4>Payment not confirmed</h4>
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($payments as $payment)
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
                                                <i class="badge badge-warning">Pending</i>
                                                @elseif($payment->status == 'complete')
                                                <i class="badge badge-success">confirmed</i>
                                                @else
                                                <i class="badge badge-danger">Canceled</i>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{route('show-payment',$payment->code_payment) }}" class="btn btn-warning">Show</a>

                                            <button type="submit" class="btn btn-danger"
                                                wire:click='confirmDelete({{$payment->id}})'>Delete</button>
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
