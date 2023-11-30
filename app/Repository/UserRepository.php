<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\IUserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements IUserRepository
{
    protected $user = null;

    public function list(): LengthAwarePaginator
    {
        // TODO: Implement list() method.
        return User::paginate(10);
    }

    public function findById($id): User
    {
        // TODO: Implement findById() method.
        return User::find($id);
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        // TODO: Implement storeOrUpdate() method.
        if (is_null($id)) {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make('password');
            $user->save();

            return $user;
        }

        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make('password');
        $user->save();

        return $user;
    }

    public function destroyById($id)
    {
        // TODO: Implement destroyById() method.
        return User::find($id)->delete();
    }
}
