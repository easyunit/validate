## 友情感谢 排名不分先后
- 感谢thinkphp开源框架
- 感谢慕课网七月老师

## 错误码说明

| 错误码 | 说明                           |
| ------ | ------------------------------ |
| 10001  | 参数不允许空                   |
| 10002  | 参数验证不通过                 |
| 10003  | 服务端错误，验证器类文件不存在 |

## 常用验证类说明

- 调用示例

  - 动态调用

    ```php
    use Easyunit\Validate;
    $vali = new Validate();
    $param = $vali->IDMustBeN1();
    ```

  - 静态调用

    ```php
    use Easyunit\Validate;
    $param = Validate::IDMustBeN1(); 
    ```

  - 直接使用

    ```php
    new Easyunit\Components\Validate\Library\IDMustBeN1($param);
    ```

- 常用类文件

| 类              | 说明                             |
| --------------- | -------------------------------- |
| IDMustBeN1      | 验证ID参数必须为正整数           |
| IDCollect       | 验证ID集必须为以逗号分隔的正整数 |
| PagingParameter | 验证分页参数                     |

- Hook Test