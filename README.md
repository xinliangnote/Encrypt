## 项目介绍

项目地址：https://github.com/xinliangnote/Encrypt

常用 加密/解密 类库。

## 项目结构

```
├─ Encrypt
│  ├─ Go
│     ├── go_aes_128_cbc.go
│     ├── go_rsa_key_2048.go
│  ├─ PHP
│     ├── php_aes_128_cbc.php
│     ├── php_rsa_key_2048.php
│  ├─ JavaScript
│     ├── js_rsa.html
```

如果你发现本项目有内容上的错误，欢迎提交 issues 进行指正。

## RSA 公钥/私钥

- 私钥：openssl genrsa -out private_key.pem 2048
- 公钥：openssl rsa -in private_key.pem -pubout -out public_key.pem

## 源码指引

- PHP 

  - :white_check_mark: [PHP AES(AES-128-CBC)](https://github.com/xinliangnote/Encrypt/blob/master/PHP/php_aes_128_cbc.php)

  - :white_check_mark: [PHP RSA(密钥长度 2048)](https://github.com/xinliangnote/Encrypt/blob/master/PHP/php_rsa_key_2048.php)

- Go

  - :white_check_mark: [Go AES(AES-128-CBC)](https://github.com/xinliangnote/Encrypt/blob/master/Go/go_aes_128_cbc.go)

  - :white_check_mark: [Go RSA(密钥长度 2048)](https://github.com/xinliangnote/Encrypt/blob/master/Go/go_rsa_key_2048.go)

- JS

  - :white_check_mark: [JS RSA(密钥长度 2048)](https://github.com/xinliangnote/Encrypt/blob/master/JavaScript)

## 运行结果

- PHP AES(AES-128-CBC) 与 Go AES(AES-128-CBC) 互通。
- PHP RSA(密钥长度 2048) 与 JS RSA(密钥长度 2048) 与 Go RSA(密钥长度 2048) 互通。

## 学习交流

:star2: 关注微信公众号「新亮笔记」

![](https://github.com/xinliangnote/Go/blob/master/00-基础语法/images/qr.jpg)
