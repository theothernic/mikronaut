<?php
    namespace App\Models\Dtos;

    use Bearlovescode\Datamodels\Dto\Dto;

    class SettingDto extends Dto implements IDto
    {
        public string $key;
        public string $context;
        public string $value;
    }
