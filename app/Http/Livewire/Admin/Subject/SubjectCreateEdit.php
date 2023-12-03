<?php

namespace App\Http\Livewire\Admin\Subject;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Subject;

class SubjectCreateEdit extends Component
{


    use WithFileUploads;
    use AlertMessage;
    public $subject, $title, $isEdit;

    public function mount($subject = null)
    {

        if ($subject) {
            $this->subject = $subject;
            $this->fill($this->subject);
            $this->isEdit = true;
        } else {
            $this->subject = new Subject();
        }
    }


    public function validationRuleForSave(): array
    {
        return [
            'title' => ['required', 'max:255']
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'title' => ['required', 'max:255']
        ];
    }



    public function saveOrUpdate()
    {

        // dd($this->title);
        $this->subject->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() :
         $this->validationRuleForSave()))->save();



        $msgAction = 'Subject has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('subject.index');
    }



    public function render()
    {
        return view('livewire.admin.subject.subject-create-edit');
    }
}
