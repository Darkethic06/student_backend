<?php

namespace App\Http\Livewire\Admin\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Http\Livewire\Traits\AlertMessage;
class SubjectList extends Component
{


    use WithPagination;
    use WithSorting;
    use AlertMessage;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public $perPage = 5,$perPageList = [];
    protected $paginationTheme = 'bootstrap';



    public function mount(){
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }

    public function deleteConfirm($id)
    {
        Subject::destroy($id);
        $this->showModal('success', 'Success', 'Subject has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this!", 'Yes, delete!',
         'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function render()
    {
        $subjectQuery = Subject::query();
        return view('livewire.admin.subject.subject-list',[
            'subjectQuery' => $subjectQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
