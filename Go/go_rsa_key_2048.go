package main

import (
	"crypto/rand"
	"crypto/rsa"
	"crypto/x509"
	"encoding/base64"
	"encoding/pem"
	"fmt"
	"os"
)

// 公钥加密
func RsaEncrypt(encryptStr string, path string) (string, error) {
	// 打开文件
	file, err := os.Open(path)
	if err != nil {
		return "", err
	}
	defer file.Close()

	// 读取文件内容
	info, _ := file.Stat()
	buf := make([]byte,info.Size())
	file.Read(buf)

	// pem 解码
	block, _ := pem.Decode(buf)

	// x509 解码
	publicKeyInterface, err := x509.ParsePKIXPublicKey(block.Bytes)
	if err != nil {
		return "", err
	}

	// 类型断言
	publicKey := publicKeyInterface.(*rsa.PublicKey)

	//对明文进行加密
	encryptedStr, err := rsa.EncryptPKCS1v15(rand.Reader, publicKey, []byte(encryptStr))
	if err != nil {
		return "", err
	}

	//返回密文
	return base64.StdEncoding.EncodeToString(encryptedStr), nil
}

// 私钥解密
func RsaDecrypt(decryptStr string, path string) (string, error) {
	// 打开文件
	file, err := os.Open(path)
	if err != nil {
		return "", err
	}
	defer file.Close()

	// 获取文件内容
	info, _ := file.Stat()
	buf := make([]byte,info.Size())
	file.Read(buf)

	// pem 解码
	block, _ := pem.Decode(buf)

	// X509 解码
	privateKey, err := x509.ParsePKCS1PrivateKey(block.Bytes)
	if err != nil {
		return "", err
	}
	decryptBytes, err := base64.StdEncoding.DecodeString(decryptStr)

	//对密文进行解密
	decrypted, _ := rsa.DecryptPKCS1v15(rand.Reader,privateKey,decryptBytes)

	//返回明文
	return string(decrypted), nil
}

func main() {
	str := "锄禾日当午"
	fmt.Println("加密前：", str)

	encrypted, err := RsaEncrypt(str,"public.pem")
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println("加密后：", encrypted)
	}

	decrypted, err := RsaDecrypt(encrypted, "private.pem")
	if err != nil {
		fmt.Println(err)
	} else {
		fmt.Println("解密后：", decrypted)
	}
}

//加密前： 锄禾日当午
//加密后： T82O61p9OG98FTaxrNUZtfm4W6v8GFZNTUAVYIY/c7kCNAmICwraX6UPzMO35Ikc+a3ei8+ZXzmlOLmyWZ8ptT0sgdKuCpVKK9r+UtiVeDAtG6XCMibG9f7sigIG/wgdqSSC5unA9i7zzjmdkPSYJoLTbMQDTF8g4qu0lOe/brWUTSKYX4X8kQLP//n+fHg7gGbaiy9dEYMuBPBhA7B18bFqzCb+t60J+yJjIiOerf83+zY+N1uHb4Tp0MB5qnCd2dyTgJ5FeJip8SoWcXKdDX6wSDpjyxGRcvFj1cwtW58FDk+52H0sOOx3cgdMDUKWs13yeFECrwnGE/GY8Fw2lw==
//解密后： 锄禾日当午