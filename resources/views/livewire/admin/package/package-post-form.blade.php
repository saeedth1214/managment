
   
<div wire:ignore.self class="modal fade" id="packageManager" tabindex="-1" role="dialog" aria-labelledby="packageManagerLable" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered registred-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="packageManagerLable">
        <span>ایجاد پکیج جدید</span>
      </h5>
        <button type="button" class="close setnewMargin" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
   <form wire:submit.prevent={{$updatePackage ?"update":"create" }}>
       <div class="row">
        <div class="col-6">
                <div class="form-group">
                    <label for="package_name">نام پکیج</label>
                    <input type="text" wire:model.defer="state.package_name" class="form-control @error('package_name') is-invalid @enderror">
                    @error('package_name')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                </div>
        <div class="form-group">
                    <label for="persons">کاربران</label>
                    <input type="number" wire:model.defer="state.persons" class="form-control @error('persons') is-invalid @enderror">
                    @error('persons')<div class="invalid-feedback"> {{$message}}</div>@enderror 
        </div>
             <div class="form-group">
                    <label for="shifts">شیفت ها</label>
                    <input type="number" wire:model.defer="state.shifts" class="form-control @error('shifts') is-invalid @enderror">
                    @error('shifts')<div class="invalid-feedback"> {{$message}}</div>@enderror 
             </div>
             
              <div class="form-group">
                    <label for="turn_shift_groups">گروه-شیفت</label>
                    <input type="number" wire:model.defer="state.turn_shift_groups" class="form-control @error('turn_shift_groups') is-invalid @enderror">
                    @error('turn_shift_groups')<div class="invalid-feedback"> {{$message}}</div>@enderror 
             </div>
              <div class="form-group">
                    <label for="traffics">ترافیک</label>
                    <input type="number" wire:model.defer="state.traffics" class="form-control @error('traffics') is-invalid @enderror">
                    @error('traffics')<div class="invalid-feedback"> {{$message}}</div>@enderror 
             </div>
             <div class="form-group">
                    <label for="max_salary_month">فیش حقوقی در ماه</label>
                    <input type="number" wire:model.defer="state.max_salary_month" class="form-control @error('max_salary_month') is-invalid @enderror">
                    @error('max_salary_month')<div class="invalid-feedback"> {{$message}}</div>@enderror 
             </div>
        </div>
        <div class="col-6">
             <div class="form-group">
                    <label for="price">قیمت</label>
                    <input type="number" wire:model.defer="state.price" class="form-control @error('price') is-invalid @enderror">
                    @error('price')<div class="invalid-feedback"> {{$message}}</div>@enderror 
            </div>
             <div class="form-group">
                    <label for="duration">زمان اعتبار پکیج</label>
                    <input type="number" wire:model.defer="state.duration" class="form-control @error('duration') is-invalid @enderror">
                    @error('duration')<div class="invalid-feedback"> {{$message}}</div>@enderror 
            </div>
             <div class="form-group">
                    <label for="discount"> میزان تخفیف </label>
                    <input type="number" wire:model.defer="state.discount" class="form-control @error('discount') is-invalid @enderror">
                    @error('discount')<div class="invalid-feedback"> {{$message}}</div>@enderror 
            </div>
            <div class="form-group">
                    <label for="sms_charge">اس ام اس -شارژ</label>
                    <input type="number" wire:model.defer="state.sms_charge" class="form-control @error('sms_charge') is-invalid @enderror">
                    @error('sms_charge')<div class="invalid-feedback"> {{$message}}</div>@enderror 
            </div>
            <div class="form-group">
                    <label for="locations">دستگاه حقوق-دستمزد</label>
                    <input type="number" wire:model.defer="state.locations" class="form-control @error('locations') is-invalid @enderror">
                    @error('locations')<div class="invalid-feedback"> {{$message}}</div>@enderror 
             </div>
        </div>
       </div>
                <div class="modal-footer text-right justify-content-start">              
                  <button type="submit"class="btn btn-primary btn-sm">ثبت</button>
                  <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">بستن</button>
                </div>
              </form>
            </div>
                </div>
            </div>
          </div>
        </div>
  </div>
</div>