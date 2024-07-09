{{-- <div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">

        <table class="table mt-5 table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        <td>
                            <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

<div>
    <section class="section">
        <div class="section-header">
            <h1>Timeline</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Table Timeline</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Timeline From and Table</h2>
            @hasrole('Admin|SuperAdmin')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>From Timeline</h4>
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

                        {{-- <form>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" wire:model="email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password" wire:model="password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" wire:model="role_name">
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button wire:click.prevent="store()" class="btn btn-success">Save</button>
                        </form> --}}
                        <form>
                            <div class="card-body">
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Time
                                        Start</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Time
                                        End</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" wire:model="email">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password" wire:model="password">
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" id="role" wire:model="role_name">
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-4 form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">


                                            @if ($updateMode == true)
                                            <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
                                            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                                            @else
                                            <button type="submit" class="btn btn-primary" wire:click='store()'>Save</button>
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
                        {{-- <div class="card-header">
                            <h4>Timeline Table</h4>
                            <div class="mr-4 card-header-form">
                                @hasrole('Admin|SuperAdmin')
                                    <a href="{{route('generate.pdf')}}" class="p-1 rounded-lg btn btn-primary">Download Timeline</a>
                                @endhasrole

                                @hasrole('User')
                                    <a href="{{route('generate.pdf.user')}}" class="p-1 rounded-lg btn btn-primary">Download Timeline</a>
                                @endhasrole
                            </div>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" wire:model.live='search' class="form-control"
                                            placeholder="Search">
                                    </div>
                                </form>
                            </div>
                        </div> --}}
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
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>

                                            @hasrole('admin|SuperAdmin')
                                            <th>Action</th>
                                            @endhasrole
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="p-0 text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                            class="custom-control-input" id="checkbox-1"
                                                            name="">
                                                        <label for="checkbox-1"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                                <td>
                                                    <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                                                    <button wire:click="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                                                </td>
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
