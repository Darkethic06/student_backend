<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Notice Title" required />
            <x-admin.input type="text" wire:model.defer="title" placeholder="Notice Title"
                class="{{ $errors->has('title') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="title" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Notice Type" required />
            <x-admin.dropdown wire:model.defer="type" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('type') ? 'is-invalid' : '' }}">
                @foreach ($typeList as $type)
                    <x-admin.dropdown-item :value="$type['value']" :text="$type['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="type" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-6">
            <x-admin.lable value="Student Photo" required />
            @if ($model_image)
                <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br />
            @endif
            <x-admin.filepond wire:model="notice_file_path"
                class="{{ $errors->has('notice_file_path') ? 'is-invalid' : '' }}" allowImagePreview
                imagePreviewMaxHeight="50" allowFileTypeValidation
                acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']" allowFileSizeValidation
                maxFileSize="4mb" />
            <x-admin.input-error for="notice_file_path" />
        </x-admin.form-group>


        </div>
        <br />
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('notice.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-admin.form-section>
