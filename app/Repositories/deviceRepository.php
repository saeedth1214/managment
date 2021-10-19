<?php

namespace App\Repositories;

use App\Models\fetch_device;

class deviceRepository
{
    protected $model=fetch_device::class;


    public function all()
    {
        try {
            return $this->model::query()->get();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }

    public function create ($data)
    {
        try {
            $device=$this->model::query()->create($data);
            if(!$device->exists){
                return null;
            }
            return $device;
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;            
        }
    }

    public function update($id, $data)
    {
        $device = $this->model::query()->find($id);
        try {
            return $device->update($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
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

}
