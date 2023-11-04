<?php

namespace App\Helpers;

class GenerateHashShare
{
    public function makeSha256(): string
    {
        return hash('sha256', uniqid(mt_rand(), true));
    }
}
