<div>
    <section class="section">
        <div class="section-header">
            <h1>Menu</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Table Menu</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Menu From and Table</h2>
            @hasrole('Admin|SuperAdmin')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>From Menu</h4>
                        </div>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $data)
                                    <li>
                                        <div class="alert alert-danger">
                                            {{ $data }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <form>
                            <div class="card-body">

                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="price" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        @if ($updateData == false)
                                            <button type="submit" class="btn btn-primary"
                                                wire:click='store()'>{{ $button }}</button>

                                        @else
                                            <button type="submit" class="btn btn-primary"
                                                wire:click='update()'>{{ $button }}</button>

                                            <button type="submit" class="btn btn-primary"
                                                wire:click='CancelUpdate()'>Cancel Update</button>
                                        @endif
                                                <span wire:loading>Saving...</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endhasrole
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="top" data-content="Tabel menu dan makanan">
                                Menu Table
                              </button></h4>
                            <div class="mr-4 card-header-form">
                                <a href="{{route('generate.pdf')}}" class="p-1 rounded-lg btn btn-primary">Download Timeline</a>
                            </div>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" wire:model.live='search' class="form-control"
                                            placeholder="Search">
                                        </div>
                                        <span wire:loading>Loading...</span>
                                </form>
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>

                                            <th>Name</th>
                                            <th>Price</th>
                                            @hasrole('admin|SuperAdmin')
                                            <th>Action</th>
                                            @endhasrole
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($menus as $data)
                                            <tr>
                                                <td class="p-0 text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            class="custom-control-input" id="checkbox-1"
                                                            name="{{ $data->id }}">
                                                        <label for="checkbox-1"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>


                                                <td>{{ $data->name }}</td>
                                                <td>Rp. {{ number_format($data->price, 0, ',', '.') }}</td>
                                                @hasrole('admin|SuperAdmin')
                                                <td>
                                                    <a href="#" class="btn btn-warning"
                                                        wire:click='AddUpdate({{ $data->id }})'>Edit</a>
                                                    <a href="#" class="btn btn-danger"
                                                        wire:click='confirmDelete({{ $data->id }})'>Delate</a>
                                                </td>
                                                @endhasrole
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
            </div>

        </div>
    </section>
</div>
