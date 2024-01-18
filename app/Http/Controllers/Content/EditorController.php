<?php
    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Models\ViewModels\Content\EditorViewModel;
    use App\Services\ContentService;
    use Illuminate\Http\Request;

    class EditorController extends Controller
    {
        public function __construct(
            private readonly ContentService $contentService
        )
        {
        }

        public function __invoke(Request $request, string $id = '')
        {
            $page = new EditorViewModel([
                'title' => 'Editor',
                'replyTo' => $request->get('reply') ?? null
            ]);

            if ($request->has('edit'))
                $page->content = $this->contentService->get($request->get('edit'))->getDto();

            return view('content.editor', compact('page'));
        }
    }
