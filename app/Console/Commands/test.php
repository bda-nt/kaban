<?php

namespace App\Console\Commands;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNjg1NzA5ODYxLCJpYXQiOjE2ODU3MDk1NjEsImp0aSI6IjVkYTA5NTUyZDk2MjQwYTU5ZGE3MzAyNzEyNDU2NmI0IiwidXNlcl9pZCI6MSwiZW1haWwiOiJxd2VydHlAbGlzdC5ydSJ9.PLVSF6Kn5s6Zs5c9NzKu-CVcTjawbqOe8pcV9icRNko';

        $key = 'django-insecure-2pe!rbo3ybj%@k=8dbfzk&-c#)hfjm-4_ztyv6-w3ngg%oavj8';

        JWT::$leeway = 10000000000;
        $decoded = (array) JWT::decode($jwt, new Key($key, 'HS256'));
        print_r($decoded);

        $encoded = JWT::encode($decoded, $key, 'HS256', null, null);

        echo "\n";
        print_r($encoded);
        echo "\n";
        print_r(($encoded === $jwt) ? 'True' : 'False');
        echo "\n";
        print_r(JWT::decode($encoded, new Key($key, 'HS256')));
    }
}
