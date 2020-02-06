<?php 

namespace HskyZhou\LaravelBackendPermission\Traits;

Trait RepositoryTrait
{
    /**
     * 搜索字段
     * @param  [type] $arr [description]
     * @return [type]      [description]
     */
    public function searchByFields($arr)
    {
        if (is_array($arr) && $arr) {
            foreach ($arr as $key => $val) {
                $field = $val['field'];
                $operation = $val['operation'];
                $value = $val['value'];

                switch($operation) {
                    case 'like' :
                        $value = "%{$value}%";
                        break;
                }
                $this->model = $this->model->orWhere($field, $operation, $value);
            }
        }
        return $this;
    }
}