<?php

namespace App\Http\Livewire\Admin\Teacher;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;

class TeacherList extends Component
{


    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [], $bulkDelIds = [], $selectAll = false;
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];
    public $searchName, $searchEmail, $searchPhone, $searchStatus = -1, $perPage = 5;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];




    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];

        $this->searchStatus = (request('status') != null) ? (request('status') == 'active' ? 1 : 0) : -1;
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $teacherQuery = User::query();
        if ($this->searchName)
            $teacherQuery->WhereRaw(
                "concat(first_name,' ', last_name) like '%" . trim($this->searchName) . "%' "
            );
        if ($this->searchEmail)
            $teacherQuery->where('email', 'like', '%' . trim($this->searchEmail) . '%');
        if ($this->searchPhone)
            $teacherQuery->where('phone', 'like', '%' . trim($this->searchPhone) . '%');
        if ($this->searchStatus >= 0)
            $teacherQuery->where('active', $this->searchStatus);

        return view('livewire.admin.teacher.teacher-list', [
            'teachers' => $teacherQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->role('TEACHER')
                ->paginate($this->perPage)
        ]);
    }

    public function deleteConfirm($id)
    {
        User::destroy($id);
        $this->showModal('success', 'Success', 'Teacher has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this user!", 'Yes, delete!',
         'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function updatedSelectAll($value)
    {
        if ($value) {

            $this->bulkDelIds = User::role('TEACHER')->pluck('id');
        } else {
            $this->bulkDelIds = [];
        }
    }

    public function selectVal()
    {
        $this->selectAll = false;
    }

    public function bulkDeleteAttempt()
    {
        $this->showConfirmation(
            "warning",
            'Are you sure?',
            "You won't be able to recover this data !",
            'Yes, delete!',
            'deleteSelected',
            []
        ); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteSelected()
    {
        User::query()->whereIn('id', $this->bulkDelIds)->delete();
        $this->bulkDelIds = [];
        $this->selectAll = false;
        $this->showModal('success', 'Success', 'Teachers have been deleted successfully');
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation(
            "warning",
            'Are you sure?',
            "Do you want to change this status?",
            'Yes, Change!',
            'changeStatus',
            ['id' => $id]
        ); //($type,$title,$text,$confirmText,$method)
    }
}
