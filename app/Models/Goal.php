<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Goal
 *
 * @property int $id
 * @property int $userId
 * @property string $description
 * @property int $priority
 * @property string $date
 * @property string $time
 * @property int $isDone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereIsDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUserId($value)
 * @mixin \Eloquent
 */
class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'priority',
        'date',
        'time',
        'userId',
        'isDone'
    ];
}
