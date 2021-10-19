<?php

namespace App\Repositories;

use App\Models\invoice;

class invoiceRepository
{
    protected $model=invoice::class;

    public function all()
    {
        return  $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $invoice = $this->model::query()->create($data);
            if (!$invoice->exists) {
                return null;
            }
            return $invoice;
        } catch (\Throwable $th) {
            return $th->getMessage();
            return null;
        }
    }

    public function update($id, $data)
    {
        $invoice = $this->model::query()->find($id);
        try {
            return $invoice->update($data);
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


    public function activeSalary($pId)
    {
        try {
            $invoice = $this->model::query()->find($pId);

            return $invoice->update(['access_salary' => !$invoice->access_salary]);
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return null;
        }
    }
    public function activeOnlineConnect($pId)
    {
        try {
            $invoice = $this->model::query()->find($pId);

            return $invoice->update(['online_connect' => !$invoice->online_connect]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function packageNameForInvoice()
    {
        try {
            return $this->model::query()->pluck('package_name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }
}
