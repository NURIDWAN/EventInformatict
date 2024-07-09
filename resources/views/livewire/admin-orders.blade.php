<div>
    <section class="section">
        <div class="section-header">
            <h1>Order Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Table Order Users</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Order Users Table</h2>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Users Table</h4>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Menu yang di pilih</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($orders as $order)
                                        <tr>

                                            <td>
                                               {{ $order->user->name }}
                                            </td>
                                            <td>
                                                @foreach($order->menus as $orderr)
                                                <br>
                                                <i class="p-2 m-1 badge badge-primary">{{ $orderr['name'] }} - Rp. {{ number_format($orderr['price'], 0, ',', '.') }}</i>
                                                @endforeach
                                            </td>
                                            <td>
                                                Rp. {{ number_format($order->total_price, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger" wire:click='confirmSaveOrder({{ $order->id }})'>Delate</a>
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
