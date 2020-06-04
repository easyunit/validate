<?php

require __DIR__ . '/../vendor/autoload.php';

use Easyunit\Validate;

// 验证类直接测试
// new Easyunit\Components\Validate\Library\IDMustBeN1($param);

// Facade统一入口测试
// 静态调用测试
// $param = Validate::PagingParameter();    // 调用已经注册的类
$param = Validate::IDMustBeN1();    // 调用已经注册的类

// $param = Validate::IDCollect();     // 调用未注册的类   会自动注册
// $param = Validate::IDCollect1();    // 调用不存在的类


// // 动态调用测试
// $vali = new Validate();
// $param = $vali->IDMustBeN1();
// $param = $vali->IDCollect();
// $param = $vali->IDCollect1();


// 此时你可以处理你的业务逻辑了
var_dump($param);
exit;
