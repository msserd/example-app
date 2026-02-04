<h1>Проект {{ $project->title }}</h1>

<div>Название: {{ $project->title }}</div>

{{-- В идеале нужно выводить имя, но т.к. в тестовых данных его нет, то тут просто пример получения данных через отношения --}}
<div>Имя владельца: {{ $project->owner->username }}</div>

<div>Активность: {{ $project->is_active ? 'Активен' : 'Неактивен' }}</div>

<div>Создан: {{ $project->created_at }}</div>

{{-- В идеале нужно выводить имя, но т.к. в тестовых данных его нет, то тут просто пример получения данных через отношения --}}
@if ($project->assignee)
    <div>Имя ответственного: {{ $project->assignee->username }}</div>
@endif

@if ($project->deadline_date)
    <div>Дедлайн: {{ $project->deadline_date }}</div>
@endif

<a href="{{ route('projects.index', ['access' => 'yes']) }}">Вернуться к списку</a>

@can('edit', $project)
    <a href="{{ route('projects.edit', ['project' => $project->id, 'access' => 'yes']) }}">Редактировать</a>
@endcan

@can('delete', $project)
    <x-button-delete :project_id="$project->id" />
@endcan