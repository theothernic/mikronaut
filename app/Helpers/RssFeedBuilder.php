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
                $contentTitle = (empty($item->title)) ? sprintf('Post: %s', $item->id) : $item->title;
                $contentLink = route('content.single', $item->id);
                $contentBody = strip_tags(html_entity_decode($item->body));
                $el = $this->xml->createElement('item');
                $el->appendChild($this->xml->createElement('guid', $contentLink));
                $el->appendChild($this->xml->createElement('title', $contentTitle));
                $el->appendChild($this->xml->createElement('link', $contentLink));
                $el->appendChild($this->xml->createElement('description', $item->excerpt ?? Str::of($contentBody)->words( 75, '...')));
                $el->appendChild($this->xml->createElement('pubDate', $item->rssPublishAt));

                $feedItems->push($el);
            }

            return $feedItems;


        }



        private function buildRssChannel(RssFeedChannelDto $dto, ?Collection $items): DOMElement|false
        {
            $channel = $this->xml->createElement('channel');

            $atomLinkEl = $this->xml->createElement('atom:link');
            $atomLinkEl->setAttribute('href', route('feeds.rss'));
            $atomLinkEl->setAttribute('rel', 'self');
            $atomLinkEl->setAttribute('type', 'application/rss+xml');

            $channel->appendChild($atomLinkEl);
            unset($atomLinkEl);

            foreach ($dto as $key => $value)
            {
                if (empty($value))
                    continue;

                $channel->appendChild(new DOMElement($key, $value));
            }



            foreach ($items as $el)
                $channel->appendChild($el);

            return $channel;
        }

        private function buildRssFeed(\DOMElement $channel): DOMElement|false
        {
            $rss = $this->xml->createElement('rss');
            $rss->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:atom', 'http://www.w3.org/2005/Atom');
            $rss->setAttribute('version', '2.0');
            $rss->appendChild($channel);

            return $rss;
        }
    }
