<?php

/**
 * Class Rsa 对称加密
 * version : (PHP 4 >= 4.0.6, PHP 5, PHP 7)
 * 生成私钥：openssl genrsa -out private_key.pem 2048
 * 生成公钥：openssl rsa -in private_key.pem -pubout -out public_key.pem
 */
class Rsa
{
    //private static $PUBLIC_KEY  = 'public_key.pem 内容';
    //private static $PRIVATE_KEY = 'private_key.pem 内容';


    private static $PUBLIC_KEY  = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1O3p0JN0/RrP7eY3f81i
zPf16FS0WMNGCJkd+y5c6yBzUvN0IEeoxiIWIBhoMKH0pzlzBg0rfttojSodOgNo
m/UCAzAYEgdIsNee5LSN/7e0T2/QvsIAHINuA8gI8fGoGiSA2TEzpUo6aVXwhZT3
4GGRdrSJ+m4iVk/Kt95tavBNk+NDVSeb5xAjxBchT5BjAMMlE0ffGZb0MMjjO5+e
9Tn8f99M2VMqpzXHXZzv1ABmqufzS20iWcSvnjhWcJ9hiKwO8Z30GgJyACmml+HM
xLYEFN9h2MWYgxLm9Z0rLMrWwMM+E2rCs8tsxAD5sO9RZMJPl1C0FIsMR53ngqbz
owIDAQAB
-----END PUBLIC KEY-----';

    private static $PRIVATE_KEY = '-----BEGIN RSA PRIVATE KEY-----
MIIEpgIBAAKCAQEA1O3p0JN0/RrP7eY3f81izPf16FS0WMNGCJkd+y5c6yBzUvN0
IEeoxiIWIBhoMKH0pzlzBg0rfttojSodOgNom/UCAzAYEgdIsNee5LSN/7e0T2/Q
vsIAHINuA8gI8fGoGiSA2TEzpUo6aVXwhZT34GGRdrSJ+m4iVk/Kt95tavBNk+ND
VSeb5xAjxBchT5BjAMMlE0ffGZb0MMjjO5+e9Tn8f99M2VMqpzXHXZzv1ABmqufz
S20iWcSvnjhWcJ9hiKwO8Z30GgJyACmml+HMxLYEFN9h2MWYgxLm9Z0rLMrWwMM+
E2rCs8tsxAD5sO9RZMJPl1C0FIsMR53ngqbzowIDAQABAoIBAQCO1RE1ItUlO6kj
Un0ENAgEqojAUqGvsT33Yo7kAZO+/cOeb0UEqk0iq5bf7L9ncBynWDg6ZPc6X3/g
wdFdKxAvHck9zjM3VL+EMP+bNyrR0K8ZYk5Kx+Q/PEK+Mp8dfRdgggAUsZaNWB+a
rVVspiMo1wo28KBl5x8NevTnJkOLqXAyB7UyLWqnOL1fb988lZvZPR7ZUYroVIZa
pyXtZcafIJeKyQ3bvWI5+eFqOe61Z4Bx1+TpfZ3fKfSDW0vhxzNqaimOa8jSXtMJ
jMeOctL4nZ0TPo/jS3I+XlaH4ZQlFLuUWGscpxwfEeBN23I8HRLkZXJsw66yvRN3
s4bUKPXRAoGBAP/3oSZAECvfsYYzs76tnrAmR/0GxCqgguxDlWn5DowQzdWFOdHC
ZbTo/hUVoMSQnO1EKCFlnBS+wg/3TuIzUO0ewC1aeT7qHbOMDl0zKbNpS2Z9/j+U
zro+qz7XmkWolMCfmDrCrw9CtCxcMSII+ajbI8SAgFVMz9XnDt+xW9E9AoGBANT0
4F6kCUJTEyqf2+v84tjQ2wGIF6XtZPU9JR806zeMyahQ9F6z3hY8BYb0tIy5b3uJ
VlJ9TG1qg/t59TWxIq43mYSUJHe0aJi3ilooObQtHlhPu8nwmmX47sX0PyG2hMoD
kBVxTpTDmBaDz7O9uBnlMXJN5qEygctaixpEbmZfAoGBAMBA9kEMjRjnAyeRXcgy
D6aumhNqKZz6wltCx864yjxZwsBFOJBcOpgPCAg+HmqFU9jCAIJVF05dmNT1I8Ky
WG5BUoa+FaMzpOtenstRylh/Far9pyGKW1t4BpdEyRLY9CFZvbUk1OfZagqHlD/E
DgDN16eX/MwUzWYUDg/l3tjhAoGBAKGip/ZNjVWRFpggs9z/mfK1O7WC5Wgksp9N
ZLK2CN6l9p3RrFmBLk00C4HulGfHi+15RVLhFbRqx3iFje/N3iPbwaMWikNtZIKd
tN5Pb9To9gJTqpZRD+/cLOeFRrHBBjMK1z7fPKS/fN2B+JFVq7nD827t3+J0In4F
4FT0odMDAoGBAJk3ELB/FHY8xzZ4jF1wG/a1CK681Xm6SuU5KIELDSAUNoou6OPG
mS8gU20MMPAeV2z7khyDcSxlHsUyL73eLeaakbQov9NMW7cc99XX4wnP4W7FRpmr
QbHmKuHIRFHCFv+XX8c0aK2mDZMUlzJdy4FgD/YCEZ7kZMZKyvZW/ZuV
-----END RSA PRIVATE KEY-----';

