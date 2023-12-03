<x-admin-layout title="Teacher Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('teachers.index') }}" value="Teacher List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('teachers.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Teacher
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
    @livewire('admin.teacher.teacher-list')
</x-admin-layout>
