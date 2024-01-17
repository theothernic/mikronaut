<?php
    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Models\Dtos\ContentEditorViewModel;
    use App\Models\ViewModels\Content\EditorViewModel;

    class EditorController extends Controller
    {
        public function __invoke(string $id = '')
        {
            $page = new EditorViewModel([
                'title' => 'Editor'
            ]);



            return view('content.editor', compact('page'));
        }
    }
