<?php
    namespace App\Models\Dtos;


    use Bearlovescode\Datamodels\Dto\Dto;
    use Illuminate\Support\Carbon;

    class ContentDto extends Dto implements IDto
    {
        public function __construct(mixed $data = null)
        {
            $this->setPublishAt($data);

            parent::__construct($data);
        }

        public int $id;
        public ?string $type;
        public ?string $title;
        public string $body;
        public string $format;
        public string $visibility;
        public ?string $visibility_key = null;

        public Carbon $publishAt;
        public ?string $rssPublishAt;

        private function setPublishAt(array &$data) : void
        {
            if (gettype($data) === 'array' && !empty($data['publish_at']))
            {
                $this->publishAt = new Carbon($data['publish_at']);
                unset($data['publish_at']);
            }

            elseif (gettype($data) === 'object' && !empty($data->publish_at))
            {
                $this->publishAt == new Carbon($data->publish_at);
                unset($data->publish_at);
            }

            $this->rssPublishAt = $this->publishAt->format(\DateTime::RFC822);
        }
    }
