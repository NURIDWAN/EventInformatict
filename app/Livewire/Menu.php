<?php

namespace App\Livewire;

use App\Models\Menu as MenuModel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Menu extends Component
{
    use LivewireAlert;

    public $search;
    public $button = 'save';
    public $updateData = false;
    public $menu_id;
    public $modalDelete = false;


    public $name;
    public $price;

    protected $listeners = [
        'delete'
    ];

    public function AddUpdate($id) {
        $data = MenuModel::find($id);


        $this->name = $data->name;
        $this->price = $data->price;
        $this->updateData = true;
        $this->button = 'Update';

        $this->menu_id = $id;

    }
    public function update() {
        $rules = [

            'name' => 'required',
            'price' => 'required',
        ];
        $this->button = 'Loading ...';
        try {
            $validate = $this->validate($rules);
            $data  = MenuModel::find($this->menu_id);
            $data->update($validate);

            $this->menu_id = '';


            $this->name = '';
            $this->price = '';
            $this->updateData = false;
            $this->button = 'Save';

            return $this->alert('success', 'Update Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        } catch (\Exception $e) {
            $this->button = 'Update';

            return $this->alert('warning', 'Update Error!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function CancelUpdate() {
        $this->updateData = false;
        $this->button = 'Save';
        $this->menu_id = '';

        $this->name = '';
        $this->price = '';

    }
    public function store(){
        $rules = [

            'name' => 'required',
            'price' => 'required',
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);
            MenuModel::create($validate);


            $this->name = '';
            $this->price = '';
            $this->button = 'Save';

            return $this->alert('success', 'Save Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        
    }

    public function confirmDelete($id)
    {
        $this->menu_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        $timeline = MenuModel::findOrFail($this->menu_id);
        $timeline->delete();

        $this->menu_id = '';

        $this->alert('success', 'timeline deleted successfully!');
    }
    public function render()
    {

        return view('livewire.menu', [
            'menus' =>  $this->search === null ? MenuModel::latest()->get() : MenuModel::where('name', 'like', '%' . $this->search . '%')->latest()->get(),
        ]);
    }
}