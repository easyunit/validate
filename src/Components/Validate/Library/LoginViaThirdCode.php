<?php

namespace Easyunit\Components\Validate\Library;

class LoginViaThirdCode extends BaseValidate
{
    protected $rule = [
        'platform'  => 'require|in:wechatmp,wechat,alipay',
        'smscode'   => 'require|length:4,6',
    ];
}
