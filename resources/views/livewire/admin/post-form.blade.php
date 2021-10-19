
   
<div wire:ignore.self class="modal fade" id="userRegistred" tabindex="-1" role="dialog" aria-labelledby="userRegistredLable" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered registred-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="userRegistredLable">
        @if ($updateUser)
        <span>ویرایش</span>
        @else
        <span>افزودن کاربر</span>
        @endif
      </h5>
        <button type="button" class="close setnewMargin" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
   <form wire:submit.prevent= {{ $updateUser ?"update":"create" }}>
                  <div class="form-group">
                    <label for="full_name">نام کامل</label>
                    <input type="text" wire:model.defer="state.full_name" class="form-control @error('full_name') is-invalid @enderror">
                    @error('full_name')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                  </div>

                  <div class="form-group">
                    <label for="email">آدرس ایمیل</label>
                    <input type="text" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>  

                  <div class="form-group">
                    <label for="company_name">نام شرکت</label>
                    <input type="text" wire:model.defer="state.company_name" class="form-control @error('company_name') is-invalid @enderror">
                    @error('company_name')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>

                  <div class="form-group">
                    <label for="mobile">تلفن همراه</label>
                    <input type="text" wire:model.defer="state.mobile" class="form-control @error('mobile') is-invalid @enderror">
                    @error('mobile')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">تلفن منزل</label>
                    <input type="text"  wire:model.defer="state.phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label for="password">رمزعیور</label>
                    <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>


                 <div class="form-group">
                    <label for="password_confirmation">تکرار رمزعبور</label>
                    <input type="password" wire:model.defer="state.password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>


                  <div class="form-group">
                    <label for="address">آدرس</label>
                    <textarea wire:model.defer="state.address" class="form-control @error('address') is-invalid @enderror"></textarea>
                    @error('address')<div class="invalid-feedback"> {{$message}}</div>@enderror
                  </div>

                <div class="modal-footer text-right justify-content-start">              
                  <button type="submit"class="btn btn-primary btn-sm">{{$updateUser ?"ویرایش":"ثبت"}}</button>
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