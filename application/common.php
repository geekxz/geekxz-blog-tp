<?php
/**
 * Created by 陈东东
 * Author: 陈东东  <13298176895@163.com>
 * 微信公号: 极客小寨工作室
 * Date: 2019/6/9
 * Time: 16:41
 */

// 应用公共文件


function geekxza($str)
{
    return json(array("code" => 200, "msg" => $str));
}
function geekxzb($str)
{
    return json(array("code" => 0, "msg" => $str));
}
function geekxzc()
{
    return view();
}


/**
 * $msg 待提示的消息
 * $url 待跳转的链接
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function geekxz_success($msg='',$url='',$time=3){ 
    $str='<script type="text/javascript" src="/public/static/admin/js/jquery-2.1.1.js"></script><script type="text/javascript" src="/public/static/admin/js/plugins/sweetalert/sweetalert.min.js"></script><link href="/public/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">';//加载jquery和layer
    $str.='<script>
        $(function(){
            swal("提示","操作成功","success");
            setTimeout(function(){
               self.parent.location.href="'.$url.'"
            },1000)
        });
    </script>';
    return $str;
}

/**
 * $msg 待提示的消息
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function geekxz_error($msg='',$url='',$time=3){ 
    $str='<script type="text/javascript" src="/public/static/admin/js/jquery-2.1.1.js"></script> <script type="text/javascript" src="/public/static/admin/js/plugins/sweetalert/sweetalert.min.js"></script><link href="/public/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">';//加载jquery和layer
    $str.='<script>
        $(function(){
            swal("提示","操作成功","success"); 
            setTimeout(function(){
                   self.parent.location.href="'.$url.'"
            },1000)
        });
    </script>';
    return $str;
}










