<?php

namespace App\Http\Livewire\Admin\Teacherclass;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\TeacherClass;
use App\Models\User;

class TeacherclassCreateEdit extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $teacher_class, $class_id, $teacher_id, $subject_id;
    public  $class_list = [], $subject_list = [], $teacher_list = [];
    public $isEdit = false;
    public function mount($teacher_class)
    {

        if ($teacher_class) {
            $this->teacher_class = $teacher_class;
            $this->fill($this->teacher_class);
            $this->isEdit = true;
        } else {
            $this->teacher_class = new TeacherClass();
        }
        $this->class_list = StudentClass::get()->toArray();
        $this->subject_list = Subject::get()->toArray();
        $this->teacher_list = User::role('TEACHER')->get()->toArray();
    }

    public function validationRuleForSave(): array
    {
        return [
            'class_id' => ['required'],
            'teacher_id' => ['required'],
            'subject_id' => ['required']

        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'class_id' => ['required'],
            'teacher_id' => ['required'],
            'subject_id' => ['required']
        ];
    }

    public function saveOrUpdate()
    {
        $this->teacher_class->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() :
         $this->validationRuleForSave()))->save();



        $msgAction = 'Class has been ' . ($this->isEdit ? 'updated' : 'assigned') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('assign-teacher.index');
    }

    public function render()
    {
        return view('livewire.admin.teacherclass.teacherclass-create-edit');
    }
}
