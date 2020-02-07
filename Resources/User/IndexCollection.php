<?php 

namespace HskyZhou\LaravelBackendPermission\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexCollection extends ResourceCollection
{
    public $collects = 'HskyZhou\LaravelBackendPermission\Resources\User\UserResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'list' => $this->collection,
        ];
    }
}