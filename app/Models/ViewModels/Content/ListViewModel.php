<?php
    namespace App\Models\ViewModels\Content;

    use App\Models\ViewModels\PageViewModel;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\Auth;

    class ListViewModel extends PageViewModel
    {
        public Collection $content;
        public Paginator $paginator;

        public bool $userIsLoggedIn = false;

        public function __construct(mixed $data = null)
        {

            $this->setContentIfEmpty($data);
            $this->userIsLoggedIn = Auth::check();

            parent::__construct($data);
        }

        public function setContentIfEmpty(array &$data)
        {
            if (empty($data['content']))
                $this->content = collect();
        }
    }
