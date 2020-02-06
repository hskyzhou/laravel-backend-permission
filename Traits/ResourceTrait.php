<?php 

namespace HskyZhou\LaravelBackendPermission\Traits;

Trait ResourceTrait
{
	/**
	 * 获取字段
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function getResourceFields($key)
    {
        $fieldsArray = config($key);
        $fields = [];

        foreach ($fieldsArray as $key => $val) {
            if ($val['resource']) {
                $fields[] = $key;
            }
        }

        return $fields;
    }

    /**
     * 获取数据
     * @return [type] [description]
     */
    public function getResourceDatas($key)
    {
    	$fields = $this->getResourceFields($key);

    	foreach ($fields as $key => $val) {
    	    $data[$val] = !is_null($this->{$val}) ? $this->{$val} : "";
    	}

    	$data['created_at'] = $this->when(in_array('created_at', $fields), !is_null($this->created_at) ? $this->created_at->toDatetimeString() : "");

    	$data['updated_at'] = $this->when(in_array('updated_at', $fields), !is_null($this->updated_at) ? $this->updated_at->toDatetimeString() : "");

    	return $data;
    }
}