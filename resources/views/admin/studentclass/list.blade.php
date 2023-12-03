<x-admin-layout title="Class Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="All Class List">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('student-class.index') }}" value="All Class List" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                <a href="{{ route('student-class.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Add New Class
                </a>
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.studentclass.studentclass-list')
</x-admin-layout>
