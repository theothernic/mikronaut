<?php
    namespace App\Helpers;

    use App\Services\SettingService;

    class SettingHelper
    {
        public static function contextSettingValue(string $ctxKey, string $key)
        {
            $ctx = (new SettingService())->withContext($ctxKey);
            return $ctx->filter(function ($item) use ($key) {
                return $item->key === $key;
            })->first()->value ?? null;
        }

        public static function siteSetting(string $key)
        {
            return self::contextSettingValue('site', $key);
        }
    }
