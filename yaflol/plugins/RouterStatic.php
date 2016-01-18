<?php
namespace yol\plugins;
use Yaf;
/**
 * 静态路由bug修复
 * 静态路由两段的话会导致解析不准确，所以拼成三段就不会了。
   eg: admin/login => m=admin c=login a=index
 * User: zhouwenlong
 * Date: 2016/1/11
 */
class RouterStatic extends Yaf\Plugin_Abstract {

    public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
    }

    public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response) {
        $uri = $request->getRequestUri();
		if(substr_count($uri, '/') == 2) {
            $request->setRequestUri($uri . '/index');
        }
    }

}
