<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package namespace App\Repositories\Models;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;
    use HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

   	protected $dates = [
        'created_at', 'updated_at'
    ];

    protected $guard_name = 'web'; 
}
