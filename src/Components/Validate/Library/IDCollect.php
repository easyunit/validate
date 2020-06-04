<?php

namespace Easyunit\Components\Validate\Library;

class IDCollect extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids必须是以","分隔的正整数'
    ];

    protected function checkIDs($value)
    {
        $ids_array = explode(',', $value);
        if (empty($ids_array)) {
            return false;
        }
        foreach ($ids_array as $id) {
            if (!$this->N1($id)) {
                return false;
            }
        }
        return true;
    }
}
