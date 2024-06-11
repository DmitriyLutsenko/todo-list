@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="bg-body-tertiary p-5 rounded">
      <div class="col-sm-8 py-5 mx-auto">
        <h1 class="display-5 fw-normal">Об авторе</h1>
        <p class="fs-5">
            <a href="https://github.com/DmitriyLutsenko">Луценко Дмитрий</a>
        </p>
        <p>Проект выполнен на Laravel 9.52 на PHPv8 в рамках тестового задания для Frame Work Team<p>
        <p>Используется css-фреймворк bootstrap v5.</p>
        <p>Приложение "To-Do" реализует следующий функционал:</p>
        <ul>
            <li>Авторизация и регистрация пользователей</li>
            <li>Просмотр всех задач пользователей в гостевом режиме.</li>
            <li>Просмотр профилей пользователей с их задачами в авторизованном режиме</li>
            <li>CRUD для задач и лейблов(статусов) для авторизованных пользователей</li>
        </ul>
    
        <p>Потенциал развития приложения при текущей архитектуре:</p>
        <ul>
            <li>Система может быть легко расширена до доски с задачами по типу "bitrix24";</li>
        </ul>

    </div>
    </div>
  </div>
@endsection
