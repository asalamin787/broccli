<div class="card card-mini dash-card card-1"
    style="border: none; box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em; border-radius: 15px;">
    <div class="card-body pb-2">
        <div class="row">
            <div class="col-md-4">
                <img style="border-radius: 50%" src="{{ Storage::url($list->image) }}" height="80" width="80"
                    alt="">
            </div>
            <div class="col-md-8">
                <h5 class="fs-2 fw-bold font-monospace" style="">{{ $list->name }}</h5>
                <i class="fas fa-calendar-alt"><span class="fw-normal">
                        {{ $list->created_at->format('d-M-Y') }}</span></i>
                {{-- @dd($list) --}}
            </div>
        </div>

        {{-- <i class="fas fa-wallet bg-primary text-white p-2 rounded" style="font-size: 30px"></i> --}}
    </div>
    <div class="card-body pb-2 pt-3" style="border-top: 1px solid rgb(204 201 201 / 30%);">
        <div class="d-flex justify-content-between">
            <div class="">
                @if ($list->pendingtasks_count > 0)
                    <span class="badge bg-warning  fs-6 text-light position-relative">
                        Task Pending
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $list->pendingtasks_count }}
                        </span>
                    </span>
                @else
                    <p class="badge bg-success fs-6 text-light mb-0">Task Completed
                    </p>
                    {{-- <i class="fas fa-check text-success fs-4"></i> --}}
                @endif
            </div>
            <div class="d-flex">

                <a href="{{ route('user.tasks.index', $list) }}" class="text-warning" title="Task"><i
                        class="fa fa-list fs-5"></i></a>
                <a href="{{ route('user.projects.edit', $list) }}" class="text-primary ms-2 me-2" title="Edit">
                    <i class="fa fa-edit fs-5"></i>
                </a>

                <form action="{{ route('user.projects.destroy', $list) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn text-danger h-auto p-0" title="Delete" style="border: none"
                        onclick="return confirm('Are you sure')"><i class="fa fa-trash fs-5"></i></button>
                </form>

            </div>
        </div>
    </div>
</div>
