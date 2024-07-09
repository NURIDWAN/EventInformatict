<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserComponent extends Component
{
    public $users, $name, $email, $password, $user_id, $role_name;
    public $updateMode = false;

    use LivewireAlert;

    protected $listeners = [
        'delete'
    ];

    public function render()
    {
        $this->users = User::with('roles')->get();
        $roles = Role::all();
        return view('livewire.user-component', ['roles' => $roles]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->user_id = '';
        $this->role_name = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_name' => 'required'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        $user->assignRole($this->role_name);

        $this->resetInputFields();

        return $this->alert('success', 'Save Success!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_name = $user->roles->pluck('name')->first();

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user_id)],
            'password' => 'sometimes',
            'role_name' => 'required'
        ]);

        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? bcrypt($this->password) : $user->password,
        ]);

        $user->syncRoles($this->role_name);

        $this->updateMode = false;

        return $this->alert('success', ' updated successfully!');
        $this->resetInputFields();
    }

    public function confirmDelete($id)
    {
        $this->user_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        User::find($this->user_id)->delete();
        return $this->alert('success', ' deleted successfully!');
    }
}