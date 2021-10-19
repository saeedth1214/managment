<?php

namespace App\Http\Livewire\Admin\Company;

use Livewire\Component;
use App\Http\traits\message;
use App\Repositories\companyRepository;

class CompanyAlert extends Component
{
    use message;
    protected $listeners=[
        'setAlerts',
        'cancelConfirmed',
        "cancelAlertsFromCompany",
        "resetFileds"
    ];
    public $alerts=[];
    public $cancelAlertIds=[];
    public $company_id;
    private $companyRepository;

    public function __construct()
    {
      parent::__construct();
      $this->companyRepository=resolve(companyRepository::class);
    } 
    public function setAlerts(...$params)
    {
        $this->alerts=$params[0];
        $this->company_id=$params[1];
        $this->dispatchBrowserEvent('show-company-alerts');

    }

    public function cancelAlertsFromCompany()
    {
        $result=$this->companyRepository->canceldAlerts($this->company_id,$this->cancelAlertIds);
        $result ?
            $this->setMessage('تغییرات با موفقیت انجام شد')
            :
            $this->setMessage('مشکلی در روند ثبت به وجود آمد', 'error');

            $this->dispatchBrowserEvent('closemodal');
            $this->resetFileds();
    }

    public function resetFileds()
    {
        $this->alerts=[];
    }
    public function cancelAlert($alertId)
    {
        $result = $this->hasAlertId($alertId);
        $result ? $this->filterId($alertId) : $this->addToDeletedArray($alertId);
    }
    private function addToDeletedArray($alertId)
    {
        $this->cancelAlertIds[] = $alertId;
    }
    private function hasAlertId($alertId)
    {
        return in_array($alertId, $this->cancelAlertIds);
    }

    private function filterId($alertId)
    {
        $this->cancelAlertIds = array_filter($this->cancelAlertIds, function ($id) use ($alertId) {
            return $alertId !== $id;
        });
    }

    public function cancelConfirmed()
    {
        if (empty($this->cancelAlertIds)) {
            $this->setMessage('مقادیری برای حذف انتخاب نشده است', 'warning');
        } else {
            $this->confirmedMessage('ایا از انجام عملیات مطمئن هستید؟', 'companyAlertConfrim', 'warning');
        }
    }

    public function render()
    {
        return view('livewire.admin.company.company-alert');
    }
}
