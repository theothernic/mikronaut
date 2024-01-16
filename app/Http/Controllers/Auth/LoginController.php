<?php
    namespace App\Http\Controllers\Auth;

    use App\Models\ViewModels\Auth\LoginViewModel;
    use App\Http\Controllers\Controller;
    use App\Services\AuthService;
    use Illuminate\Http\Request;

    class LoginController extends Controller
    {
        public function __construct(
            private readonly AuthService $authService
        )
        {}

        public function __invoke()
        {
            $page = new LoginViewModel();

            return view('auth.login', compact('page'));
        }

        public function handle(Request $request)
        {
            if (!$this->authService->login($request->only('email', 'password')))
                return redirect()->back();

            return redirect()->route('user.dashboard');
        }


    }
