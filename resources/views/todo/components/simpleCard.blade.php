<div class="col">
    <div class="card" style="max-width: 20rem;">
        <div class="card-header">
            Задача #{{ $task->id }}
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $task->title }}</h3>
            <div class="card-text">
                {!! $task->description !!}
            </div>
        </div>
        <div class="card-footer">
            <div class="row pt-2 align-items-end">
                <div class="col">
                    <a href="{{ route ('task.show', [ 'id' => $task->id ])}}" class="btn btn-primary">
                        Перейти
                    </a>
                </div>
                <div class="col">
                    <div class="mb-1 text-end text-muted">{{ $task->created_at}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
