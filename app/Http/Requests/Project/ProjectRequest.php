<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'is_active'   => ['nullable', 'boolean'],
            'assignee_id' => ['nullable', 'exists:users,id'],
            'deadline_date'    => ['nullable', 'date', 'after:today'],
        ];
    }

    /**
     * Обработка полей перед валидацией
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }

    /**
     * Сообщения об ошибках
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required'    => 'Введите название проекта.',
            'title.max'    => 'Название должно быть меньше 256 символов.',
            'assignee_id.exists'   => 'Выбранный пользователь не существует.',
            'deadline_date.after'    => 'Дедлайн должен быть датой в будущем.',
        ];
    }
}
