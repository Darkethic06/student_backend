<x-admin.table>
    <x-slot name="search">
    </x-slot>
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Class
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
            aria-sort="ascending" aria-label="Agent: activate to sort column descending">Section
        </th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>



    </x-slot>

    <x-slot name="tbody">
        @forelse($studentclass as $item)
            <tr role="row" class="odd">

                <td><a class="kt-link">{{ $item->title }}</a></td>
                <td><a class="kt-link">{{ $item->section }}</a></td>


                <x-admin.td-action>
                    {{-- <a class="dropdown-item" href="{{ route('student-class.edit', ['stclass' => $item->id]) }}"><i
                        class="la la-edit"></i> Edit</a> --}}
                    <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $item->id }})"><i
                            class="fa fa-trash"></i> Delete</button>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="align-center">No records available</td>
            </tr>
        @endforelse


    </x-slot>
    <x-slot name="pagination">
        {{ $studentclass->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $studentclass->firstitem() ?? 0 }} to {{ $studentclass->lastitem() ?? 0 }} of {{ $studentclass->total() }} entries
    </x-slot>
</x-admin.table>
