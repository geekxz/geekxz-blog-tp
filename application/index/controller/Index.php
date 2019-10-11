<?php
/**
 * Created by 陈东东
 * Author: 陈东东  <13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/4/15
 * Time: 22:40
 */
namespace app\index\controller;
use think\Controller;
class Index extends Base
{
    public function _initialize()
    {
		
    }
    public function index()
    {
        $content = db('content');
        $shows['f.shows'] = 1;
        $geekxzcs = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.id,f.title,f.choice,f.time,c.id as cid,c.name')->where($shows)->order('f.id desc')->paginate(9);

		$this->assign(array('geekxzcs' => $geekxzcs));
		return geekxzc();
    }
	public function search()
    {
        $ks=input('ks');
        if (empty($ks)) {
            return $this->error('亲！你迷路了');
        } else {
			$content = db('content');
			$shows['f.shows'] = 1;
			$geekxzc = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.id,f.title,f.time,f.choice,c.id as cid,c.pic,c.name')->order('f.id desc')->where($shows)->where('f.title','like','%'.$ks.'%')->paginate(9,false,$config = ['query'=>array('ks'=>$ks)]);
			$this->assign(array('geekxzc' => $geekxzc, 'ks' => $ks));
            // echo "<pre>";
            // var_dump($geekxzc->total());die;
			return geekxzc();
		}
    }
    // 文章详情
	public function thread()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $content = db('content');
            $a = $content->where("id = $id AND shows = 1")->find();
            if ($a) {
                $content->where("id = {$id}")->setInc('view', 1);

                $geekxzd = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.*,c.id as cid,c.name')->find($id);
            

                $comment = db('comment')->where('aid',$geekxzd['id'])->paginate(20);
                $this->assign(array('geekxzd' => $geekxzd, 'comment' => $comment));
				return geekxzc();
            } else {
                return $this->error('亲！你迷路了');
            }
        }
    }
    public function view()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $category = db('category');
            $c = $category->where("id = {$id}")->find();
            if ($c) {
                $content = db('content');
                $shows['f.shows'] = 1;
                $geekxzc = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.*,c.id as cid,c.pic as cpic,c.name')->where("f.tid={$id}")->where($shows)->order('f.id desc')->paginate(9);
                $tpti = db('category')->where("id ={$id}")->find();
                // echo "<pre>";
                // var_dump($geekxzc);die;
                $this->assign(array('geekxzc' => $geekxzc, 'tpti' => $tpti));
                return geekxzc();
            } else {
                $this->error("亲！你迷路了！");
            }
        }
    }
    // 添加评论
    public function addComment(){        
        $data['comment'] = input('post.comment');
        $data['author'] = input('post.author');
        $data['email'] = input('post.email');
        $data['url'] = input('post.url');
        $data['aid'] = input('post.aid');
        $data['addtime'] = time();
        $res = db('comment')->insert($data);
        if ($res) {
            return geekxza('添加成功');
        } else {
            return geekxzb('添加失败');
        }
    }
}