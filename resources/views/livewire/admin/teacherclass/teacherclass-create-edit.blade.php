<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Select Class" required />
            {{-- <x-admin.dropdown wire:model.defer="class_id" placeHolderText="Please select one" autocomplete="off"
            class="{{ $errors->has('class_id') ? 'is-invalid' : '' }}">
            <option value="" selected disabled>Select Option</option>
                @foreach ($class_list as $data)
                    <x-admin.dropdown-item :value="$data['id']" :text="$data['title'] . '-' . $data['section']" />
                @endforeach
            </x-admin.dropdown> --}}
            <select wire:model.defer="class_id"
                class="form-control border-gray-200 {{ $errors->has('class_id') ? 'is-invalid' : '' }}">
                <option value="" selected>Select Class</option>
                @foreach ($class_list as $data)
                    <option value="{{ $data['id'] }}"> {{ $data['title'] }}</option>
                @endforeach
            </select>
            <x-admin.input-error for="class_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Select Subject" required />
            {{-- <x-admin.dropdown wire:model.defer="subject_id" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('subject_id') ? 'is-invalid' : '' }}">
                @foreach ($subject_list as $data)
                    <x-admin.dropdown-item :value="$data['id']" :text="$data['title']" />
                @endforeach
            </x-admin.dropdown> --}}
            <select wire:model.defer="subject_id"
                class="form-control border-gray-200 {{ $errors->has('subject_id') ? 'is-invalid' : '' }}">
                <option value="" selected>Select Subject</option>
                @foreach ($subject_list as $data)
                    <option value="{{ $data['id'] }}"> {{ $data['title'] }}</option>
                @endforeach
            </select>
            <x-admin.input-error for="subject_id" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Select Teacher" required />
            <x-admin.dropdown wire:model.defer="teacher_id" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('teacher_id') ? 'is-invalid' : '' }}">
                @foreach ($teacher_list as $data)
                    <x-admin.dropdown-item :value="$data['id']" :text="$data['full_name']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="teacher_id" />
        </x-admin.form-group>


        </div>



        <br />
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('assign-teacher.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-admin.form-section>
