<?php

namespace App\Livewire;

use App\Models\Announcementfrontend as ModelsAnnouncementfrontend;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Announcementfrontend extends Component
{
    use LivewireAlert;

    public $search;
    public $button = 'save';
    public $updateData = false;
    public $notif_id;
    public $modalDelete = false;

    public $name;
    public $description;

    protected $listeners = [
        'delete'
    ];

    public function AddUpdate($id) {
        $data = ModelsAnnouncementfrontend::find($id);



        $this->description = $data->description;
        $this->name = $data->name;

        $this->updateData = true;
        $this->button = 'Update';

        $this->notif_id = $id;

    }
    public function update() {
        $rules = [
            'name' => 'required'
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);

            $data  = ModelsAnnouncementfrontend::find($this->notif_id);

            $data->update($validate);

            $this->notif_id = '';



            $this->description = '';
            $this->name = '';
            $this->updateData = false;
            $this->button = 'Save';

            return $this->alert('success', 'Update Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

            $this->button = 'Update';

            return $this->alert('warning', 'Update Error!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

    }

    public function CancelUpdate() {
        $this->updateData = false;
        $this->button = 'Save';
        $this->notif_id = '';


        $this->description = '';

    }
    public function store(){
        $rules = [

            'name' => 'required',
        ];

        $this->button = 'Loading ...';

            $this->validate($rules);
            ModelsAnnouncementfrontend::create([

                'name' => $this->name,
                'description' => $this->description,
            ]);



            $this->description = '';
            $this->name = '';

            $this->button = 'Save';

            return $this->alert('success', 'Save Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

            $this->button = 'Save';

            return $this->alert('warning', 'Save Error!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

    }

    public function confirmDelete($id)
    {
        $this->notif_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        $timeline = ModelsAnnouncementfrontend::findOrFail($this->notif_id);
        $timeline->delete();

        $this->notif_id = '';

        $this->alert('success', 'timeline deleted successfully!');
    }
    public function render()
    {
        return view('livewire.announcementfrontend', [
            'moneyouts' =>  $this->search === null ? ModelsAnnouncementfrontend::latest()->get() : ModelsAnnouncementfrontend::where('nominal', 'like', '%' . $this->search . '%')->latest()->get(),

        ]);
    }
}