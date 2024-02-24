<?php
    namespace App\Models\Dtos;

    use Bearlovescode\Datamodels\Dto\Dto;

    class SitemapUrlDto extends Dto
    {
        public string $loc;
        public string $lastmod;
        public string $changefreq;
        public float $priority = 0.5;
    }
