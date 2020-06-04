<?php

namespace Easyunit\Components\Validate\Library;

class IDMustBeN1 extends BaseValidate
{
    protected $rule = [
        'id'    => 'require|number|N1'
    ];

    protected $message = [
        'id.require'    => 'ID必须填写',
        'id.number'     => 'ID必须是数字',
    ];
}
