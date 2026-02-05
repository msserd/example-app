<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'owner_id', 
        'is_active', 
        'assignee_id', 
        'deadline_date', 
    ];

    /**
     * Владелец проекта
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Ответственный за проект
     * 
     * @return BelongsTo
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Scope для фильтрации проектов с истекшим дедлайном.
     * 
     * @param Builder $query
     * 
     * @return Builder
     */
    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('deadline_date', '<', Carbon::today()->toDateString());
    }
}