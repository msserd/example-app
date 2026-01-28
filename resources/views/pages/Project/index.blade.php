<h1>Список проектов</h1>
<a href="{{ route('projects.create', ['access' => 'yes']) }}">Добавить проект</a>
<ul>
    @foreach($projects as $project)
        <li>
            <div>ID: {{ $project['id'] }}</div>
            <div>Название: {{ $project['title'] }}</div>
            <div>ID владельца: {{ $project['onwer_id'] }}</div>
            <div>Активность: {{ $project['is_active'] ? 'Активен' : 'Неактивен' }}</div>
            <div>Создан: {{ $project['created_at'] }}</div>
            <div>ID ответственного: {{ $project['assignee_id'] }}</div>
            <div>Дедлайн: {{ $project['deadline_date'] }}</div>
            <a href="{{ route('projects.show', ['project' => $project['id'], 'access' => 'yes']) }}">Просмотр</a>
            <a href="{{ route('projects.edit', ['project' => $project['id'], 'access' => 'yes']) }}">Редактировать</a>
        </li>
    @endforeach
</ul>