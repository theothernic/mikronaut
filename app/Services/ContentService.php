<?php
    namespace App\Services;

    use App\Helpers\ContentFormatHelper;
    use App\Models\Content;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\Auth;

    class ContentService

    {
        public function get(string $id) : Content
        {
            return Content::findOrFail($id);
        }

        public function paginatedList(int $perPage = 10, bool $simple = true, string $order = 'asc')
        {
            $records = collect();
            $content = Content::orderBy('publish_at', $order);

            $data = ($simple) ? $content->simplePaginate($perPage) : $content->paginate($perPage);

            foreach ($data as $row)
                $records->push($row->getDto());

            return $records;
        }

        public function save(array $data = []) : void
        {
            if (empty($data['author_id']))
                $data['author_id'] = Auth::id();

            $data = match ($data['format']) {
                'html' => $this->formatHtml($data),
                default => $data
            };

            Content::create($data);
        }

        public function getPublicContent(): \Illuminate\Database\Eloquent\Collection
        {
            return Content::where('visibility', 'public')->get();
        }

        private function formatHtml(array $data): array
        {
            $data['title'] = strip_tags($data['title']);

            ContentFormatHelper::formatHtml($data['body']);

            return $data;
        }
    }
