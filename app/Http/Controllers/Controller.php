<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function site(string $key = ''): ?string
    {
        $ctx = (new SettingService())->withContext('site');
        return $ctx->filter(function ($item) use ($key) {
            return $item->key === $key;
        })->first()->value ?? null;
    }
}
