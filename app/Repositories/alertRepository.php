<?php


namespace App\Repositories;


use App\Models\alert;
use function Assert\that;

class alertRepository{

    protected $model = alert::class;

    public function all()
    {
        return  $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $alert = $this->model::query()->create($data);
            if (!$alert->exists) {
                return null;
            }
            return $alert;
        } catch (\Throwable $th) {
            return $th->getMessage();
            return null;
        }
    }

    public function update($id, $data)
    {
        $alert = $this->model::query()->find($id);
        
        try {
            return $alert->update($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }


    public function delete($id)
    {
        try {
            return $this->model::query()->where('id', $id)->delete();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }


}


