<?php
    namespace App\Services;

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
            $data = ($simple) ? Content::orderBy('created_at', $order)->simplePaginate($perPage) : Content::orderBy('created_at', $order)->paginate($perPage);

            foreach ($data as $row)
                $records->push($row->getDto());

            return $records;
        }

        public function save(array $data = []) : void
        {
            if (empty($data['author_id']))
                $data['author_id'] = Auth::id();

            Content::create($data);
        }
    }
