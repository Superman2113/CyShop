<?php


namespace App\Helpers\Hashing;


use Illuminate\Contracts\Hashing\Hasher;


/**
 * 用于替换默认的Hasher
 * @package App\Helpers
 */
class MD5Hash implements Hasher
{
    public function check($value, $hashedValue, array $options = [])
    {

        return $this->make($value) === $hashedValue;
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }

    public function make($value, array $options = [])
    {
        $value = env('SALT', '').$value;

        return md5($value);
    }
}