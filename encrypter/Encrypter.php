<?php

/**
 * Created by PhpStorm.
 * User: Hoseah Kiplang'at +254715070203
 * Date: 12/26/2019
 * Time: 12:00 PM
 */
class Encoder
{
    private $CI;

    function __construct()
    {
        $this->CI = get_instance();
    }
    /**
     * simple method to encrypt or decrypt a plain text string
     * initialization vector(IV) has to be the same when encrypting and decrypting
     *
     * @param string $action: can be 'encrypt','decrypt' or 'encode',''decode'
     * @param string $string: string to 'encrypt' or 'decrypt',or 'encode',''decode'
     * 
     *
     * @return string
     */
    function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'FAEEC39BD12B76F0208FBB2E025DDD5B';
        $secret_iv = $secret_key;
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    function encode( $data ){
        $input= rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
        return $input;
      }
      function decode( $data ){
            $output= base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
            return $output;
      }

}