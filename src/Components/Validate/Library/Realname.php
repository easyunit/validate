<?php

namespace Easyunit\Components\Validate\Library;

class Realname extends BaseValidate
{
    protected $rule = [
        'realname'  => 'require',
        'mobile'    => 'require',
        'idcard'    => 'idcard',
        'name'      => 'require',
    ];
}
