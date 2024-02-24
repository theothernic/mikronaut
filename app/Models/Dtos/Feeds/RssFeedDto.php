<?php
    namespace App\Models\Dtos\Feeds;

    use Illuminate\Support\Collection;
    use Bearlovescode\Datamodels\Dto\Dto;

    class RssFeedDto extends Dto
    {
        public RssFeedChannelDto $channel;
        public Collection $items;
    }
