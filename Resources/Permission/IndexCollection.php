<?php 

namespace HskyZhou\LaravelBackendPermission\Resources\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexCollection extends ResourceCollection
{
    public $collects = 'HskyZhou\LaravelBackendPermission\Resources\Permission\Resource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'permissions' => $this->collection,
        ];
    }
}