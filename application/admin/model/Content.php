<?php
/**
 * Created by 陈东东
 * Author: 陈东东  <13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\admin\model;

use think\Model;
class Content extends Model
{
   
    function add($data){
		$result = $this->isUpdate(false)->allowField(true)->save($data);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	function edit($data)
    {
        $result = $this->isUpdate(true)->allowField(true)->save($data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function batches($act, $params)
    {
        if ($act == 'delete') {
            $result = $this->destroy($params);
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}