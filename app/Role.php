<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property User[] $users
 */
class Role extends Model
{
    /**
     * Administrator role
     * @var string
     */
    const ROLE_ADMIN = "admin";

    /**
     * Moderator role
     * @var string
     */
    const ROLE_MODERATOR = "moderator";

    /**
     * User role
     * @var string
     */
    const ROLE_USER = "user";

    /**
     * @var array
     */
    protected $fillable = ['code', 'name', 'role_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
