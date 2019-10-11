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
class Article extends Base
{
   public function index()
    {
        $content = new ContentModel();
        $ks = input('ks');
        $geekxzc = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.*,c.id as cid,c.name')->order('f.id desc')->where('title', 'like', '%' . $ks . '%')->paginate(15, false, $config = ['query' => array('ks' => $ks)]);
        $this->assign('geekxzc', $geekxzc);
        // var_dump($geekxzc);die;
        return geekxzc();
    }

    public function changechoice()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $choice = db('content')->field('choice')->where('id', $change)->find();
            $choice = $choice['choice'];
            if ($choice == 1) {
                db('content')->where('id', $change)->update(['choice' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['choice' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changesettop()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $settop = db('content')->field('settop')->where('id', $change)->find();
            $settop = $settop['settop'];
            if ($settop == 1) {
                db('content')->where('id', $change)->update(['settop' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['settop' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('content')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('content')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }

    public function edit()
    {
        $content = new ContentModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['content'] = $_POST['content'];
            // $data['keywords'] = $_POST['keywords'];
            // var_dump($data['keywords']);die;
            if ($content->edit($data)) {
                echo geekxz_success('您好，修改成功！','/admin/Article/index');
            } else {
                echo geekxz_error('您好，修改失败！');
            }
        }
        $category = db('category');
        $geekxzc = $content->find(input('id'));
        $geekxzcs = $category->select();
        // var_dump($geekxzcs);die;
        $tags = config('web.WEB_TAG');
        $tagss = explode(',', $tags);
        $this->assign(array('geekxzc' => $geekxzc, 'geekxzcs' => $geekxzcs, 'tagss' => $tagss));
        return geekxzc();
    }

    public function add()
    {
        $content = new ContentModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            $data['view'] = 1;
            $data['uid'] = 1;
            // $data['content'] = remove_xss(input('content'));
            $data['content'] = $_POST['content'];
            if ($content->add($data)) {
                echo geekxz_success('您好，添加成功！','/admin/Article/index');
            } else {
                echo geekxz_error('您好，添加失败！');
            }
        }
        $category = db('category');
        $geekxzc = $category->select();
        $tags = config('web.WEB_TAG');
        $tagss = explode(',', $tags);
        $this->assign(array('geekxzc' => $geekxzc, 'tagss' => $tagss));
        return geekxzc();
    }
    public function uploadImg(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');  
         // dump($file);die;
        $info = $file->move(ROOT_PATH . DS . 'uploads/article');
        if(!$info) {// 上传错误提示错误信息  
            $this->error($upload->getError());            
        }else{// 上传成功 获取上传文件信息  
            $data['path'] =  '/uploads/article/'.$info->getSaveName();

            return $data['path'];
        }  
    }
    // 删除操作
    public function dels()
    {
        $content = new ContentModel();
        if ($content->destroy(input('post.id'))) {
            return geekxza('删除成功');
        } else {
            return geekxzb('删除失败');
        }
    } 


}