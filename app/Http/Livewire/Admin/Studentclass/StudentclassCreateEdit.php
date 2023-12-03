<?php

namespace App\Http\Livewire\Admin\Studentclass;

use App\Models\StudentClass;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;

class StudentclassCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $studentclass, $title, $section, $isEdit;

    public function mount($studentclass = null)
    {

        if ($studentclass) {
            $this->studentclass = $studentclass;
            $this->fill($this->studentclass);
            $this->isEdit = true;
        } else {
            $this->studentclass = new StudentClass();
        }
    }


    public function validationRuleForSave(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'section' => ['required']
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'section' => ['required']
        ];
    }



    public function saveOrUpdate()
    {

        $this->studentclass->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() :
         $this->validationRuleForSave()))->save();



        $msgAction = 'Class has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('student-class.index');
    }





    public function render()
    {
        return view('livewire.admin.studentclass.studentclass-create-edit');
    }
}
