<?php
    namespace App\Http\Controllers;

    use App\Models\ViewModels\Content\ListViewModel;

    class FrontpageController extends Controller
    {
        public function __invoke()
        {
            $page = new ListViewModel();

            return view('content.list', compact('page'));
        }
    }
