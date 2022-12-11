<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Option_group;
use Livewire\WithPagination;

class OptionGroup extends Component
{
    public $flag = 0;
    public $searchTerm;
    public $pazeSize;
    public $orderBy;
    public $sortBy;
    public $ids;
    public $export;
    use WithPagination;
    public function render()
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Option_group::select(
            'option_groups.*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('option_groups.option_group_name', 'LIKE', $searchTerm);
            });
        }
        // Sort By
        if (($this->orderBy != null) && ($this->sortBy != null)) {
            $query->orderBy("option_groups." . $this->orderBy, $this->sortBy);
        } elseif (($this->orderBy != null) && ($this->sortBy == null)) {
            $query->orderBy("option_groups." . $this->orderBy, "DESC");
        } elseif (($this->orderBy == null) && ($this->sortBy != null)) {
            $query->orderBy("option_groups.id", $this->sortBy);
        } else {
            $query->orderBy("option_groups.id", "DESC");
        }

        // if ($export) {
        //     return Excel::download(new PaymentDeductionExport($query->get()), 'payment_deduction_data_' . time() . '.xlsx');
        // }

        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        } else {
            $paze_size = 7;
        }
        $option_groups = $query->paginate($paze_size);
        return view('livewire.option-group.index', [
            'columns' => Schema::getColumnListing('option_groups'),
            'option_groups' => $option_groups
        ]);
    }
    public function resetInputFields()
    {
        $this->resetErrorBag();
        $this->ids = '';
    }
}
