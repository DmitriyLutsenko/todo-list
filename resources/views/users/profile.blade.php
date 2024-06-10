@extends('layouts.app')

@section('content')
<section class="container">
        <div class="mb-3 text-center border-bottom">
            <h1 class="display-4 fw-bold">Список задач пользователя {{ $userInfo->name }}</h1>
        </div>
    @if($userTasks !== null)
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 g-3">
        @foreach($userTasks as $task)
            @include('todo.components.simpleCard', [ 'task' => $task ])
        @endforeach
    </div>
    <div class="row">
        <div class="mt-3 mb-3">
            {{ $userTasks->links() }}
        </div>
    </div>
    @else
        Пользователь пока не создал ни одной задачи
    @endif
</section>
@endsection
