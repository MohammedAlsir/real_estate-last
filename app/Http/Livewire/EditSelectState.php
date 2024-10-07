<?php

namespace App\Http\Livewire;

use App\Models\Apartment;
use App\Models\City;
use App\Models\Hotel;
use App\Models\House;
use App\Models\Parcel;
use App\Models\State;
use Livewire\Component;

class EditSelectState extends Component
{
    public $city = [];
    public $selectedState = null;
    public $selectedCity = null;

    public function render()
    {
        $all_states = State::all();
        return view('livewire.edit-select-state', compact('all_states'));
    }

    public function mount($model, $item_id)
    {
        switch ($model) {
            case 'House':
                $item = House::find($item_id);
                break;
            case 'Parcel':
                $item = Parcel::find($item_id);
                break;
            case 'Apartment':
                $item = Apartment::find($item_id);
                break;
            case 'hotels':
                $item = Hotel::find($item_id);
                break;
            default:
                $item = null;
                break;
        }

        if ($item && $item->city) {
            $state_id = $item->city->state_id;
            $this->selectedCity = $item->city_id;
            $this->city = City::where('state_id', $state_id)->get();
            $this->selectedState = $state_id;
        }
    }

    public function updatedSelectedState($id)
    {
        if (!is_null($id)) {
            $this->city = City::where('state_id', $id)->get();
            $this->selectedCity = null;
        } else {
            $this->city = [];
        }
    }
}
