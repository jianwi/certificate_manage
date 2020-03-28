# 证书管理系统 v1.0

### 项目描述

用于机构（教育机构）管理各种活动颁发的证书。

启发自 [易班证书查询系统](http://www.yiban.cn/Renzheng/showJzList#/) 

后台使用 laravel-admin 构建

前台是使用 vue 构建的SPA

[前台演示](https://zs.e23.ink)

[后台演示](https://zs.e23.ink/admin)  (后台账号密码均为admin)

## 运行环境

- Laravel 7
- Nginx 1.8+
- PHP 7.2+
- Mysql 5.7+

### 安装

#### 1. 克隆源代码

克隆源代码到本地：

    > git clone https://github.com/jianwi/certificate_manage.git

#### 2. 安装扩展包依赖

    > composer install

#### 3. 生成配置文件

    > cp .env.example .env

#### 4.自行修改 .env 文件里的配置信息

```
APP_NAME=应用名称
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=应用链接

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=数据库名称
DB_USERNAME=数据库用户
DB_PASSWORD=数据库密码
```

#### 5. 生成 appkey

```
> php artisan key:generate
```

#### 6. larave-admin 安装

```
> php artisan admin:install
```

#### 7. 数据迁移

```
> php artisan migrate
> php artisan db:seed
```

#### 8. 权限配置

```
chmod 777 -R public 
chmod 777 -R storage
```


* 首页地址：http://app_url
* 管理后台：http://app_url/admin
* 管理员账号密码均为 admin 

至此, 安装完成。

使用 MIT 协议
