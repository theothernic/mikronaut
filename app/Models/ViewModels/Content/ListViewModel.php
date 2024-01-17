<?php
    namespace App\Models\ViewModels\Content;

    use Bearlovescode\Datamodels\View\PageViewModel;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\Collection;

    class ListViewModel extends PageViewModel
    {
        public Collection $content;
        public Paginator $paginator;
    }
