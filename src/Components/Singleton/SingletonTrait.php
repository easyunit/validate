<?php

namespace Easyunit\Components\Singleton;

/**
 * 伪单例模式
 */
trait SingletonTrait
{
    public $instance;

    /**
     * 普通调用
     */
    public function __call($name, $arguments)
    {
        if (is_null($this->instance)) {
            $this->driver();
        }
        return call_user_func_array([$this->instance, $name], $arguments);
    }

    /**
     * 单例
     */
    public static function singleton()
    {
        static $instance;
        if (is_null($instance)) {
            $instance = new static();
            // $instance = new self();
        }
        return $instance;
    }

    /**
     * 静态调用
     */
    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::singleton(), $name], $arguments);
    }
}
