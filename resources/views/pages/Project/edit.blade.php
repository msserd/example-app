<h1>Изменение проекта {{ $project->title }}</h1>
<form method="POST" action="{{ route('projects.update', ['project' => $project->id, 'access' => 'yes']) }}">
    @csrf
    @method('put')
    <div>
        <div>Название</div>
        <input type="text" name="title" value="{{ $project->title }}">
    </div>
    <div>
        <div>Активность</div>
        <input type="checkbox" name="is_active" {{ $project->is_active ? 'checked' : ''}}>
    </div>
    <div>
        <div>Ответственный</div>
        <select name="assignee_id">
            <option value="">Выберите пользователя</option>
            <option value="1" {{ $project->assignee_id == "1" ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ $project->assignee_id == "2" ? 'selected' : '' }}>User1</option>
        </select>
    </div>
    <div>
        <div>Дедлайн</div>
        <input type="date" name="deadline_date" value="{{ $project->deadline_date }}"/>
    </div>
    <button type="submit">Сохранить</button>
</form>
<a href="{{ route('projects.show', ['project' => $project->id, 'access' => 'yes']) }}">Отмена</a>