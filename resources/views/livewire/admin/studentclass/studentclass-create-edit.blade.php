<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Class" required />
            <x-admin.input type="text" wire:model.defer="title" placeholder="Class"
                class="{{ $errors->has('title') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="title" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Section" required />
            <x-admin.input type="text" wire:model.defer="section" placeholder="Section"
                class="{{ $errors->has('section') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="section" />
        </x-admin.form-group>
        </div>



        <br />
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('student-class.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-admin.form-section>
