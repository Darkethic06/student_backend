<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Notice;

class NoticeList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;

    public $perPage = 5, $perPageList = [];
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
    }



    public function render()
    {

        $noticeQuery = Notice::query();

        return view('livewire.admin.notice.notice-list', [
            'notice' => $noticeQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }



    public function deleteAttempt($id)
    {
        // dd($id);
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Notice!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]);
    }

    public function deleteConfirm($id)
    {
        try {
            Notice::destroy($id);
            $this->showModal('success', 'Success', 'Notice has been deleted successfully');
        } catch (\Exception $e) {
            $this->showModal('error', 'Error', 'Failed to delete the notice');
        }
    }
}
