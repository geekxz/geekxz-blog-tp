<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$
return [
    //模板参数替换
    'view_replace_str'       => array(
        '__CSS__'    => '/public/static/admin/css',
        '__JS__'     => '/public/static/admin/js',
        '__IMG__'    => '/public/static/admin/images',
        '__URLS__'   =>'http://'.$_SERVER['HTTP_HOST'],
    
        '__HOMECSS__'     => '/public/static/home/css',
        '__HOMEJS__'      => '/public/static/home/js',
        '__HOMEIMG__'     => '/public/static/home/images',
        '__HOMEPLUGINS__' => '/public/static/home/plugins',

        '__PUBLICPLUGINS__' => '/public/static/public/plugins',
    ),
    
    'url_route_on'  =>  true,
    'url_route_must'=>  false,  
    'URL_CASE_INSENSITIVE'=>true,//url不区分大小写
    'URL_HTML_SUFFIX'=>'html|shtml|xml',//限制伪静态的后缀  
    
    'trace' => [
        'type' => 'html', // 支持 socket trace file
    ],
    'dispatch_error_tmpl' => APP_PATH . 'tmpl/dispatch_jump.tpl',
    'dispatch_success_tmpl' => APP_PATH . 'tmpl/dispatch_jump.tpl',
    //各模块公用配置
    'extra_config_list' => ['database', 'route', 'validate'],
    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,



    //临时关闭日志写入
    'log' => [
        'type' => 'test',
    ],
    'http_exception_template' => [
        404 =>  './404.html',
        500 =>  './500.html',
    ],
    'app_debug' => true,
    'default_filter' => ['strip_tags', 'htmlspecialchars'],
    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------
    'cache' => [
        // 驱动方式
        'type' => 'file',
        // 缓存保存目录
        'path' => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0
    ],
    
];
