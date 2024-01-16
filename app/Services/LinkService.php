<?php
    namespace App\Services;

    use App\Models\Dtos\LinkDto;
    use App\Models\Link;
    use Illuminate\Support\Collection;

    class LinkService
    {
        public static function getActiveLinks()
        {
           return Link::active()->get();
        }

        public static function getOrderedActiveLinks() : Collection
        {
            $records = collect();
            $data = Link::active()->orderBy('weight', 'desc')->get();
            foreach ($data as $r)
                $records->push(new LinkDto($r->getAttributes()));

            return $records;
        }
    }
