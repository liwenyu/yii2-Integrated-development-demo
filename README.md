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

* 配置 urlManage (路由)

```php
    frontend/config/main.php

    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => true,
        'showScriptName' => false, // 需要在 web 目录下面添加 `.htaccess` 文件
        'rules' => [
            '' => 'site/index',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            '<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',
        ],
    ],

    配置完最终结果为 http://localhost/yii2-Integrated-development-demo/frontend/web/  可是不够友好，我们虚拟一个
    域名为  local.yii.com
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

    使用 gii 生成权限模块，我们取名为 `auth` 模块，在 `frontend` 目录下面

    配置所生成的 `auth` 模块可以在项目中被找到

    'modules' => [
        'auth' => [
            'class' => 'frontend\modules\auth\Module',
        ],
    ],
```
