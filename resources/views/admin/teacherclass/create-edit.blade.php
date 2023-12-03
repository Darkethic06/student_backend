<x-admin-layout title="Teacher Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('assign-teacher.index') }}" value="All Teacher Wise Class" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="{{ $teacher_class ? 'Edit' : 'Assign' }} Class to Teacher" />
            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.teacherclass.teacherclass-create-edit', ['teacher_class' => $teacher_class])
</x-admin-layout>
