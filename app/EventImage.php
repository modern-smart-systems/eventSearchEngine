<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $event_id
 * @property string $path
 * @property string $title
 * @property Event $event
 */
class EventImage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['event_id', 'path', 'title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
