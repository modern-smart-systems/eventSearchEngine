<?php

namespace App;

use App\Event\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $type
 * @property int $author_id
 * @property int $status
 * @property string $name
 * @property string $description
 * @property string $country
 * @property string $city
 * @property string $address
 * @property float $lat
 * @property float $lon
 * @property string $begin_time
 * @property string $end_time
 * @property string $update_at
 * @property string $created_at
 * @property User $user
 * @property EventStatus $eventStatus
 * @property EventType $eventType
 * @property User[] $users
 * @property EventImage[] $eventImages
 */
class Event extends Model
{
    use Filterable;

    /**
     * @var array
     */
    protected $fillable = ['type', 'author_id', 'status', 'name', 'description', 'country', 'city', 'address', 'lat', 'lon', 'begin_time', 'end_time', 'update_at', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventStatus()
    {
        return $this->belongsTo('App\EventStatus', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventType()
    {
        return $this->belongsTo('App\EventType', 'type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'event_invites');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventImages()
    {
        return $this->hasMany('App\EventImage');
    }
}
