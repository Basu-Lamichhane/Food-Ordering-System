<?php

namespace App\Hashing;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class CustomCBCHasher implements Hasher
{
    protected $cipher = 'AES-256-CBC';
    protected $key;
    

    public function __construct()
    {
        // Define the encryption key 
        $this->key = config('app.key');  
    }

    /**
     * 
     *
     * @param  string  $value
     * @param  array  $options
     * @return string
     */
    public function make($value, array $options = [])
    {
        $iv = random_bytes(openssl_cipher_iv_length($this->cipher));
        $encryptedValue = openssl_encrypt($value, $this->cipher, $this->key, 0, $iv);

        return base64_encode($encryptedValue . '::' . $iv); 
    }

    /**
     * 
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array  $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        $parts = explode('::', base64_decode($hashedValue), 2);
        if (count($parts) !== 2) {
            return false;
        }

        [$encryptedValue, $iv] = $parts;
        $decryptedValue = openssl_decrypt($encryptedValue, $this->cipher, $this->key, 0, $iv);

        return hash_equals($value, $decryptedValue); 
    }

    /**
     * 
     *
     * @param  string  $hashedValue
     * @param  array  $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return false; 
    }
      public function info($hashedValue)
    {
        
        return [];
    }
}
