开发展示 YII2.0 扩展应用程序
===================================

为了方便更多人使用了解 YII 框架，也提供一个更大的学习平台，在接下来的时间里，我会将自己对 Yii 所掌握的知识都写在本
开源代码上. yii2.0 博客地址：http://blog.sina.com.cn/s/articlelist_2292603931_0_1.html

安装 yii2.0
-----------------------------------

>http://www.yiichina.com/download  这里的下载已经写得很详细了，按着步骤走，基本不会出现什么问题的. good luck

配置 yii2.0
-----------------------------------

* 初始化项目

```php
    php init
```

* 配置数据库部分

```php
    common/config/main-local.php

    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=yii2advanced', // host主机  dbname 数据库名称
        'username' => 'root', //管理员账号
        'password' => '123456', //管理员密码
        'charset' => 'utf8',  // 数据库字符集
    ],
```


* 配置权限(RBAC)部分

```php
    创建 `rbac` 数据库,首先需要在 `common/config/mian.php` 进行配置，配置完毕运行下方命令如下

    'authManager' => [
        'class' => 'yii\rbac\DbManager'
        'itemTable' => 'auth_item',
        'assignmentTable' => 'auth_assignment',
        'itemChildTable' => 'auth_item_child',
    ],

    运行 yii migrate --migrationPath=@yii/rbac/migrations/ 生成权限数据表

    权限模块我们取名为 `auth` 模块，在 `frontend` 目录下面
```
