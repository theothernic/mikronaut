<?php
    namespace App\Http\Controllers;

    use App\Models\ViewModels\Content\ListViewModel;
    use App\Services\ContentService;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Http\Request;

    class FrontpageController extends Controller
    {
        public function __construct(
            private readonly ContentService $contentService
        )
        {
        }

        public function __invoke(Request $request)
        {
            $content = $this->contentService->paginatedList();


            $page = new ListViewModel([
                'title' => sprintf('Welkommen der %s --', config('app.name')),
                'content' => $content,
                'paginator' => new Paginator($content, config('content.limit'), $request->get('page'))
            ]);

            return view('content.list', compact('page'));
        }
    }
