<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $status
 * @property Event[] $events
 */
class EventStatus extends Model
{
    /** Event statuses  */
    const statusPrivate = 'private';
    const statusPublic = 'public';

    /**
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'status');
    }
}
