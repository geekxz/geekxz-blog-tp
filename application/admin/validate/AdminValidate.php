<?php
/**
 * Created by 陈东东
 * Author: 陈东东	<13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */

namespace app\admin\validate;



use think\Validate;



class AdminValidate extends Validate

{

    protected $rule = [

        ['username', 'require', '用户名不能为空'],

        ['password', 'require', '密码不能为空'],

        ['code', 'require', '验证码不能为空']

    ];



}