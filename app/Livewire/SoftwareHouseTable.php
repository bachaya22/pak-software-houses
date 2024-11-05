<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SoftwareHouse;

class SoftwareHouseTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $softwareHouses = SoftwareHouse::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('location', 'like', '%' . $this->search . '%')
            ->orWhere('person', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.software-house-table', [
            'softwareHouses' => $softwareHouses,


                    
        ]);
    }
}
