<h1>Добавить проект</h1>
<form method="POST" action="{{ route('projects.store', ['access' => 'yes']) }}">
    @csrf
    <div>
        <div>Название</div>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <div style="color: red; font-size: 10px;">{{ $message }}</div> @enderror
    </div>
    <div>
        <div>Активность</div>
        <input type="checkbox" name="is_active" @checked(old('is_active'))>
        @error('is_active') <div style="color: red; font-size: 10px;">{{ $message }}</div> @enderror
    </div>
    <div>
        <div>Владелец</div>
        <select name="owner_id">
            <option value="">Выберите пользователя</option>
            @if ($users->isNotEmpty())
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('owner_id') == $user->id)>{{ $user->username }}</option>
                @endforeach
            @endif
        </select>
        @error('owner_id') <div style="color: red; font-size: 10px;">{{ $message }}</div> @enderror
    </div>
    <div>
        <div>Ответственный</div>
        <select name="assignee_id">
            <option value="">Выберите пользователя</option>
            @if ($users->isNotEmpty())
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('assignee_id') == $user->id)>{{ $user->username }}</option>
                @endforeach
            @endif
        </select>
        @error('assignee_id') <div style="color: red; font-size: 10px;">{{ $message }}</div> @enderror
    </div>
    <div>
        <div>Дедлайн</div>
        <input type="date" name="deadline_date" value="{{ old('deadline_date') }}" />
        @error('deadline_date') <div style="color: red; font-size: 10px;">{{ $message }}</div> @enderror
    </div>
    <button type="submit">Сохранить</button>
</form>
<a href="{{ route('projects.index', ['access' => 'yes']) }}">Отмена</a>