<x-admin-layout title="Teacher Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="All Teacher Wise Class">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('assign-teacher.index') }}" value="All Teacher Wise Class" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                <a href="{{ route('assign-teacher.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Assign Teacher to Class
                                </a>
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.teacherclass.teacherclass-list')
</x-admin-layout>
