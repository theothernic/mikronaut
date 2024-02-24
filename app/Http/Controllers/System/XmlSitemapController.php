<?php
    namespace App\Http\Controllers\System;

    use App\Http\Controllers\Controller;
    use App\Models\Dtos\SitemapUrlDto;
    use App\Models\ViewModels\System\SitemapViewModel;
    use App\Services\ContentService;
    use Illuminate\Support\Carbon;

    class XmlSitemapController extends Controller
    {
        public function __invoke()
        {
            $contentUrls = $this->getContentUrls();
            $manualUrls = [
                new SitemapUrlDto([
                    'loc' => route('front'),
                    'lastmod' => Carbon::now(),
                    'changefreq' => 'always'
                ])
            ];

            $sitemap = new SitemapViewModel([
                'urls' => array_merge($manualUrls, $contentUrls)
            ]);

            return response()
                ->view('system.xml-sitemap',compact('sitemap'))
                ->header('Content-type', 'text-xml');
        }

        public function getContentUrls(): array
        {
            $result = [];
            $data = (new ContentService())->getPublicContent();

            foreach ($data as $record)
                $result[] = new SitemapUrlDto([
                    'loc' => route('content.single', $record->id),
                    'lastmod' => $record->updated_at,
                    'changefreq' => 'never',
                ]);


            return $result;
        }
    }
