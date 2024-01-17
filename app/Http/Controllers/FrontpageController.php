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
            $records = $this->contentService->paginatedList();


            $page = new ListViewModel([
                'records' => $records,
                'paginator' => new Paginator($records, config('content.limit'), $request->get('page'))
            ]);

            return view('content.list', compact('page'));
        }
    }
