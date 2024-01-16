<?php
    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Models\Dtos\ContentEditorViewModel;

    class EditorController extends Controller
    {
        public function __invoke(string $id = '')
        {
            $page = new ContentEditorViewModel();

            return view('content.editor', compact('page'));
        }
    }
