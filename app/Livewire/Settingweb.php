<?php

namespace App\Livewire;

use App\Models\Settingweb as ModelsSettingweb;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;


class Settingweb extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $title;
    public $sort_title;
    public $footer_title;
    public $logo;
    public $count_down;
    public $link_maps;
    public $htm;

    public $setting;
    public function mount(){
        $setting = ModelsSettingweb::find(1);
        $this->title = $setting->title;
        $this->sort_title = $setting->sort_title;
        $this->footer_title = $setting->footer_title;
        $this->logo = $setting->logo;
        $this->count_down = $setting->count_down;
        $this->link_maps = $setting->link_maps;
        $this->htm = $setting->htm;

    }

    public function update() {
        $rules = [
            'title' => 'required',
            'sort_title' => 'required',
            'footer_title' => 'required',
            'logo' => 'required|image|max:10000|min:10',
            'count_down' => 'required',
            'link_maps' => 'required',
            'htm' => 'required',
        ];
            $this->validate($rules);

            $data  = ModelsSettingweb::find(1);
            $data->update([
                'title' => $this->title,
                'sort_title' => $this->sort_title,
                'footer_title' => $this->footer_title,
                'logo' => $this->logo->store('public/logos'),
                'count_down' => $this->count_down,
                'link_maps' => $this->link_maps,
                'htm' => $this->htm,
            ]);

            return $this->alert('success', 'Update Success!', [
                'position' => 'center',
                'timer' => 12000,
                'toast' => true,
            ]);


    }

    public function render()
    {
        return view('livewire.settingweb');
    }
}