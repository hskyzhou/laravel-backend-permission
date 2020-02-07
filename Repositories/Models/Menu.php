<?php

namespace HskyZhou\LaravelBackendPermission\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Menu.
 *
 * @package namespace App\Repositories\Models;
 */
class Menu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * 获取子菜单
     * @return [type] [description]
     */
    public function sonMenus()
    {
    	return $this->belongsToMany(Menu::class, 'menu_recursives', 'menu_id', 'parent_menu_id')->orderBy('sort');
    }

    /**
     * 父级菜单
     * @return [type] [description]
     */
    public function parentMenu()
    {
        return $this->belongsToMany(Menu::class, 'menu_recursives', 'parent_menu_id', 'menu_id');
    }
}
