<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use think\Db;
use app\admin\controller\Common;
class Cate extends Common
{
    public function lst()
    {
      $cate = new CateModel();
      $cateres = $cate -> catetree();
      $this -> assign('cateres',$cateres);
      return view();
    }
    public function add()
    {
      $cate = new CateModel();
      if (request() -> isPost()) {
        $save = $cate -> save(input('post.'));
        if ($save) {
          $this -> success('添加栏目成功！','lst');
        }else{
          $thsi -> error('添加栏目失败！');
        }
      }
      $cateres = $cate -> catetree();
      $this -> assign('cateres',$cateres);
      return view();
    }
    public function del()
    {
      $id = input('id');
      $res = Db::name('cate') -> delete($id);
      if ($res) {
        $this -> success('删除栏目成功！','lst');
      }else{
        $this -> error('删除栏目失败！');
      }
    }
}
