<?php
/**
 * Created by PhpStorm.
 * User: Saeedth1214
 * Date: 9/18/2021
 * Time: 10:43 AM
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model = User::class;

    public function all()
    {
        return $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $user=$this->model::query()->create($data);
            if (!$user->exists) {
                return null;
            }
            return $user;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($id, $data)
    {
        $user=$this->model::query()->find($id);
        try {
            return $user->update($data);
        } catch (\Throwable $th) {
            return null;
        }
    }
}
