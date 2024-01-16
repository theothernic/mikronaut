<?php
    namespace App\Http\Controllers\Content;

    use App\Models\ViewModels\Content\SingleViewModel;

    class SingleController
    {
        public function __invoke()
        {
            $page = new SingleViewModel();

            return view('content.single', compact('page'));
        }
    }
