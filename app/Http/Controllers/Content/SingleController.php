<?php
    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Models\ViewModels\Content\SingleViewModel;
    use App\Services\ContentService;
    use App\Services\SettingService;
    use App\Services\UserService;

    class SingleController extends Controller
    {
        public function __construct(
            private readonly ContentService $contentService,
            private readonly UserService $userService
        )
        {}

        public function __invoke(string $id)
        {


            $content = $this->contentService->get($id);
            $author = $this->userService->get($content->author_id);

            $page = new SingleViewModel([
                'site' => [
                    'description' => $this->site('description')
                ],
                'meta' => [
                    'author' => $author->name
                ],
                'title' => sprintf('%s: %s', ucfirst($content->type),
                    $content->title ?? substr($content->body, 0,25)),
                'content' => $content->getDto(),
                'author' => $author->getDto()
            ]);

            return view('content.single', compact('page'));
        }
    }
