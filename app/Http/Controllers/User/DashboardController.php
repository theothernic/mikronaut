<?php
    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use App\Models\Dtos\UserDashboardViewModel;

    class DashboardController extends Controller
    {
        public function __invoke()
        {
            $page = new UserDashboardViewModel();

            return view('user.dashboard', compact('page'));
        }
    }
