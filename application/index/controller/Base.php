<?php
/**
 * Created by 陈东东
 * Author: 陈东东	<13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    public function __construct(){
		parent::__construct();
		$tptop = db('category')->order('sort ASC')->select();
		$link = db('links')->where('shows=1')->order('id ASC')->select();
		$this->assign(array('tptop' => $tptop,'link' => $link));
    }
}