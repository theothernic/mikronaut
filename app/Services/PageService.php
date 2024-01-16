<?php
    namespace App\Services;

    use App\Models\Dtos\PageViewModel;
    use App\Models\Dtos\WebPageViewModel;
    use App\Models\Page;

    class PageService
    {

        public function getPage(?string $theme = null, ?string $key = null) : WebPageViewModel
        {
            $defaults =[
                'theme' => $theme ?? 'default',
                'key' => $key
            ];

            $data = self::getPageData($key);
            return new WebPageViewModel(array_merge_recursive($defaults, $data['page']));
        }

        public static function getPageData($key) {

            return match ($key) {
                'pages.index' => [
                    'page' => [
                        'title' => 'Welcome!'
                    ]
                ],
                'pages.about' => [
                    'page' => [
                        'title' => 'About me'
                    ]
                ],
                'pages.elsewhere' => [
                    'page' => [
                        'title' => 'the bear, elsewhere...'
                    ],
                    'links' => LinkService::getOrderedActiveLinks()
                ],
                default => [],
            };


        }
    }
