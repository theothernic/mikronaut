<?php
    namespace App\Services;

    use App\Models\Dtos\SettingDto;
    use App\Models\Setting;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\Cache;

    class SettingService
    {
        public function withContext(string $context): Collection
        {


            return Cache::remember(
                sprintf('SETTINGS_CONTEXT_%s', strtoupper($context)),
                86400,
                function () use ($context) {
                    $result = collect();
                    $data = Setting::where('context', $context)->get();

                    if ($data)
                        foreach ($data as $r)
                            $result->push(new SettingDto($r->getAttributes()));

                    return $result;
                }

            );

        }
    }
