<?php 

namespace HskyZhou\LaravelBackendPermission\Resources\Role;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexCollection extends ResourceCollection
{
    public $collects = 'HskyZhou\LaravelBackendPermission\Resources\Role\RoleResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'roles' => $this->collection,
        ];
    }
}