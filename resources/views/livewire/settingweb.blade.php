<div>
    <section class="section">
        <div class="section-header">
            <h1>Money Out</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Table Money Out</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Money Out From and Table</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>From Money Out</h4>
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
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title Short</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="sort_title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="footer_title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="logo" type="file" class="form-control">
                                        <span class="badge badge-warning" wire:loading wire:target="logo">Uploading...</span>
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Count Down</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="count_down" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Maps</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="link_maps" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">HTM</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input wire:model="htm" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary"
                                                wire:click='update()'>Update</button>
                                            <span wire:loading>Saving...</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
