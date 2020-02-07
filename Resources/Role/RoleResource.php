<?php 

namespace HskyZhou\LaravelBackendPermission\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;
use HskyZhou\LaravelBackendPermission\Traits\ResourceTrait;

class RoleResource extends JsonResource 
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
        $permissions = $this->permissions->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'show_name' => $item->name
            ];
        });
        $data = $this->getResourceDatas('laravel-backend-permission.role.fields');

        return array_merge($data, [
            'permissions' => $permissions
        ]);

    }
}