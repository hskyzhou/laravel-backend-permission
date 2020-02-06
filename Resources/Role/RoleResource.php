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
        return $this->getResourceDatas('laravel-backend-permission.role.fields');
    }
}