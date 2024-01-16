<?php
    namespace App\Services;

    use App\Models\Content;
    use Illuminate\Support\Collection;

    class ContentService

    {
        public function findBySlug(string $slug = '') : Content
        {
            return Content::where('slug', $slug)->firstOrFail();
        }

        public function getPublicPosts(): Collection
        {
            $data = Content::publicPosts()->get();

            $records = collect();
            foreach($data as $row)
                $records->push($row->getSingleViewModel());

            return $records;
        }

        public function save(array $data = []) : void
        {
            Content::create($data);
        }
    }
