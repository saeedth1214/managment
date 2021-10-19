{{--  --}}


@inject('dbStatus', 'App\Widgets\dbStatus')

<?php

// dd($this->companies->toArray());

?>

<div class="row">
    <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت شرکت ها
        </span>
    </div>

    <div class="add-company">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <p>افزودن شرکت</p>
                        </div>
                        <div class="card-body">
                        <form wire:submit.prevent={{$updateCompany ?"update":"create"}}>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="user_id">نام کاربر</label>
                                                    <select  wire:model.defer="state.user_id" class='form-control @error('user_id') is_invalid @enderror'>
                                                        @if (count($users)>0)
                                                            @foreach ($users as $key=>$value)
                                                                <option {{$state['user_id']==$key ? 'selected':''}} value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        @else
                                                        <option value="">
                                                            موردی یافت نشد
                                                        </option>
                                                        @endif
                                                    </select>
                                                    @error('user_id')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror       
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="name">نام شرکت</label>
                                                    <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror">
                                                    @error('name')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="database">نام دیتابیس</label>
                                                    <input type="text" wire:model.defer="state.database" class="form-control @error('database') is-invalid @enderror">
                                                    @error('database')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4">

 <div class="form-group">
                                                    <label for="db_status">وضعیت دیتابیس</label>
                                                    <select class="form-control @error('db_status') is-invalid @enderror " wire:model.defer="state.db_status">
                                                        @foreach ($db_status as $key=>$value)
                                                        <option {{ $key==$state['db_status']?"selected":"" }} value={{$key}}>{{$dbStatus->getDescription($value)}}</option>
                                                        @endforeach
                                                    </select>     
                                                        @error('db_status')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                                <div class="form-group">
                                                            <label>تاریخ فعالسازی</label>
                                                                <div wire:ignore class="input-group @error('activation_at') is-invalid @enderror" id="companyDatePicker"  data-companyDatePicker="@this">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    </div>
                                                                    <input  id="activationAtInput" data-target="companyDatePicker" class="form-control" type="text">
                                                                </div>
                                                                    @error('activation_at')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                                </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        
                                                        @if ($updateCompany)
                                                            
                                                        ویرایش
                        <i class="fa fa-edit"></i>
                        @else
                        افزودن
                        <i class="fa fa-plus"></i>

                                                        @endif

                                    
                                    </button>
                                </div>
                        </form>

                        </div>
                    </div>
</div>
                   

  <div class="col-12">
            <div class="card">
              <div class="card-header" style="padding: 1.8rem 1.25rem">
                <div class="card-tools">
                  <div class="input-group input-group-sm w-300">
                    <button wire:click="deleteConfimed()" type="submit" class="btn btn-danger btn-sm ml-2">
                          <i class="fa fa-trash"></i>
                          حذف
                      </button>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                       <tr>
                              <th></th>
                              <th>نام کاربر</th>
                              <th>نام شرکت</th>
                              <th>نام دیتابیس</th>
                              <th>وضعیت دیتابیس</th>
                              <th>وضعیت</th>
                              <th>تاریخ فعالیت </th>
                              <th>نمایش پیغام ها</th>
                              <th>نمایش پکیج ها</th>
                              <th>عملیات</th>
                        </tr>
                    </thead>
                        <tbody>
                                @if ($companies->count()>0)
                                        @foreach ($companies as $company)
                                        <tr>
                                            <td>
                                                  <div class="check-input">
                                                    <input wire:click="addTodelete({{$company->id}})" type="checkbox">
                                                </div>
                                            </td>
                                            <td>{{$company->user->full_name}}</td>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->database}}</td>
                                            <td>
                                                {!! $dbStatus->getTag($company->db_status)!!}
                                            </td>
                                            <td>
                                            <label class="switch switch-icon switch-primary switch-pill form-control-label activeCompany" data-companyId="{{$company->id}}" >
                                                                <input type="checkbox" class="switch-input form-check-input" {{$company->status?'checked':''}} >
                                                                <span class="switch-label"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                            </td>
                                            <td>{{$company->activation_at}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-info" wire:click="showMessage({{$company->id}})">نمایش</button>
                                            </td>
                                            <td>
                                                <button  class="btn btn-sm btn-outline-info">
                                                    <a href="{{route("admin.company-packages",$company->id)}}">نمایش</a>
                                                </button>
                                            </td>
                                            <td>
                                                <span class="badge badge-success" style="cursor: pointer" wire:click="edit({{$company->id}})"><i class="fa fa-edit"></i></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                @endif
                        </tbody>
                    </table>
                 </div>
             <div>
          </div>
</div>

<livewire:admin.company.company-alert/>
{{-- <livewire:admin.company.company-package/> --}}

<script>
    window.addEventListener('show-company-alerts',event=>{
    $('#displayAlert').modal('show');
    });

</script>