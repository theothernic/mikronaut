<?php
    namespace App\Models\Dtos;

    use App\Models\Dtos\IDto;
    use Bearlovescode\Datamodels\Dto\Dto;

    class UserDto extends Dto implements IDto
    {
        public string $name;
        public string $email;
    }
