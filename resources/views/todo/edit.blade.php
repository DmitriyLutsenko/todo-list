@extends('layouts.app')
@section('content') 

<section class="container">

    <h1 class="my-0 fw-normal text-center"> Редактирование задачи #{{$task->id}} </h1>

    <form method="POST" action="{{ route('task.update') }}">
        {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label">Заголовок задачи</label>
            <input type="hidden" value="{{$task->id}}" name="task_id">
            <input type="text" name="title" class="form-control" value="{{ $task->title }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание задачи</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ $task->description }}</textarea>
        </div>

        @if($labels !== null)
        <div class="mb-3">
            <select class="form-select" name="label" aria-label="Выберите статус задачи">
                @foreach($labels as $label)
                    <option value="{{$label->id}}" style="background-color:{{$label->bcolor}};color:{{$label->tcolor}};">{{$label->title}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Сохранить задачу</button>
    </form>
</section>

<section class="container">

    <h2 class="my-0 fw-normal text-center"> Создать новый статус</h2>

    <form method="POST" action="{{route('label.create')}}">
        @csrf
        <div class="row g-3">
            <div class="col-auto">
                <label class="form-label">Заголовок статуса</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="col-auto">
                <label for="bcolor" class="form-label">Цвет фона статуса</label>
                <input type="color" name="bcolor" class="form-control form-control-color" id="bcolor" value="#563d7c" title="Выберите цвет фона у статуса">
            </div>

            <div class="col-auto">
                <label for="tcolor" class="form-label">Цвет текста статуса</label>
                <input type="color" name="tcolor" class="form-control form-control-color" id="bcolor" value="#563d7c" title="Выберите цвет текста у статуса">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Создать новый статус</button>
            </div>
        </div>
    </form>
</section>
@endsection
