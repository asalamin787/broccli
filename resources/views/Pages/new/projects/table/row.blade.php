<tr class="odd text-start">
    <td class="sorting_1">#{{ $list->id }}</td>
    <td class="text-start">{{ $list->name }}</td>
    <td class="text-start">
        <img src="{{ Storage::url($list->image) }}" height="40">
    </td>

    @if ($list->pendingtasks_count > 0)
        <td class="text-center"><span class="badge bg-danger fs-6 text-light">{{ $list->pendingtasks_count }}</span>
        </td>
    @else
        <td class="text-center"><span class="badge bg-success fs-6 text-light">{{ $list->pendingtasks_count }}</span>
        </td>
    @endif

    <td style="width: 100px" class="text-end">
        <a href="{{ route('user.tasks.index', $list) }}" class=" btn btn-sm btn-warning">Task </a>
        <a href="{{ route('user.projects.edit', $list) }}" class="btn btn-sm btn-primary" title="Edit">
            <i class="fa fa-edit"></i>
        </a>
        <x-actions.delete :action="route('user.tasks.destroy', $list)" />
    </td>
</tr>
