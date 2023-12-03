<?php

namespace App\Http\Livewire\Admin\Notice;

use App\Helpers\ImageHelper;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Notice;
use Livewire\WithFileUploads;

class NoticeCreateEdit extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $title, $type, $notice_file_path, $notice, $model_id;
    public $isEdit = false, $typeList = [];
    public $model_image, $imgId, $model_documents;

    protected $listeners = ['refreshComponents' => '$refresh'];

    public function mount($notice = null)
    {
        if ($notice) {
            $this->notice = $notice;
            $this->fill($this->notice);
            $this->isEdit = true;
        } else {
            $this->notice = new Notice;
        }

        $this->typeList = [
            ['value' => "", 'text' => "Choose Type"],
            ['value' => "Class Notice", 'text' => "Class Notice"],
            ['value' => "School Notice", 'text' => "School Notice"]
        ];
    }


    public function validationRuleForSave(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'notice_file_path' => ['required', 'max:255'],
        ];
    }
    public function validationRuleForUpdate(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'notice_file_path' => ['required', 'max:255']
        ];
    }



    public function saveOrUpdate()
    {
        $this->notice->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();


        //   dd($this->notice);

        // if ($this->notice_file_path) {
        //    $imgpath = ImageHelper::saveImage($this->notice_file_path,"NoticeFile");
        //    dd($imgpath);
        // }
        // dd($this->notice_file_path);
        // if ($this->photo) {
        //     if ($this->imgId) {
        //         // delete previous image in the database
        //         $item = Media::find($this->imgId);
        //         $item->delete();

        //         // Insert new image in the database
        //         $this->user->addMedia($this->photo->getRealPath())
        //             ->usingName($this->photo->getClientOriginalName())
        //             ->toMediaCollection('images');
        //     } else {
        //         $this->user->addMedia($this->photo->getRealPath())
        //             ->usingName($this->photo->getClientOriginalName())
        //             ->toMediaCollection('images');
        //     }
        // }


        $msgAction = 'Notice was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('notice.index');
    }





    public function render()
    {
        return view('livewire.admin.notice.notice-create-edit');
    }
}
