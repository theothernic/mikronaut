<?php
    namespace App\Models;

    use App\Models\Dtos\IDto;

    interface IDtoable
    {
        public function getDto() : IDto;
    }
