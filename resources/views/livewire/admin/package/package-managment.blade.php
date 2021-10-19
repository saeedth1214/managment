
<div >
    
<div class="row" >
    <div class="col-md-12">
        <div class="header-component">
        <span>
            داشبورد
        </span>
        <span>
            /
        </span>
        <span class="bg-blue">
            مدیریت پکیج ها
        </span>   
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span>
انتخاب پکیج برای شرکت ها
                </span>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="createPackageForCompany"  id="form">
                    <div class="row">
                        <div class="col-md-6">
                                            <div class="form-group">
                                                        <label for="company_id">انتخاب شرکت</label>
                                                        <select  wire:model.defer="state.company_id" class='form-control @error('company_id') is_invalid @enderror'>
                                                            @if (count($companies)>0)
                                                                    {{-- <option value="0">یک مورد را انتخاب کنید</option> --}}
                                                                @foreach ($companies as $key=>$value)
                                                                    <option {{$state['company_id'] ==$key ? 'selected':''}} value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            @else
                                                            <option value="0">
                                                                موردی یافت نشد
                                                            </option>
                                                            @endif
                                                        </select>
                                                        @error('company_id')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror       
                                            </div>
                        </div>
                        <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="package_id">انتخاب پکیج</label>
                                                       <div wire:model.defer="state.package_id" class="@error('package_id') border border-danger rounded @enderror" >
                                                            <select class='form-control'>
                                                                {{-- <option selected value=0>یک مورد را انتخاب کنید</option> --}}
                                                                @if (count($packages)>0)
                                                                    @foreach ($packages as $package)
                                                                        <option {{$state['package_id'] ==$package->id ? 'selected':''}} value="{{$package->id}}">{{$package->package_name}}</option>
                                                                    @endforeach
                                                                @else
                                                                <option value=0>
                                                                    موردی یافت نشد
                                                                </option>
                                                                @endif
                                                            </select>
                                                       </div>
                        
                                                       @error('package_id')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror       
                            </div>
                                          
                          </div>
                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>تاریخ شروع</label>
                                                    <div wire:ignore class="input-group @error('start_at') is-invalid @enderror" id="startDatePicker"  data-startDatePicker="@this">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            </div>
                                                            <input  id="startInput" data-target="startDatePicker" class="form-control" type="text" autocomplete="off">
                                                        </div>
                                                        @error('start_at')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                            </div>
                        </div>
                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>تاریخ پایان</label>
                                                                    <div wire:ignore class="input-group @error('end_at') is-invalid @enderror" id="endDatePicker"  data-endDatePicker="@this">
                                                                        <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </span>
                                                                        </div>
                                                                        <input  id="endAtInput" data-target="endDatePicker"  class="form-control" type="text" autocomplete="off">
                                                                    </div>
                                                                        @error('end_at')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                            </div>
                        </div>
                    </div>

                    <div class="row" dir="ltr">
                         <button type="submit" class="btn btn-primary btn-sm">
                        ایجاد
                        <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>


    <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="padding: 1.8rem 1.25rem">
                {{-- <h5 class="card-title">ss</h3> --}}

                <div class="card-tools">
                  <div class="input-group input-group-sm w-300">
                    {{-- data-toggle="modal" data-target="#packageManager" --}}
                     <button type="submit" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#packageManager">
                          <i class="fa fa-plus"></i>
                          ایجاد
                      </button>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-hover" >
                  <tbody><tr>
                    <th></th>
                    <th>نام</th>
                    <th>تعداد اشخاص</th>
                    <th>شیفت ها</th>
                    <th>شیفت-گروه</th>
                    <th>ترافیک</th>
                    <th>حقوق ماهانه</th>
                    <th>مکان ها</th>
                    <th>وضعیت حقوق</th>
                    <th>وضعیت اتصال</th>
                    <th>تعداد روز</th>
                    <th>تخفیف</th>
                    <th>شارژ</th>
                    <th>قیمت</th>
                    <th>وضعیت</th>
                  </tr>

                  @if ($packages->count() > 0)
                  @foreach ($packages as $package)
                         <tr>
                     <td>
                        <div class="check-input">
                            <input value="{{$package->id}}" wire:click="addTodelete({{$package->id}})" type="checkbox">
                        </div>
                    </td>
                    <td>{{$package->package_name}}</td>
                    <td>{{$package->persons}}</td>
                    <td>{{$package->shifts}}</td>
                    <td>{{$package->turn_shift_groups}}</td>
                    <td>{{$package->traffics}}</td>
                    <td>
                        {{number_format($package->max_salary_month)}}
                    <small class="text-muted d-inline-block">تومان</small>
                    </td>
                    <td>{{$package->locations}}</td>

                    <td>
                    
        
                    <label class="switch switch-icon switch-primary switch-pill form-control-label salary" id="accessSalary+{{$package->id}}"  data-packageId={{$package->id}}>
												<input type="checkbox" class="switch-input form-check-input" {{$package->access_salary ? "checked" : ''}}>
												<span class="switch-label"></span>
												<span class="switch-handle"></span>
											</label>
                    </td>
                     <td>
                     <label class="switch switch-icon switch-primary switch-pill form-control-label online" id="onlineConnect+{{$package->id}}" data-packageId={{$package->id}}>
												<input type="checkbox" class="switch-input form-check-input" {{$package->online_connect ? "checked" : ''}}>
												<span class="switch-label"></span>
												<span class="switch-handle"></span>
											</label>
                    </td>
                    <td>{{$package->duration}}</td>
                    <td>{{$package->discount}}</td>
                    <td>{{number_format($package->sms_charge)}}</td>
                    <td>{{number_format($package->price)}}</td>
                    <td>
                        <span class="badge badge-success" wire:click="editPackage({{$package->id}})" style="cursor: pointer"><i class="fa fa-edit"></i></span>
                    </td>
                  </tr>

                  @endforeach
                  @endif
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
        
    </div>


    <div class="footer-component">
        {{-- {{$packages->links("pagination-links")}} --}}
        {{-- {{$packages->links()}} --}}
    </div>
    
    </div>	




{{-- post form --}}


   







{{-- end post form --}}

</div>

</div>

    <livewire:admin.package.package-post-form/>