<?php 

namespace HskyZhou\LaravelBackendPermission\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use HskyZhou\LaravelBackendPermission\Traits\ResourceTrait;

class UserResource extends JsonResource 
{
    use ResourceTrait;

	/**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $roles = $this->roles->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'show_name' => $item->show_name,
            ];
        });

        $permissions = $this->permissions->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'show_name' => $item->show_name,
            ];
        });

        $data = $this->getResourceDatas('laravel-backend-permission.user.fields');

        return array_merge($data, [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}