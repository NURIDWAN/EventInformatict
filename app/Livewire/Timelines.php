<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Timeline;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Timelines extends Component
{
    use LivewireAlert;

    public $search;
    public $start_time;
    public $end_time;
    public $name;
    public $description;
    public $button = 'save';
    public $updateData = false;
    public $timeline_id;
    public $modalDelete = false;

    protected $listeners = [
        'delete'
    ];

    public function AddUpdate($id) {
        $data = Timeline::find($id);

        $this->start_time = $data->start_time;
        $this->end_time = $data->end_time;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->updateData = true;
        $this->button = 'Update';

        $this->timeline_id = $id;

    }
    public function update() {
        $rules = [
            'start_time' => 'required',
            'end_time' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);
            $data  = Timeline::find($this->timeline_id);
            $data->update($validate);

            $this->timeline_id = '';

            $this->start_time = '';
            $this->end_time = '';
            $this->name = '';
            $this->description = '';
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
        $this->timeline_id = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->name = '';
        $this->description = '';

    }
    public function store(){
        $rules = [
            'start_time' => 'required',
            'end_time' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);
            Timeline::create($validate);

            $this->start_time = '';
            $this->end_time = '';
            $this->name = '';
            $this->description = '';
            $this->button = 'Save';

            return $this->alert('success', 'Save Success!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        
    }

    public function confirmDelete($id)
    {
        $this->timeline_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        $timeline = Timeline::findOrFail($this->timeline_id);
        $timeline->delete();

        $this->timeline_id = '';

        $this->alert('success', 'timeline deleted successfully!');
    }

    public function render()
    {
        return view('livewire.timeline', [
            'timelines' =>  $this->search === null ? Timeline::latest()->get() : Timeline::where('name', 'like', '%' . $this->search . '%')->latest()->get(),
        ]);
    }
}