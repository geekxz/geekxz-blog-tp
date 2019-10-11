<?php
/**
 * Created by 陈东东
 * Author: 陈东东	<13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\admin\model;
use think\Model;
class Upload extends Model
{
	
	function initialize()
	{
		parent::initialize();
	}

	public function upfile($type,$filename = 'file',$is_water = false){
		$file = request()->file($filename);
		$info = $file->move(ROOT_PATH . DS . 'uploads');
		if($info){
			$path = DS . 'uploads' . DS .$info->getSaveName();
			$path=str_replace("\\","/",$path);
			return array('code'=>200,'msg'=>'上传成功','path'=>$path,'savename'=>$info->getSaveName(),'filename'=>$info->getFilename(),'info'=>$info->getInfo());
		}else{
			return array('code'=>0,'msg'=>$file->getError());
		}
	}

}