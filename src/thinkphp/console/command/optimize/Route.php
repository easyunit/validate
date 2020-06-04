<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
namespace thinkphp\console\command\optimize;

use thinkphp\console\Command;
use thinkphp\console\Input;
use thinkphp\console\input\Argument;
use thinkphp\console\Output;
use thinkphp\event\RouteLoaded;

class Route extends Command
{
    protected function configure()
    {
        $this->setName('optimize:route')
            ->addArgument('dir', Argument::OPTIONAL, 'dir name .')
            ->setDescription('Build app route cache.');
    }

    protected function execute(Input $input, Output $output)
    {
        $dir = $input->getArgument('dir') ?: '';

        $path = $this->app->getRootPath() . 'runtime' . DIRECTORY_SEPARATOR . ($dir ? $dir . DIRECTORY_SEPARATOR : '');

        $filename = $path . 'route.php';
        if (is_file($filename)) {
            unlink($filename);
        }

        file_put_contents($filename, $this->buildRouteCache($dir));
        $output->writeln('<info>Succeed!</info>');
    }

    protected function buildRouteCache(string $dir = null): string
    {
        $this->app->route->clear();
        $this->app->route->lazy(false);

        // 路由检测
        $path = $this->app->getRootPath() . ($dir ? 'app' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR : '') . 'route' . DIRECTORY_SEPARATOR ;

        $files = is_dir($path) ? scandir($path) : [];

        foreach ($files as $file) {
            if (strpos($file, '.php')) {
                include $path . $file;
            }
        }

        //触发路由载入完成事件
        $this->app->event->trigger(RouteLoaded::class);

        $content = '<?php ' . PHP_EOL . 'return ';
        $content .= '\Opis\Closure\unserialize(\'' . \Opis\Closure\serialize($this->app->route->getName()) . '\');';
        return $content;
    }

}
