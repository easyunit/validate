<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);
namespace thinkphp\exception;

use Psr\Cache\InvalidArgumentException as Psr6CacheInvalidArgumentInterface;
use Psr\SimpleCache\InvalidArgumentException as SimpleCacheInvalidArgumentInterface;

/**
 * 非法数据异常
 */
class InvalidArgumentException extends \InvalidArgumentException implements Psr6CacheInvalidArgumentInterface, SimpleCacheInvalidArgumentInterface
{
}
