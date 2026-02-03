@props([
    'project_id' => '', 
])

<form style="display:inline-block;" action="{{ route('projects.destroy', ['project' => $project_id, 'access' => 'yes']) }}" method="POST" onsubmit="return confirm('Подтвердите удаление проекта');">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Удалить">
</form>