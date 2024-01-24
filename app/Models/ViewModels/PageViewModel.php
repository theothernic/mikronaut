<?php
    namespace App\Models\ViewModels;

    use App\Services\SettingService;
    use Bearlovescode\Datamodels\View\PageViewModel as BasePageViewModel;
    class PageViewModel extends BasePageViewModel
    {
        public array $site = [
            'description' => ''
        ];
    }
