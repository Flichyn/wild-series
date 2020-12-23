<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input): string
    {
        $slug = strtolower(trim($input));
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $slug );
        $slug = preg_replace('/\p{P}+/u', ' ', $slug);
        $slug = str_replace(' ', '-', $slug);
        $slug = preg_replace('/\-+/', '-', $slug);
        return $slug;
    }
}
