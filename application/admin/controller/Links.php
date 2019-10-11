<?php
/**
 * Created by 陈东东
 * Author: 陈东东  <13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/6/9
 * Time: 14:34
 */
namespace app\admin\controller;
use app\admin\model\Links as LinksModel;
class Links extends Base
{
    public function index()
    {
        $links = new LinksModel();
        $geekxzc = $links->order('id desc')->paginate(15);
        $this->assign('geekxzc', $geekxzc);
        return geekxzc();
    }
    public function add()
    {
        $links = new LinksModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            if ($links->add($data)) {
                echo geekxz_success('您好，添加成功！','/admin/links/index');
            } else {
                echo geekxz_error('您好，添加失败！');
            }
        }
        return geekxzc();
    }
    // 修改友链
    public function edit()
    {
        $links = new LinksModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($links->edit($data)) {
                echo geekxz_success('您好，修改成功！','/admin/links/index');
            } else {
                echo geekxz_error('您好，修改失败！');
            }
        }
        $geekxzc = $links->find(input('id'));
        $this->assign('geekxzc', $geekxzc);
        return geekxzc();
    }
    // 删除友链
    public function dels()
    {
        $links = new LinksModel();
        if ($links->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    // 修改显示状态
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('links')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('links')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('links')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function uploadImg(){

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');  
         // dump($file);die;
        $info = $file->move(ROOT_PATH . 'uploads/links');
        if(!$info) {// 上传错误提示错误信息  
            $this->error($upload->getError());            
        }else{// 上传成功 获取上传文件信息  
            $data['path'] =  '/uploads/links/'.$info->getSaveName();

            return $data['path'];
        }  
    }
}