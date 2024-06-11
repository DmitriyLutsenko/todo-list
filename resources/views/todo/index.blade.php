@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="mb-3 text-center border-bottom">
            <h1 class="display-4 fw-bold">Список активных задач</h1>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true"></span>
            </button>
            {{ $message }}
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-error alert-dismissible mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true"></span>
            </button>
            {{ $message }}
        </div>
        @endif


        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                <span aria-hidden="true"></span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($tasks !== NULL)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
            @foreach($tasks as $task)
                @include('todo.components.card', ['task' => $task])
            @endforeach
        </div>
        <div class="row">
            <div class="mt-3 mb-3">
                {{ $tasks->links() }}
            </div>
        </div>
        @else
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                    Пока не было создано ни одной активной задачи! Будьте первым!
                </div>
            </div>
        @endif

        @if(count($closedTasks) > 0)
        <div class="mb-3 text-center border-bottom">
            <h1 class="display-4 fw-bold">Список закрытых задач</h1>
        </div>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
            @foreach($closedTasks as $task)
                @include('todo.components.card', ['task' => $task])
            @endforeach
        </div>
        <div class="row">
            <div class="mt-3 mb-3">
                {{ $closedTasks->links() }}
            </div>
        </div>
        @endif

    <div class="mt-3 mb-3 text-center border-bottom">
            <h3 class="display-4 fw-bold">Создайте свою задачу</h3>
    </div>
    <div class="row">
    @guest
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <p class="display-5 fw-bold">Чтобы оставить задачу, Вам необходимо зарегистрироваться</p>
            </div>
        </div>
        @else
            @include('forms.components.create')
        @endguest
    </div>
</section>
@endsection
