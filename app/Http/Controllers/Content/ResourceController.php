<?php
    namespace App\Http\Controllers\Content;


    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreContentRequest;
    use App\Services\ContentService;
    use Illuminate\Support\Facades\Auth;

    class ResourceController extends Controller
    {
        public function __construct(
            private readonly ContentService $contentService
        )
        {
        }

        public function store(StoreContentRequest $request)
        {
            $data = $request->validated();

            $this->contentService->save($data);

            return redirect()->route('user.dashboard');
        }

        public function update()
        {

        }

        public function destroy()
        {

        }
    }
