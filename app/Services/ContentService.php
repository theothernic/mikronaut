<?php
    namespace App\Services;

    use App\Models\Content;
    use Illuminate\Support\Collection;

    class ContentService

    {


        public function save(array $data = []) : void
        {
            Content::create($data);
        }
    }
