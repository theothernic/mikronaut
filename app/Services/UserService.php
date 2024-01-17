<?php
    namespace App\Services;

    use App\Models\User;

    class UserService
    {
        public function get(string $id) : User
        {
            return User::findOrFail($id);
        }
    }
