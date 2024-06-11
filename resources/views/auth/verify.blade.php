@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свою электронную почту') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Мы направили Вам новую строку сброса пароля') }}
                        </div>
                    @endif

                    {{ __('Проверьте свою почту. Мы направили Вам письмо со сбросом пароля') }}
                    {{ __('Если Вы не получили ссылку сброса пароля') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Запросить новое письмо') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
