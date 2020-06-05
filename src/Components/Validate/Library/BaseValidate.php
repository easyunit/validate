<?php

namespace Easyunit\Components\Validate\Library;

use thinkphp\Lang;
use thinkphp\Validate;
use thinkphp\exception\ValidateException;

function json($subCode = 10000, $msg = null)
{
    header("Content-type:text/json");
    header("HTTP/1.1 400 Bad Request");
    $data['code']       = 400;
    $data['subCode']    = $subCode;
    $data['msg']        = $msg;
    $data['time']       = time();
    $data['url']        = $_SERVER['HTTP_HOST'];
    echo json_encode($data);
    exit;
}


class BaseValidate extends Validate
{
    private $params = [];

    /**
     * 构造方法
     * @param   Null|Array  $params     接收验证后参数
     * @param   String      $rule       验证规则名 || 验证场景名
     * @param   Int         $type       $rule类型:1=验证规则,0=验证场景
     */
    public function __construct(&$params = null, $rule = null, $type = 1)
    {
        $this->setLang(new Lang);
        if ($rule && $type) {
            $this->rule = $this->$rule;
            parent::__construct($this->rule);
            $this->goCheck();
        } else {
            parent::__construct();
            $this->goCheck($rule);
        }

        $params = empty($params) ? $this->params : array_merge($this->params, $params);
    }


    public function getParams()
    {
        return $this->params;
    }

    protected function goCheck($scene = null)
    {
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input)) {
            json(10000, '参数不允许为空');
        }

        $this->batch();     // 参数批量验证

        if (!empty($scene)) {
            $this->scene($scene);   // 使用指定的验证场景
        }


        try {
            // 接收原始数据流 兼容FromData和RequestPlayload
            $result = $this->check($input);
        } catch (ValidateException $e) {
            json(10004, '验证器通用异常');
        } catch (\Throwable $th) {
            json(999, '系统通用异常：' . $th->getMessage());
        }

        if (!$result) {
            $msg = is_array($this->error) ? implode(';', $this->error) : lang($this->error);
            json('10002', $msg);
        }
        $this->getDataByRule($_REQUEST, $scene);
    }

    /**
     * @param  Array $params   通常传入request.post变量数组
     * @param  Array $scene    验证场景，存在验证场景时，从验证场景中接收参数
     * @param  Array $data     公共的异常信息
     */
    protected function getDataByRule($params = null, $scene = null)
    {
        if (array_key_exists('user_id', $params) || array_key_exists('uid', $params)) {
            json('10003', '非法参数，不允许传递用户id');
        }

        $data = array();

        $rule_array = empty($scene) ? $this->rule : $this->scene[$scene];

        foreach ($rule_array as $key => $value) {
            if (isset($params[$key])) {
                $this->params[$key] = $params[$key];
            }
        }
    }

    // 正整数集合
    protected function N1($value, $rule = '', $data = '', $field = ''): bool
    {
        $this->typeMsg['N1'] =  ':attribute必须是正整数';
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // 非空
    protected function NotEmpty($value)
    {
        $this->typeMsg['NotEmpty'] =  ':attribute不能为空';
        if (empty($value)) {
            return false;
        } else {
            return true;
        }
    }

    // 银行卡格式
    protected function bankcard($bankcard)
    {
        $this->typeMsg['bankcard'] =  ':attribute银行卡格式错误';
        $format = '/^([1-9]{1})(\d{13}|\d{14}|\d{15}|\d{16}|\d{17}|\d{18})$/';
        $result = preg_match($format, $bankcard);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
