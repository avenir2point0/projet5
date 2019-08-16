<?php

declare(strict_types=1);

namespace App\controller;

class NotFoundController
{
    public function __invoke()
    {
        echo "Cette page n'existe pas !";
    }
}
