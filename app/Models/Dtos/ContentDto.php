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

        public ?string $id;
        public ?string $type;
        public ?string $title;
        public string $body;
        public Carbon $publishAt;

        private function setPublishAt(&$data) : void
        {
            if (gettype($data) === 'array' && !empty($data['publish_at']))
                $this->publishAt = new Carbon($data['publish_at']);

            elseif (gettype($data) === 'object' && !empty($data->publish_at))
                $this->publishAt == new Carbon($data->publish_at);
        }
    }
