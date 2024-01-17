<?php
    namespace App\Models\ViewModels;

    use Bearlovescode\Datamodels\View\PageViewModel;
    use Illuminate\Contracts\Auth\Authenticatable;
    use Illuminate\Support\Facades\Auth;

    class AuthenticatedPageViewModel extends PageViewModel
    {
        public Authenticatable $user;
        public function __construct(mixed $data = null)
        {
            parent::__construct($data);

            $this->user = Auth::user();
        }
    }
