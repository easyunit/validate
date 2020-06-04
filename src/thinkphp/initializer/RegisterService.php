<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace thinkphp\initializer;

use thinkphp\App;
use thinkphp\service\ModelService;
use thinkphp\service\PaginatorService;
use thinkphp\service\ValidateService;

/**
 * 注册系统服务
 */
class RegisterService
{

    protected $services = [
        PaginatorService::class,
        ValidateService::class,
        ModelService::class,
    ];

    public function init(App $app)
    {
        $file = $app->getRootPath() . 'vendor/services.php';

        $services = $this->services;

        if (is_file($file)) {
            $services = array_merge($services, include $file);
        }

        foreach ($services as $service) {
            if (class_exists($service)) {
                $app->register($service);
            }
        }
    }
}
