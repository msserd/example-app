<h1>Список проектов</h1>
<a href="{{ route('projects.create', ['access' => 'yes']) }}">Добавить проект</a>
<ul>
    @foreach($projects as $project)
        <li>
            <div>
                {{ $project->title }}
                <a href="{{ route('projects.show', ['project' => $project->id, 'access' => 'yes']) }}">Просмотр</a>

                @can('edit', $project)
                    <a href="{{ route('projects.edit', ['project' => $project->id, 'access' => 'yes']) }}">Редактировать</a>
                @endcan

                @can('delete', $project)
                    <x-button-delete :project_id="$project->id" />
                @endcan
            </div>
        </li>
    @endforeach
</ul>