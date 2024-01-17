<?php
    namespace App\Http\Controllers\Content;

    use App\Models\ViewModels\Content\SingleViewModel;
    use App\Services\ContentService;
    use App\Services\UserService;

    class SingleController
    {
        public function __construct(
            private readonly ContentService $contentService,
            private readonly UserService $userService
        )
        {}

        public function __invoke(string $id)
        {
            $record = $this->contentService->get($id);
            $author = $this->userService->get($record->author_id);

            $page = new SingleViewModel([
                'title' => sprintf('%s: %s', ucfirst($record->type), $record->title),
                'content' => $record->getDto(),
                'author' => $author->getDto()
            ]);

            return view('content.single', compact('page'));
        }
    }
