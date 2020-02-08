# 商城系统

## 说明

- 该项目由个人业余闲暇时间开发。
- 基于PHP7+Laravel5.8开发的简易商城系统。
- 前台采用Restful Api形式进行前后分离开发。
- 后台使用Laravel-Admin插件进行开发。


## 技术栈

- 语言: PHP7.2
- 框架: Laravel5.8
- 关系型数据库: Mysql5.7
- 内存型数据库: Redis5.0+

## 目录结构

```text

├── _ide_helper.php  // 由laravel-ide-helper自动补全插件生成
├── app
│   ├── Codes   // 错误码/其他状态码定义
│   ├── Console  // 控制台命令
│   ├── Exceptions  // 异常处理
│   ├── Helpers  // 通用类函数等
│   ├── Http   // 该目录下为控制器和中间件
│   ├── Models  // 数据模型定义，仅定义模型，不进行数据操纵
│   ├── Providers  // 服务提供者
│   ├── Repositories  // 模型的数据操纵
│   ├── Requests // 表单验证
│   ├── Services  // 业务逻辑
│   └── Traits  // 统一管理代码复用
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── ide-helper.php
│   ├── jwt.php  // jwt插件生成
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── package.json
├── phpunit.xml
├── public
│   ├── css
│   ├── favicon.ico
│   ├── index.php
│   ├── js
│   ├── robots.txt
│   └── web.config
├── readme.md
├── resources
│   ├── assets
│   ├── lang
│   └── views
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
├── storage
│   ├── app
│   ├── framework
│   └── logs
├── tests
│   ├── CreatesApplication.php
│   ├── Feature
│   ├── TestCase.php
│   └── Unit
└── webpack.mix.js

```

## 其他说明

- 采用JWT和请求中间件形式进行接口认证。
- 使用阿里云OSS进行文件存储。
- app.config, database.php, auth.php均有所更改。
- Laravel Auth 的bcrypt加密方式已改为MD5加密。
- Laravel 数据库默认为一主一从的读写分离。
- Session/Cache/Queue默认驱动为Redis。
- 采用Services模式和Repository模式组织优雅的项目结构，精简控制器(仅一行代码)。
- 代码遵循MIT开源协议，可用于学习和修改进行商业使用。
