<h1>Добавить проект</h1>
<form method="POST" action="{{ route('projects.store', ['access' => 'yes']) }}">
    @csrf
    <div>
        <div>Название</div>
        <input type="text" name="title">
    </div>
    <div>
        <div>Активность</div>
        <input type="checkbox" name="is_active">
    </div>
    <div>
        <div>Ответственный</div>
        <select name="assignee_id">
            <option value="">Выберите пользователя</option>
            <option value="1">Admin</option>
            <option value="2">User1</option>
        </select>
    </div>
    <div>
        <div>Дедлайн</div>
        <input type="date" name="deadline_date" />
    </div>
    <button type="submit">Сохранить</button>
</form>
<a href="{{ route('projects.index', ['access' => 'yes']) }}">Отмена</a>