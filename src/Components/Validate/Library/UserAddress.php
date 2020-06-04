<?php

namespace Easyunit\Components\Validate\Library;

class UserAddress extends BaseValidate
{
    protected $rule = [
        'name'      => 'require',
        'mobile'    => 'require',
        'province'  => 'require',
        'city'      => 'require',
        'area'      => 'require',
        'address'   => 'require',
        'street'    => 'require',
    ];

    protected $update = [
        'id'        => 'require|N1',
        'name'      => 'require',
        'mobile'    => 'require',
        'province'  => 'require',
        'city'      => 'require',
        'area'      => 'require',
        'address'   => 'require',
        'street'    => 'require',
    ];
}
