<?php
    namespace App\Models\ViewModels\Content;

    use App\Models\Dtos\ContentDto;
    use App\Models\Dtos\UserDto;
    use App\Models\ViewModels\PageViewModel;
    use Illuminate\Support\Facades\Auth;

    class SingleViewModel extends PageViewModel
    {
        public ContentDto $content;
        public UserDto $author;

        public bool $userIsLoggedIn;

        public function __construct(mixed $data = null)
        {
            parent::__construct($data);
            $this->userIsLoggedIn = Auth::check();
        }
    }

