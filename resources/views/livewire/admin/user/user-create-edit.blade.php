<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="First Name" required />
            <x-admin.input type="text" wire:model.defer="first_name" placeholder="First Name"
                class="{{ $errors->has('first_name') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="first_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Last Name" required/>
            <x-admin.input type="text" wire:model.defer="last_name" placeholder="Last Name"
                class="{{ $errors->has('last_name') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="last_name" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Student Code" required/>
            <x-admin.input type="text" wire:model.defer="student_code" placeholder="Student Code"
                class="{{ $errors->has('student_code') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="student_code" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Father's Name"/>
            <x-admin.input type="text" wire:model.defer="fathers_name" placeholder="Father's Name"
                class="{{ $errors->has('fathers_name') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="fathers_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Mother's Name"/>
            <x-admin.input type="text" wire:model.defer="mothers_name" placeholder="Mother's Name"
                class="{{ $errors->has('mothers_name') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="mothers_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Email" srequired />
            <x-admin.input type="text" wire:model.defer="email" placeholder="Email" autocomplete="off"
                class="{{ $errors->has('email') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="email" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Phone" required />
            <x-admin.input type="text" wire:model.defer="phone" placeholder="Phone" autocomplete="off"
                class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="phone" />
        </x-admin.form-group>
        @if (!$isEdit)
            <x-admin.form-group>
                <x-admin.lable value="Password" required />
                <x-admin.input type="password" wire:model.defer="password" placeholder="Password" autocomplete="off"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}" />
                <x-admin.input-error for="password" />
            </x-admin.form-group>
            <x-admin.form-group>
                <x-admin.lable value="Confirm Password" required />
                <x-admin.input type="password" wire:model.defer="password_confirmation" placeholder="Confirm Password"
                    autocomplete="off" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" />
                <x-admin.input-error for="password_confirmation" />
            </x-admin.form-group>
        @endif
        {{-- <x-admin.form-group>
            <x-admin.lable value="Status" required />
            <x-admin.dropdown wire:model.defer="active" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('active') ? 'is-invalid' : '' }}">
                @foreach ($statusList as $status)
                    <x-admin.dropdown-item :value="$status['value']" :text="$status['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group> --}}
        <x-admin.form-group class="col-lg-6">
            <x-admin.lable value="Student Photo" required />
            @if ($model_image)
                <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br />
            @endif
            <x-admin.filepond wire:model="photo" class="{{ $errors->has('photo') ? 'is-invalid' : '' }}" allowImagePreview
                imagePreviewMaxHeight="50" allowFileTypeValidation
                acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']" allowFileSizeValidation maxFileSize="4mb" />
            <x-admin.input-error for="photo" />
        </x-admin.form-group>
        {{-- <x-admin.form-group class="col-lg-12">
            <x-admin.lable value="Documents" /><br />
            @foreach ($model_documents as $documents)
                <a href="{{ $documents->getUrl() }}">{{ $documents->name }}</a>
                <button type="button" wire:click="deleteDocuments({{ $documents->id }})">&nbsp; | &nbsp;&nbsp;<i
                        class="fa fa-trash"></i>Delete</button><br />
            @endforeach
            <x-admin.filepond wire:model="photos" multiple allowImagePreview imagePreviewMaxHeight="50"
                allowFileTypeValidation acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg', 'application/pdf']"
                allowFileSizeValidation maxFileSize="4mb" />
        </x-admin.form-group> --}}
        <x-admin.form-group class="col-lg-6" wire:ignore>
            <x-admin.lable value="Address" required/>
            <textarea wire:model.defer="address" id="address"
                class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"></textarea>
        </x-admin.form-group>
        </div>
        <br />
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('users.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-admin.form-section>
