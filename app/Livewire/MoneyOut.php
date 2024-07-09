<?php

namespace App\Livewire;

use App\Models\MoneyIn;
use Livewire\Component;
use App\Models\MoneyOut as ModelModelOut;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MoneyOut extends Component
{
    use LivewireAlert;

    public $search;
    public $button = 'save';
    public $updateData = false;
    public $money_id;
    public $modalDelete = false;

    public $user_id;
    public $nominal;
    public $description;

    protected $listeners = [
        'delete'
    ];

    public function AddUpdate($id) {
        $data = ModelModelOut::find($id);


        $this->user_id = $data->user_id;
        $this->description = $data->description;
        $this->nominal = $data->nominal;

        $this->updateData = true;
        $this->button = 'Update';

        $this->money_id = $id;

    }
    public function update() {
        $rules = [
            'nominal' => 'required'
        ];
        $this->button = 'Loading ...';

            $validate = $this->validate($rules);

            $data  = ModelModelOut::find($this->money_id);

            $data->update($validate);

            $this->money_id = '';


            $this->user_id = '';
            $this->description = '';
            $this->nominal = '';
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
        $this->money_id = '';

        $this->user_id = '';
        $this->description = '';

    }
    public function store(){
        $rules = [

            'nominal' => 'required',
        ];

        $this->button = 'Loading ...';

            $this->validate($rules);
            ModelModelOut::create([
                'user_id' => Auth::id(),
                'nominal' => $this->nominal,
                'description' => $this->description,
            ]);


            $this->user_id = '';
            $this->description = '';
            $this->nominal = '';

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
        $this->money_id = $id;
        $this->alert('warning', 'Are you sure?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'onConfirmed' => 'delete'
        ]);
    }

    public function delete()
    {
        $timeline = ModelModelOut::findOrFail($this->money_id);
        $timeline->delete();

        $this->money_id = '';

        $this->alert('success', 'timeline deleted successfully!');
    }
    public function render()
    {
        return view('livewire.money-out',  [
            'moneyouts' =>  $this->search === null ? ModelModelOut::latest()->get() : ModelModelOut::where('nominal', 'like', '%' . $this->search . '%')->latest()->get(),

        ]);
    }
}