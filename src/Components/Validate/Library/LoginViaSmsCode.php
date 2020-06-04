<?php

namespace Easyunit\Components\Validate\Library;

class LoginViaSmsCode extends BaseValidate
{
    protected $rule = [
        'mobile'    => 'require|mobile',
        'smscode'   => 'require|length:4,6',
    ];
}
