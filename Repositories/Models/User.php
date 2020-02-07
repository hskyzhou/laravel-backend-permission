<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User.
 *
 * @package namespace App\Repositories\Models;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;
    use HasRoles;
    use SoftDeletes;
    
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

    protected $appends = ['status', 'status_label'];

    /**
     * 获取
     * @return [type] [description]
     */
    public function getStatusLabelAttribute()
    {
        return $this->status == '1' ? '启用' : '禁用';
    }

    /**
     * 获取
     * @return [type] [description]
     */
    public function getStatusAttribute()
    {
        return is_null($this->deleted_at) ? 1 : 2;
    }
}
