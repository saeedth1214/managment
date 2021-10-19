<?php


namespace App\Repositories;

use App\Models\company;
use Carbon\Carbon;

class companyRepository
{
    protected $model = company::class;

    public function all()
    {
        return  $this->model::query()->get();
    }

    public function create($data)
    {
        try {
            $company = $this->model::query()->create($data);
            if (!$company->exists) {
                return null;
            }
            return $company;
        } catch (\Throwable $th) {
            return $th->getMessage();
            return null;
        }
    }

    public function update($id, $data)
    {
        $company = $this->model::query()->find($id);
        try {
            return $company->update($data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }


    public function delete($Ids)
    {
        try {
            return $this->model::query()->whereIn('id', $Ids)->delete();
        } catch (\Throwable $th) {
            return null;
        }
    }


    public function activeCompany($companyId)
    {
        try {
            $company = $this->model::query()->find($companyId);

            return $company->update(['status' => ! $company->status]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function companyNameForfetchDevice()
    {
        try {
            return $this->model::query()->pluck('name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }
    public function companyNameForInvoice()
    {
        try {
            return $this->model::query()->pluck('name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getCompanyForCreateAlert()
    {
        try {
            return $this->model::query()->pluck('name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }
    public function getCompanyForPackages()
    {
        try {
            return $this->model::query()->pluck('name', 'id')->toArray();
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function setAlerts($data, $alertIds)
    {
        try {
            $company=$this->model::query()->find($data['company_id']);
            $attechedData=[];
            $data['delivered_at']= convertDateRepository::convertToMiladi($data['delivered_at']);
            foreach ($alertIds as $value) {
                $attechedData[$value]=[ 'delivered_at' => $data["delivered_at"]];
            }
            return $company->alerts()->syncWithoutDetaching($attechedData);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function canceldAlerts($companyId, $alertIds)
    {
        $company = $this->model::query()->find($companyId);
        return $company->alerts()->detach($alertIds);
    }

    public function getMessage($companyId)
    {
        try {
            $company=$this->model::query()->find($companyId);
            $messages=[];

            foreach ($company->alerts as $alert) {
                $messages[]=[
                    'id'=>$alert->id,
                    'title' => $alert->title,
                    'message'=>$alert->message,
                    'delivered_at' => convertDateRepository::convertToShamsi($alert->pivot->delivered_at)
                ];
            }
            return $messages;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function setPackagesForCompany($data)
    {
        try {
            $company = $this->model::query()->find($data['company_id']);
            $attechedData[$data['company_id']] =[
                'start_at' => convertDateRepository::convertToMiladi($data['start_at']),
                'end_at' => convertDateRepository::convertToMiladi($data['end_at']),
                'package_id'=> $data['package_id']
            ];
            return $company->packages()->syncWithoutDetaching($attechedData);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }
    public function getPackages($companyId)
    {
        $company=$this->model::query()->findOrFail($companyId);
        return [$company, $company->packages->first()];
    }
}
