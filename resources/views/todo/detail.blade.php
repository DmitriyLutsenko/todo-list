@extends('layouts.app')
@section('content') 
<section class="container">
<div class="row row-cols-1 mb-3">
      <div class="col">
        <div class="card mb-12 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h1 class="my-0 fw-normal text-center">Задача # {{$task->id}} </h1>
            <h2 class="my-0 fw-bold">{{$task->title}}</h2>
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
                    <div class="mb-1 text-end text-muted">вторник, 11 июня 2024 09:33</div>
                </div>
            </div>
          </div>
          <div class="card-body">
            {!! $task->description !!}
          </div>
            @auth <!-- Только аутентифицированные пользователи могут редактировать и удалять -->
                @if (auth()->id() == $task->user_id) <!-- …причем, только свои посты блога -->
                    <div class="card-footer">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form method="POST" action="{{route('task.changeActive', [ 'id' => $task->id ])}}">
                                @csrf
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                @if($task->is_active == '1')
                                    <button type="submit" class="btn btn-success me-md-2" type="button">Закрыть</button>
                                @else
                                    <button type="submit" class="btn btn-success me-md-2" type="button">Открыть</button>
                                @endif
                            </form>

                            <a class="btn btn-warning" href="{{ route('task.edit', [ 'id' => $task->id ]) }}">Изменить</a>
        
                            <form method="POST" action="{{route('task.delete', [ 'id' => $task->id ])}}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <button type="submit" class="btn btn-danger me-md-2" type="button">Удалить</button>
                            </form>

                        </div>
                    </div>
                @endif
            @endauth
        </div>
      </div>
    </div>
</section>
@endsection
