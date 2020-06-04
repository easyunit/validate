<?php

namespace Easyunit\Components\Validate\Library;

class ShopCoupon extends BaseValidate
{
    protected $rule = [
        'name'  => 'require',
        'mobile'  => 'require',
        'name'  => 'require',
    ];
}
