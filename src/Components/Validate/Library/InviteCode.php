<?php

namespace Easyunit\Components\Validate\Library;

class InviteCode extends BaseValidate
{
    protected $rule = [
        'invite_code'  => 'require|min:10',
    ];
}
