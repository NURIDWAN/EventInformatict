<div>
    <section class="section">
        <div class="section-header">
            <h1>Menu Order</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Menu Order</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Menu Order</h2>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="top" data-content="Tabel menu dan makanan">
                                Table Menu
                              </button></h4>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
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
                                            <td><button class="btn btn-primary" wire:click="toggleMenu({{ $menu['id'] }})">
                                                {{ isset($selectedMenus[$menu['id']]) ? 'Hapus' : 'Tambah' }}
                                            </button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Keranjang Menu</h4>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($selectedMenus as $menu)
                                        <tr>

                                            <td>
                                                {{ $menu['name'] }}

                                            </td>
                                            <td>Rp. {{ number_format($menu['price'], 0, ',', '.') }}</td>
                                            <td><button class="btn btn-primary" wire:click="toggleMenu({{ $menu['id'] }})">
                                                {{ isset($selectedMenus[$menu['id']]) ? 'Hapus' : 'Tambah' }}
                                            </button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="card-footer">
                                    <h4>Total Harga: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</h3>
                                    <button class="btn btn-success" wire:click="confirmSaveOrder">Simpan Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
