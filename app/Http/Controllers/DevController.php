<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }
    public function test()
    {
    }

    /**
     * Возвращает текущие настройки подключения к DummyJSON.
     *
     * @return array
     */
    public function getDummyConfig(): array
    {
        return [
            'base_url' => config('services.dummyjson.base_url'),
            'username' => config('services.dummyjson.username'),
            'password' => config('services.dummyjson.password')
        ];
    }

    /**
     * Добавление 5 случайных проектов
     * 
     * @return void
     */
    public function addProject(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            Project::create([
                'title' => $faker->sentence(3),
                'owner_id' => $faker->randomElement($users),
                'is_active' => $faker->boolean(),
                'assignee_id' => $faker->randomElement($users),
                'deadline_date' => $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            ]);
        }
    }

    /**
     * Получение проектов админов
     * 
     * @return Collection
     */
    public function getAdminProjects(): Collection
    {
        return Project::whereHas('owner', function ($query) {
            $query->where('role', 'admin');
        })
        ->with('owner')
        ->get();
    }

    /**
     * Получение проектов с истекшим дедлайном
     * 
     * @return Collection
     */
    public function getExpired(): Collection
    {
        return Project::where('deadline_date', '<', Carbon::today()->toDateString())
            ->orderBy('deadline_date', 'asc')
            ->get();
    }

    /**
     * Обновление полей одного случайного проекта на случайные данные
     * 
     * @return void
     */
    public function updateRandom(): void
    {
        $faker = Faker::create();
        $project = Project::inRandomOrder()->first();
        $users = User::pluck('id')->toArray();

        $project->update([
            'title' => $faker->sentence(3),
            'owner_id' => $faker->randomElement($users),
            'is_active' => $faker->boolean(),
            'assignee_id' => $faker->randomElement($users),
            'deadline_date' => $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
        ]);
    }

    /**
     * Получение трех последних проектов
     * 
     * @return Collection
     */
    public function getMyLatestThree(): Collection
    {
        $query = Project::query();

        if (Auth::check()) 
            $query->where('owner_id', Auth::user()->id);

        return $query->latest()->limit(3)->get();
    }

    /**
     * Получение списка пользователей и количество их проектов
     * 
     * @return Collection
     */
    public function usersProjects(): Collection
    {
        return User::select('username')
            ->withCount('ownedProjects')
            ->get();
    }

    /**
     * Получение количества проектов с истекшим дедлайном
     * 
     * @return int
     */
    public function getExpiredProjectsCount(): int
    {
        return Project::expired()->count();
    }
}
