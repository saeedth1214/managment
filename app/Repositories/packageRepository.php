<?php


namespace App\Repositories;

use App\Models\package;

class packageRepository
{
    protected $model=package::class;

    public function all()
    {
        return  $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $package = $this->model::query()->create($data);
            if (!$package->exists) {
                return null;
            }
            return $package;
        } catch (\Throwable $th) {
            return $th->getMessage();
            return null;
        }
    }

    public function update($id, $data)
    {
        $package = $this->model::query()->find($id);
        try {
            return $package->update($data);
        } catch (\Throwable $th) {
            return null;
        }
    }


    public function delete($ids)
    {
        try {
            return $this->model::query()->whereIn('id', $ids)->delete();
        } catch (\Throwable $th) {
            return null;
        }
    }


    public function activeSalary ($pId)
    {
        try {
            $package = $this->model::query()->find($pId);

            return $package->update(['access_salary' => !$package->access_salary]);
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return null;
        }
    }
    public function activeOnlineConnect($pId)
    {
        try {
            $package = $this->model::query()->find($pId);

            return $package->update(['online_connect' => !$package->online_connect]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function packageNameForInvoice ()
    {
        try {
            return $this->model::query()->pluck('package_name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }
}
