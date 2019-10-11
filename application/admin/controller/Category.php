<?php
/**
 * Created by 陈东东
 * Author: 陈东东	<13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\admin\controller;
use app\admin\model\Category as CategoryModel;
class Category extends Base
{
    public function index()
    {
        $category = new CategoryModel();
        $geekxzc = $category->catetree();
        $this->assign('geekxzc', $geekxzc);
        return geekxzc();
    }
    // 修改显示状态
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('category')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('category')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('category')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    // 修改测拦状态
    public function changesidebar()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $sidebar = db('category')->field('sidebar')->where('id', $change)->find();
            $sidebar = $sidebar['sidebar'];
            if ($sidebar == 1) {
                db('category')->where('id', $change)->update(['sidebar' => 0]);
                echo 1;
            } else {
                db('category')->where('id', $change)->update(['sidebar' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    // 修改分类
    public function edit()
    {
        $category = new CategoryModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($category->edit($data)) {
                echo geekxz_success('您好，修改成功！','/admin/category/index');
            } else {
                echo geekxz_error('您好，修改失败！');
            }
        }
        $geekxzc = $category->find(input('id'));
        $geekxzcs = $category->catetree();
        $this->assign(array('geekxzcs' => $geekxzcs, 'geekxzc' => $geekxzc));
        return geekxzc();
    }
    // 删除分类
    public function dels()
    {
        $dels = db('category')->delete(input('id'));
        if ($dels) {
            return geekxza('删除成功');
        } else {
            return geekxzb('删除失败');
        }
    }
    // 添加分类
    public function add()
    {
        $category = new CategoryModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            if ($category->add($data)) {
                echo geekxz_success('您好，添加成功！','/admin/category/index');
            } else {
                echo geekxz_error('您好，添加失败！');
            }
        }
        $geekxzc = $category->catetree();
        $this->assign('geekxzc', $geekxzc);
        return geekxzc();
    }
    public function uploadImg(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');  
         // dump($file);die;
        $info = $file->move(ROOT_PATH . 'uploads/category');
        if(!$info) {// 上传错误提示错误信息  
            $this->error($upload->getError());            
        }else{// 上传成功 获取上传文件信息  
            $data['path'] =  '/uploads/category/'.$info->getSaveName();

            return $data['path'];
        }  
    }


}