<?php

namespace App\Tool;

class TokenGenerator
{
    public function generateInt() 
    {
        return (string) random_int(1000000000000000, 1000000000000000000);
    }

    public function generateCsrfToken()
    {
        return (string) bin2hex(random_bytes(15));
    }
}
