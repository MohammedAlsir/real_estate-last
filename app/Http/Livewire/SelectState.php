<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\City;

class SelectState extends Component
{
    public $all_states;
    public $selectedState = null;
    public $cities = [];
    public $selectedCity = null;

    public $showStateModal = false;
    public $newStateName = '';

    public $showCityModal = false;
    public $newCityName = '';

    public function mount()
    {
        $this->all_states = State::all();
    }

    public function updatedSelectedState($value)
    {
        if ($value == 'add_state') {
            $this->showStateModal = true;
            $this->selectedState = null;
        } else {
            $this->cities = City::where('state_id', $value)->get();
            $this->selectedCity = null;
        }
    }

    public function updatedSelectedCity($value)
    {
        if ($value == 'add_city') {
            $this->showCityModal = true;
            $this->selectedCity = null;
        }
    }

    public function saveState()
    {
        $this->validate([
            'newStateName' => 'required|string|max:255',
        ]);

        $state = State::create(['name' => $this->newStateName]);

        $this->all_states = State::all();
        $this->selectedState = $state->id;
        $this->showStateModal = false;
        $this->newStateName = '';

        // تحديث قائمة المدن
        $this->cities = [];
    }

    public function saveCity()
    {
        $this->validate([
            'newCityName' => 'required|string|max:255',
            'selectedState' => 'required',
        ]);

        $city = City::create([
            'name' => $this->newCityName,
            'state_id' => $this->selectedState,
        ]);

        $this->cities = City::where('state_id', $this->selectedState)->get();
        $this->selectedCity = $city->id;
        $this->showCityModal = false;
        $this->newCityName = '';
    }

    public function render()
    {
        return view('livewire.select-state');
    }
}
