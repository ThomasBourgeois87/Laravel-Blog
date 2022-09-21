<?php

namespace App\Services;

interface Newsletter
{
    public function suscribe(string $email, string $list = null);
}