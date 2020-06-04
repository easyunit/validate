<?php

namespace Easyunit\Components\Validate\Library;


class PagingParameter extends BaseValidate
{
    protected $rule = [
        'page'      => 'N1',                // 请求页码
        'offset'    => 'N1',                // 偏移量
        'limit'     => 'N1|between:4,50',   // 请求数量

    ];

    protected $message = [
        'page'      => '分页参数必须是正整数',
        'offset'    => '分页参数必须是正整数',

        'limit.N1'       => '分页参数必须是正整数',
        'limit.between'  => '每页数量必须在4-50之间',
    ];
}
