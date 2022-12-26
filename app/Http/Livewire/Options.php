<?php

namespace App\Http\Livewire;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OptionExport;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Options extends Component
{
    public $tableName='options';
    public $flag = 0;

    public $searchTerm;
    public $status;
    public $pazeSize;
    public $orderBy;
    public $sortBy;
    /*field name*/
    public $ids;
    public $option_group_name;

    public $export;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedsearchMonth()
    {
        $this->resetPage();
    }
    public function updatedsearchYear()
    {
        $this->resetPage();
    }
    public function updatedorderBy()
    {
        $this->resetPage();
    }
    public function updatedsortBy()
    {
        $this->resetPage();
    }
    public function updatedpazeSize()
    {
        $this->resetPage();
    }
    public function render($export = null)
    {

        $searchTerm = '%' . $this->searchTerm . '%';
        $query = Option::select(
            '*'
        );

        if ($searchTerm != null) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('option_group_name', 'LIKE', $searchTerm);
                $query->orWhere('option_value', 'LIKE', $searchTerm);
                $query->orWhere('option_value2', 'LIKE', $searchTerm);
                $query->orWhere('option_value3', 'LIKE', $searchTerm);
            });
        }
        // Sort By
        if (($this->orderBy != null) && ($this->sortBy != null)) {
            $query->orderBy($this->orderBy, $this->sortBy);
        } elseif (($this->orderBy != null) && ($this->sortBy == null)) {
            $query->orderBy($this->orderBy, "DESC");
        } elseif (($this->orderBy == null) && ($this->sortBy != null)) {
            $query->orderBy("id", $this->sortBy);
        } else {
            $query->orderBy("id", "DESC");
        }

        if ($export == 'excelExport') {
            return Excel::download(new OptionExport($query->get()), 'option_data_' . time() . '.xlsx');
        }
        // if($export=='pdfExport'){
        //     # Generate PDF  
        //     $data['option'] = $query->get();          
        //     $pdf = PDF::loadView('livewire.option-group.table',$data);
        //     $pdf->set_paper('letter', 'landscape');
        //     return $pdf->download('option-groups-' . time() . '.pdf');
        // }

        if ($this->pazeSize != null) {
            $paze_size = $this->pazeSize;
        } else {
            $paze_size = 7;
        }
        $options = $query->paginate($paze_size);
        return view('livewire.option.index', [
            'columns' => Schema::getColumnListing($this->tableName),
            'option_groups' => DB::table('option_groups')->select('*')->where('status',1)->get(),
            'options' => $options
        ]);
    }
    public function store()
    {

        # Validate form data
        $validator = $this->validate([
            'option_group_name' => 'required|unique:option,option_group_name|min:3|max:100'
        ]);
        try {
            # Save form data
            $this->flag = 1;
            $optionGroup = new Option();
            $optionGroup->option_group_name = $this->option_group_name;
            $optionGroup->created_by = Auth::user()->id;
            $optionGroup->save();

            if ($optionGroup->id) {

                # Reset form
                $this->resetInputFields();
                $this->emit('added', 'inserted');
            }
        } catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
        }

        $this->flag = 0;
    }
    public function edit($id)
    {
        $this->resetInputFields();
        $id = Crypt::decryptString($id);
        $data = Option::find($id);
        $this->ids = $data->id;
        $this->option_group_name = $data->option_group_name;
    }
    public function update()
    {
        # Validate form data
        $validator = $this->validate([
            'option_group_name' => 'min:3|max:100|required|unique:option,option_group_name,'.$this->ids,
        ]);
        try {
            $this->flag = 1;
            $data = Option::find($this->ids);
            $data->update([
                'option_group_name' => $this->option_group_name,
                'updated_by' => Auth::user()->id
            ]);
            # reset form
            $this->resetInputFields();
            $this->emit('success', 'updated');
        } catch (\Exception $e) {
            $this->emit('error', $e->getMessage());
        }

        $this->flag = 0;
    }
    public function destroy($id){
        $id = Crypt::decryptString($id);
        Option::where('id',$id)->delete();
        $this->emit('success','deleted');
    }
    public function resetInputFields()
    {
        $this->resetErrorBag();
        $this->ids = '';
        $this->option_group_name = '';
    }
}
