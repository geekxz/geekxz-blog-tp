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



class RoleValidate extends Validate

{

    protected $rule = [

        ['rolename', 'unique:role', '角色已经存在']

    ];



}