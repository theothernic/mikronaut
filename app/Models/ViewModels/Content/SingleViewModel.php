<?php
    namespace App\Models\ViewModels\Content;

    use App\Models\Dtos\ContentDto;
    use App\Models\Dtos\UserDto;
    use Bearlovescode\Datamodels\View\PageViewModel;

    class SingleViewModel extends PageViewModel
    {
        public ContentDto $content;
        public UserDto $author;
    }

