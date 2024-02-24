<?php
    namespace App\Http\Controllers\Feeds;

    use App\Helpers\RssFeedBuilder;
    use App\Helpers\SettingHelper;
    use App\Http\Controllers\Controller;
    use App\Models\Dtos\Feeds\RssFeedChannelDto;
    use App\Models\Dtos\Feeds\RssFeedDto;
    use App\Models\Dtos\Feeds\RssFeedItemDto;
    use App\Services\ContentService;
    use League\Uri\Uri;
    use Illuminate\Support\Collection;

    class RssFeedController extends Controller
    {
        public function __invoke()
        {

            $content = (new ContentService())->getPublicContent();
            $feedData = $this->buildFeedDto($content);

            $rss = (new RssFeedBuilder())->build($feedData);

            return response($rss->saveXML())
                ->header('Content-type', 'text/xml');
        }

        private function buildFeedDto(Collection $content): RssFeedDto
        {
            $contentItems = collect();

            foreach ($content as $c)
                $contentItems->push($c->asDto());


            return new RssFeedDto([
                'items' => $contentItems,
                'channel' => new RssFeedChannelDto([
                    'title' => config('app.name'),
                    'link' => Uri::new(route('front')),
                    'description' => SettingHelper::siteSetting('description'),
                    'language' => app()->getLocale(),
                    'pubDate' => (new \DateTime())->format(\DateTime::RFC2822)
                ])
            ]);
        }

    }

