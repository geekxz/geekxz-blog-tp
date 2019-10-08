# geekxz-blog-tp
A simple and practical Blog implememted by ThinkPHP 5.0

Blog 基于thinkphp开发的一套个人简洁的社区Blog主题系统
===============

## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─admin                后台模块目录（可以更改）
│  │  ├─controller        接口版本目录
│  │  │  ├─Article.php
│  │  │  ├─Index.php
│  │  │  ├─Base.php
│  │  │  └─ ...
│  │  ├─model           模块目录
│  │  ├─view            业务展示目录
│  │  ├─validate        验证器目录
│  │  ├─common.php
│  │  ├─config.php
│  │  └─ ...
│  ├─index
│  │  ├─controller        前端模块目录
│  │  │  ├─Index.php
│  │  │  ├─Base.php
│  │  │  └─ ...
│  │  ├─model           模块目录
│  │  ├─view            业务展示目录
│  │  ├─validate        验证器目录
│  │  ├─common.php
│  │  ├─config.php
│  │  └─ ...
│  ├─extra              配置目录
│  │  ├─web.php           
│  │  ├─setting.php        
│  │  └─ ...            
│  ├─tmpl              	错误跳转模板目录
│  │  ├─dispatch_jump.tpl           
│  │  ├─      
│  │  └─ ...            
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─index.php             入口文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件
~~~


> 上面的目录结构和名称是可以改变的，这取决于你的入口文件和配置参数。

## 命名规范

遵循PSR-2命名规范和PSR-4自动加载规范，并且注意如下规范：

### 目录和文件

*   目录不强制规范，驼峰和小写+下划线模式均支持；
*   类库、函数文件统一以`.php`为后缀；
*   类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
*   类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；

### 函数和类、属性命名

*   类的命名采用驼峰法，并且首字母大写，例如 `User`、`UserType`，默认不需要添加后缀，例如`UserController`应该直接命名为`User`；
*   函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 `get_client_ip`；
*   方法的命名使用驼峰法，并且首字母小写，例如 `getUserName`；
*   属性的命名使用驼峰法，并且首字母小写，例如 `tableName`、`instance`；
*   以双下划线“__”打头的函数或方法作为魔法方法，例如 `__call` 和 `__autoload`；

### 常量和配置

*   常量以大写字母和下划线命名，例如 `APP_PATH`和 `THINK_PATH`；
*   配置参数以小写字母和下划线命名，例如 `url_route_on` 和`url_convert`；

### 数据表和字段

*   数据表和字段采用小写加下划线方式命名，并注意字段名不要以下划线开头，例如 `geekxz_user` 表和 `user_name`字段，不建议使用驼峰和中文作为数据表字段命名。

## 使用与配置

*   环境配置：Apache + PHP5.6以上 + MySQL5.5以上（推荐使用宝塔面板）

*   然后在你的域名后面输入/install进入安装界面。如：http://www.xxx.com/install

*   按照提示填写你的数据库信息就可以安装成功。

*   安装完成后，请将install安装文件删除并修改账号和密码。

*   安装完成后，后台地址http://www.xxx.com/admin文件必须重命名

*   安装详情请参考：https://www.geekxz.com/thread/21.html

## 版权信息

联系作者提供域名获取授权码，然后把授权码添加到index.php文件里面

一个一级域名或者二级域名只能算一个授权域名并且只有一个授权码(不支持泛解析或站群)，如果以后需要更换域名请联系作者重新免费获取授权码，但免费更换不能超过三次

程序做了域名授权加密处理(包含加密文件)，请放心使用

程序是永久授权的，并且包含一年的技术售后和更新服务(如果用户自行修改了程序则不包含售后和更新)

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2019-2022 by Geekxz (http://geekxz.com)

All rights reserved。

更多细节参阅 [LICENSE.txt](LICENSE.txt)
