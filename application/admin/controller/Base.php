<?php
/**
 * Created by 陈东东
 * Author: 陈东东  <13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use \think\Request;
class Base extends Controller
{
    public function _initialize()
    {
		//$request = Request::instance();
        if(empty(session('username'))){
            $this->redirect(url('admin/login/index'));
        }
		
        //检测权限
        $control = lcfirst( request()->controller() );
		
        $action = lcfirst( request()->action() );		
		
        //跳过登录系列的检测以及主页权限
        /*if(!in_array($control, ['login', 'index','uplode'])){
			
            if(!in_array($control . '/' . $action, session('action'))){
				if(session('username') != 'admin'){
					$this->error('没有权限');
				}                
            }
        }*/
		
		//dump(session('rule'));
        //获取权限菜单
        // $node = new Node();
        $this->assign([
            'username' => session('username'),
            'rolename' => session('role')
        ]);	
			
    }
    //保持状态，数据绑定
    public function BaseStatus(){
        $res = array(array('title'=>'正常','value'=>'1'),array('title'=>'禁用','value'=>'0'));
        foreach($res as $key=>$v){
            $ress[$v['value']] = $v;    
        }
        return $ress;
    }
	

    public function exportExcel($objPHPExcel)
    {   
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="package('.date('Ymd-His').').xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    }
		
}