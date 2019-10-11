<?php
/**
 * Created by 陈东东
 * Author: 陈东东	<13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\admin\controller;
use app\admin\model\Content as ContentModel;
class Comment extends Base
{
   public function index()
    {
        $geekxzc = db('Comment')->alias('c')->join('content a', 'a.id=c.aid')->field('c.*,a.title')->paginate(10);
       
        $this->assign('geekxzc', $geekxzc);
        // var_dump($geekxzc);die;
        return geekxzc();
    }

      
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('Comment')->field('status')->where('id', $change)->find();
            $shows = $shows['status'];
            if ($shows == 1) {
                db('Comment')->where('id', $change)->update(['status' => 0]);
                echo 1;
            } else {
                db('Comment')->where('id', $change)->update(['status' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }

    

   
    
    // 删除操作
    public function dels()
    {
        $dels = db('Comment')->delete(input('id'));
        if ($dels) {
            return geekxza('删除成功');
        } else {
            return geekxzb('删除失败');
        }
    } 


}