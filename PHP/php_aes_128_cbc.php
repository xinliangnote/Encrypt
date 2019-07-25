<?php

/**
 * Class Aes 对称加密
 * version : (PHP 5 >= 5.3.0, PHP 7)
 */
class Aes
{
    /**
     * var string $method 加解密方法
     */
    protected $method;

    /**
     * var string $secret_key 加解密的密钥
     */
    protected $secret_key;

    /**
     * var string $iv 加解密的向量
     */
    protected $iv;

    /**
     * var int $options
     */
    protected $options;

    /**
     * 构造函数
     * @param string $key     密钥
     * @param string $method  加密方式
     * @param string $iv      向量
     * @param int    $options
     */
    public function __construct($key = '', $method = 'AES-128-CBC', $iv = '', $options = OPENSSL_RAW_DATA)
    {
        $this->secret_key = isset($key) ? $key : 'CWq3g0hgl7Ao2OKI';
        $this->method = in_array($method, openssl_get_cipher_methods()) ? $method : 'AES-128-CBC';
        $this->iv = $this->secret_key;
        $this->options = in_array($options, [OPENSSL_RAW_DATA, OPENSSL_ZERO_PADDING]) ? $options : OPENSSL_RAW_DATA;
    }

    /**
     * 加密
     * @param string $data 加密的数据
     * @return string
     */
    public function encrypt($data = '')
    {
        return base64_encode(openssl_encrypt($data, $this->method, $this->secret_key, $this->options, $this->iv));
    }

    /**
     * 解密
     * @param string $data 解密的数据
     * @return string
     */
    public function decrypt($data = '')
    {
        return openssl_decrypt(base64_decode($data), $this->method, $this->secret_key, $this->options, $this->iv);
    }
}

$data = "锄禾日当午";
$aes = new Aes('HFu8Z5SjAT7CudQc');

$encrypted = $aes->encrypt($data);
$decrypted = $aes->decrypt($encrypted);

echo "加密前：".$data;
echo "<br>";
echo "加密后：".$encrypted;
echo "<br>";
echo "解密后：".$decrypted;