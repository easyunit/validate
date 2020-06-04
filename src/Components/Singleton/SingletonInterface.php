<?php

namespace Easyunit\Components\Singleton;

/**
 * 单例接口
 */
interface SingletonInterface
{
	/**
	 * 获取对象实例 供【SingletonTrait】使用
	 * 备注：所有使用【SingletonTrait】的类必须实现【getObj】这个方法
	 */
	public function driver();
}
