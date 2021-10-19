
<div class="row">
    <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت تخفیف ها
        </span>
    </div>
          <div class="add-company">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <p>ایجاد تخفیف جدید</p>
                        </div>
                        <div class="card-body">
                        <form wire:submit.prevent="create">
                                <div class="row">
                                   
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                    <label for="code">کد تخفیف</label>
                                                    <input type="text" wire:model.defer="state.code" class="form-control @error('code') is-invalid @enderror">
                                                    @error('code')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                    <label for="percent">درصد تخفیف</label>
                                                    <input type="number" wire:model.defer="state.percent" class="form-control @error('percent') is-invalid @enderror">
                                                    @error('percent')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                  
                                     <div class="col-md-3">
                                        <div class="form-group">
                                                    <label for="max_use">  حداکثراستفاده </label>
                                                    <input type="number" wire:model.defer="state.max_use" class="form-control @error('max_use') is-invalid @enderror">
                                                    @error('max_use')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                   <div class="col-md-3">
                                         <div class="form-group">
                                                  <label>تاریخ انقضا</label>

                                                        <div wire:ignore.self class="input-group @error('expires_at') is-invalid @enderror" id="discountDatePicker"  data-discountDatePicker="@this">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            </div>
                                                            <input  id="expiresInput" data-target="discountDatePicker" class="form-control" type="text">
                                                        </div>
                                                        @error('expires_at')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 

                                                        <!-- /.input group -->
                                            </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        افزودن
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>

    </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="button-tools">
                    <div class="input-group">
                              <button class="btn btn-sm btn-light ml-1">
                                    <span class="badge badge-info badge-pill" wire:click="getActiveDiscount">20</span>
                                    فعال
                                </button>
                                <button class="btn btn-sm btn-light ml-1">
                                    <span class="badge badge-danger badge-pill" wire:click="getDeActiveDiscount">80</span>
                                    منقضی شده
                                </button>
                                <button class="btn btn-sm btn-secondary">
                                    <span class="badge badge-pill badge-light" wire:click="getAllDiscount">100</span>
                                    همه
                                </button>
                    </div>
                 </div>
                <div class="card-tools">
                    
                  <div class="input-group input-group-sm w-300">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

                <!-- /.card-header -->

                {{-- card body --}}
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                       <tr>
                              <th>کد تخفیف</th>
                              <th>درصد تخفیف</th>
                              <th>تاریخ انقضا</th>
                              <th>حداکثر استفاده</th>
                              <th>وضعیت</th>
                              <th>عملیات</th>
                        </tr>
                      </thead>
                        <tbody>


                            @if ($discounts->count() > 0)
                                @foreach ($discounts as $discount)
                                    
                                <tr>
                                            <td>{{$discount->code}}</td>
                                            <td>{{$discount->percent}}</td>
                                            <td>{{$discount->expires_at}}</td>
                                            <td>{{$discount->max_use}}</td>
                                            <td>
                                                @if ($discount->isActive)
                                                <span class="badge badge-success" style="cursor: pointer">فعال</span>
                                                    @else
                                                <span class="badge badge-danger" style="cursor: pointer">منقضی شده</span>

                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-success" style="cursor: pointer" wire:click="edit()"><i class="fa fa-edit"></i></span>
                                                    <span type="button" class="badge badge-danger" style="cursor: pointer" wire:click="deleteDiscount({{$discount->id}})">
                                                    <i class="fa fa-trash"></i>
                                                    </span>
                                            </td>
                            </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                 </div>
              <!-- /.card-body -->
             <div>
    </div>
</div>

