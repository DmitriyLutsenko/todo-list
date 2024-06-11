<form class="row g-3 needs-validation" action="{{ route('task.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <label for="title" class="form-label">Заголовок задачи</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Например, разработка приложения на Laravel 9.5" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="description" class="form-label">Введите описание задачи</label>
        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
    </div>

    <div class="col-md-12">
        <button class="btn btn-primary" type="submit">Создать задачу</button>
    </div>
</form>
