<h1>Проект {{ $project->title }}</h1>

<div>ID: {{ $project->id }}</div>
<div>Название: {{ $project->title }}</div>
{{-- В идеале нужно выодить имя, но т.к. в тестовых данных его нет, то тут просто пример получения данных через отношения --}}
<div>ID владельца: {{ $project->owner->id }}</div>
<div>Активность: {{ $project->is_active ? 'Активен' : 'Неактивен' }}</div>
<div>Создан: {{ $project->created_at }}</div>
{{-- В идеале нужно выодить имя, но т.к. в тестовых данных его нет, то тут просто пример получения данных через отношения --}}
<div>ID ответственного: {{ $project->assignee->id }}</div>
<div>Дедлайн: {{ $project->deadline_date }}</div>
<a href="{{ route('projects.index', ['access' => 'yes']) }}">Вернуться к списку</a>
<a href="{{ route('projects.edit', ['project' => $project->id, 'access' => 'yes']) }}">Редактировать</a>