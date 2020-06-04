<?php

namespace Easyunit\Components\Validate;

use Easyunit\Components\Validate\Library\IDMustBeN1;

function json($subCode = 20000, $msg = null)
{
    header("Content-type:text/json");
    header("HTTP/1.1 500 Server Error");
    $data['code']       = 500;
    $data['subCode']    = $subCode;
    $data['msg']        = $msg;
    $data['time']       = time();
    $data['url']        = $_SERVER['HTTP_HOST'];
    echo json_encode($data);
    exit;
}

class SimpleValidate
{
    public function IDMustBeN1()
    {
        new IDMustBeN1($param);
        return $param;
    }

    public function __call($name, $arguments)
    {
        try {
            $class = "\Easyunit\Components\Validate\Library\\" . $name;
            $vali = new $class();
            $param = $vali->getParams();
        } catch (\Throwable $th) {
            $data['subCode']    = '20001';
            $data['msg']        = '验证器不存在';
            json(20001, '验证器不存在');
        }
        return $param;
    }
}