    /**
     * 获取私钥
     * @return bool|resource
     */
    private static function getPrivateKey()
    {
        $privateKey = self::$PRIVATE_KEY;
        return openssl_pkey_get_private($privateKey);
    }

    /**
     * 获取公钥
     * @return bool|resource
     */
    private static function getPublicKey()
    {
        $publicKey = self::$PUBLIC_KEY;
        return openssl_pkey_get_public($publicKey);
    }

    /**
     * 私钥加密
     * @param string $data
     * @return null|string
     */
    public static function privateEncrypt($data = '')
    {
        if (!is_string($data)) {
            return null;
        }
        return openssl_private_encrypt($data,$encrypted,self::getPrivateKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * 公钥加密
     * @param string $data
     * @return null|string
     */
    public static function publicEncrypt($data = '')
    {
        if (!is_string($data)) {
            return null;
        }
        return openssl_public_encrypt($data,$encrypted,self::getPublicKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * 私钥解密
     * @param string $encrypted
     * @return null
     */
    public static function privateDecrypt($encrypted = '')
    {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted, self::getPrivateKey())) ? $decrypted : null;
    }

    /**
     * 公钥解密
     * @param string $encrypted
     * @return null
     */
    public static function publicDecrypt($encrypted = '')
    {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_public_decrypt(base64_decode($encrypted), $decrypted, self::getPublicKey())) ? $decrypted : null;
    }

    /**
     * 创建签名
     * @param string $data 数据
     * @return null|string
     */
    public function createSign($data = '')
    {
        if (!is_string($data)) {
            return null;
        }
        return openssl_sign($data, $sign, self::getPrivateKey(), OPENSSL_ALGO_SHA256) ? base64_encode($sign) : null;
    }

    /**
     * 验证签名
     * @param string $data 数据
     * @param string $sign 签名
     * @return bool
     */
    public function verifySign($data = '', $sign = '')
    {
        if (!is_string($sign) || !is_string($sign)) {
            return false;
        }
        return (bool)openssl_verify($data, base64_decode($sign), self::getPublicKey(), OPENSSL_ALGO_SHA256);
    }
}

$rsa = new Rsa();
$data = '锄禾日当午';
echo '加密数据：'.$data.'<br><br>';

$privateEncrypt = $rsa->privateEncrypt($data);
echo '私钥加密后：'.$privateEncrypt.'<br>';

$publicDecrypt = $rsa->publicDecrypt($privateEncrypt);
echo '公钥解密后：'.$publicDecrypt.'<br><br>';

$publicEncrypt = $rsa->publicEncrypt($data);
echo '公钥加密后：'.$publicEncrypt.'<br>';

$privateDecrypt = $rsa->privateDecrypt($publicEncrypt);
echo '私钥解密后：'.$privateDecrypt.'<br><br>';

$sign = $rsa->createSign($data);
echo '生成签名：'.$privateEncrypt.'<br>';

$status = $rsa->verifySign($data, $sign);
echo '验证签名：'.($status ? '成功' : '失败') ;
