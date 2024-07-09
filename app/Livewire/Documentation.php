<?php

namespace App\Livewire;

use App\Models\Documentation as ModelsDocumentation;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Documentation extends Component
{
    use LivewireAlert;

    public $search;
    public $name;
    public $link_url;
    public $button = 'save';
    public $updateData = false;
    public $documenation_id;
    public $modalDelete = false;

    protected $listeners = [
        'delete'
    ];

    public function AddUpdate($id) {
        $data = ModelsDocumentation::find($id);

        $this->name = $data->name;
        $this->link_url = $data->link_url;
        $this->updateData = true;
        $this->button = 'Update';

        $this->documenation_id = $id;

    }
    public function update() {
        $rules = [
            'name' => 'required',
            'link_url' => 'required',
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);
            $data  = ModelsDocumentation::find($this->documenation_id);
            $data->update($validate);

            $this->documenation_id = '';

            $this->name = '';
            $this->link_url = '';
            $this->updateData = false;
            $this->button = 'Save';

            return $this->alert('success', 'Update Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        
    }

    public function CancelUpdate() {
        $this->updateData = false;
        $this->button = 'Save';
        $this->documenation_id = '';
        $this->name = '';
        $this->link_url = '';

    }
    public function store(){
        $rules = [
            'name' => 'required',
            'link_url' => 'required',
        ];
        $this->button = 'Loading ...';
        try {
            $validate = $this->validate($rules);
            ModelsDocumentation::create($validate);

            $this->name = '';
            $this->link_url = '';
            $this->updateData = false;
            $this->button = 'Save';

            return $this->alert('success', 'Save Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        } catch (\Exception $e) {
            $this->button = 'Save';

            return $this->alert('warning', 'Save Error!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }

    public function confirmDelete($id)
    {
        $this->documenation_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        $timeline = ModelsDocumentation::findOrFail($this->documenation_id);
        $timeline->delete();

        $this->documenation_id = '';

        $this->alert('success', 'timeline deleted successfully!');
    }

    public function render()
    {
        return view('livewire.documentation', [
            'Documentations' =>  $this->search === null ? ModelsDocumentation::latest()->get() : ModelsDocumentation::where('name', 'like', '%' . $this->search . '%')->latest()->get(),
            'link_template' => 'https://drive.google.com/drive/folders/',
        ]);
    }


}