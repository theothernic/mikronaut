<?php
namespace App\Http\Controllers\Content;

use App\Models\ViewModels\Content\ListViewModel;

class ListController
{
    public function __invoke()
    {
        $page = new ListViewModel([
            'title' => 'Dem posts.'
        ]);

        return view('content.single', compact('page'));
    }
}
