<?php
    namespace App\Helpers;

    use App\Models\Dtos\Feeds\RssFeedChannelDto;
    use App\Models\Dtos\Feeds\RssFeedDto;
    use \DOMDocument, \DOMElement;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Str;

    class RssFeedBuilder
    {
        private DOMDocument $xml;

        public function __construct()
        {
            $this->xml = new DOMDocument('1.0', 'UTF-8');
            $this->xml->formatOutput = true;
        }

        public function build(RssFeedDto $dto): DOMDocument
        {
            $items = $this->buildRssFeedItems($dto->items);

            // build channel.
            $channel = $this->buildRssChannel($dto->channel, $items);

            // build rss
            $this->xml->appendChild($this->buildRssFeed($channel));

            return $this->xml;
        }

        private function buildRssFeedItems(Collection $items)
        {
            $feedItems = collect();
            foreach ($items as $item)
            {
                $contentLink = route('content.single', $item->id);
                $contentBody = strip_tags(html_entity_decode($item->body));
                $el = $this->xml->createElement('item');
                $el->appendChild($this->xml->createElement('guid', $contentLink));
                $el->appendChild($this->xml->createElement('title', $item->title ?? Str::of($contentBody)->words(15,
                '...')));
                $el->appendChild($this->xml->createElement('link', $contentLink));
                $el->appendChild($this->xml->createElement('description', $item->excerpt ?? Str::of($contentBody)->words( 75, '...')));
                $el->appendChild($this->xml->createElement('pubDate', $item->publishAt));

                $feedItems->push($el);
            }

            return $feedItems;


        }



        private function buildRssChannel(RssFeedChannelDto $dto, ?Collection $items): DOMElement|false
        {
            $channel = $this->xml->createElement('channel');

            foreach ($dto as $key => $value)
                $channel->appendChild(new DOMElement($key, $value));


            foreach ($items as $el)
                $channel->appendChild($el);

            return $channel;
        }

        private function buildRssFeed(\DOMElement $channel): DOMElement|false
        {
            $rss = $this->xml->createElement('rss');
            $rss->setAttribute('version', '2.0');
            $rss->appendChild($channel);

            return $rss;
        }
    }
