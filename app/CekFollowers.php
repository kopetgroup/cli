<?php
namespace App;

class CekFollowers
{
    protected $redis;

    public function __construct($redis)
    {
        $this->redis = $redis;
    }

    public function main()
    {
        print_r($this->redis->keys('*'));
        echo $this->redis->hlen('following');
        echo "kopet mambu";
    }

}
