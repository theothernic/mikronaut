<?php
    namespace App\Models\Dtos\Feeds;

    use Bearlovescode\Datamodels\Dto\Dto;
    use League\Uri\Uri;

    class RssFeedChannelDto extends Dto
    {
        public string $title;
        public Uri $link;
        public ?string $description;
        public string $language;
        public string $pubDate;
        public string $generator;

        public function __construct(mixed $data = null)
        {
            parent::__construct($data);

            $this->setGenerator();
        }

        public function setGenerator(): void
        {
            $this->generator = sprintf('%s (mikronaut/%s)', config('app.name'), getAppVersion());
        }

    }
