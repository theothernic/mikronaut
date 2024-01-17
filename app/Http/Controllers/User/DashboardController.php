<?php
    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use App\Models\Dtos\UserDashboardViewModel;
    use App\Models\ViewModels\User\DashboardViewModel;
    use App\Services\UserService;
    use Illuminate\Support\Facades\Auth;

    class DashboardController extends Controller
    {
        public function __construct(
            private readonly UserService $userService
        )
        {
        }

        public function __invoke()
        {
            $user = $this->userService->get(Auth::id());
            $page = new DashboardViewModel([
                'user' => $user->getDto()
            ]);

            return view('user.dashboard', compact('page'));
        }
    }
