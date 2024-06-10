@extends('layouts.app')

@section('content')
<section class="container">
        <div class="mb-3 text-center border-bottom">
            <h1 class="display-4 fw-bold">Пользователи сайта</h1>
        </div>
    @if($users !== null)

    <div class="container-fluid">
        <div class="row">
        @foreach($users as $user)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="card-text">Дата регистрации: {{ $user->created_at }}</p>
                        <a href="{{route('user.profile', ['id' => $user->id])}}">
                            Перейти на профиль
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{ $users->links() }}
    </div>
    @else
        Пользователей пока нет
    @endif
</section>
@endsection
