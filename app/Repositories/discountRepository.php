<?php


namespace App\Repositories;


use App\Models\discount;

class discountRepository{

    protected $model = discount::class;

    public function all()
    {
        return  $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $discount = $this->model::query()->create($data);
            if (!$discount->exists) {
                return null;
            }
            return $discount;
        } catch (\Throwable $th) {
            return $th->getMessage();
            return null;
        }
    }

    public function update($id, $data)
    {
        $discount = $this->model::query()->find($id);
        
        try {
            return $discount->update($data);
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
            return null;
        }
    }


}


