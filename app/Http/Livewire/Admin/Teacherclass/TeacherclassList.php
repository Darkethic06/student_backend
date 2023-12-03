<?php

namespace App\Http\Livewire\Admin\Teacherclass;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\TeacherClass;

class TeacherclassList extends Component
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
        TeacherClass::destroy($id);
        $this->showModal('success', 'Success', 'The Item has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this!", 'Yes, delete!',
         'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }


    public function render()
    {
        $teacherQuery = TeacherClass::query()->with('class','subject','teacher');

        return view('livewire.admin.teacherclass.teacherclass-list',[
            'teacherQuery' => $teacherQuery
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage)
        ]);
    }
}
