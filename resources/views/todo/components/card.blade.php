<div class="col">
    <div class="card">
        <div class="card-body">
            <div class="row pt-1 align-items-start">
            @if($task->is_active == '1')
                @if(count($task->label) > 0)
                    @foreach($task->label as $label)
                    <div class="col">
                        <strong class="d-inline-block text-start mb-1 p-1" 
                            style="background:{{$label->bcolor}};color:{{$label->tcolor}}">
                            {{ $label->title}}
                        </strong>
                    </div>
                    @endforeach
                @else
                <div class="col">
                    <strong class="d-inline-block text-start mb-1 p-1" 
                        style="background:#89e690;color:#ffffff">
                        Новая задача
                    </strong>
                </div>
                @endif
            @else
                <div class="col">
                    <strong class="d-inline-block text-start mb-1 p-1" 
                        style="background:#ff3a3a;color:#ffffff">
                        Задача закрыта
                    </strong>
                </div>
            @endif
                <div class="col">
                    <div class="mb-1 text-end text-muted">{{ $task->created_at}}</div>
                </div>
            </div>
            <h2 class="card-title text-center fw-bold">
                {{ $task->title }}
            </h2>

            @if($task->description !== null)
                <div class="card-text">
                    {!! $task->description !!}
                </div>
            @endif

            <div class="row pt-2 align-items-end">
                <div class="col">
                    <a href="{{ route ('task.show', [ 'id' => $task->id ])}}" class="btn btn-primary">Перейти</a>
                </div>
                <div class="col">
                    <div class="text-end text-muted">
                        <a href="{{ route('user.profile', ['user_id' => $task->user->id ])}}">
                            {{$task->user->name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
