
<div class="row">
    <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت دستگاه ها		    
        </span>
    </div>
    <div class="add-company">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <p>ایجاد دستگاه جدید</p>
                        </div>
                        <div class="card-body">
                        <form wire:submit.prevent={{$updateDevice ? "update" :"create"}}>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                              <label for="company_id">انتخاب شرکت</label>
                                                    <select wire:model.defer="state.company_id" class="form-control @error('company_id') is-invalid @enderror">
                                                        @if (count($companies)>0)
                                                            @foreach ($companies as $key=>$value)
                                                                  <option {{$state['company_id']==$key ?'selected':''}} value={{$key}}>{{$value}}</option>
                                                            @endforeach 
                                                        @else
                                                            <option value=0>موردی یافت نشد</option>
                                                        @endif
                                                    </select>
                                                    @error('company_id')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                                   {{-- @widget('companyName',['companies'=>$companies])   --}}



                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="form-group">

                                                   {{-- @widget('deviceName') --}}

                                                    <label for="device_id">انتخاب دستگاه</label>
                                                    <select wire:model.defer="state.device_id" class="form-control @error('device_id') is-invalid @enderror">
                                                        @if (count($devices)>0)
                                                            @foreach ($devices as $key=>$value)
                                                                  <option {{$state['device_id']==$key ?'selected':''}} value={{$key}}>{{$value}}</option>
                                                            @endforeach 
                                                        @else
                                                            <option value=0>موردی یافت نشد</option>
                                                        @endif
                                                    </select>
                                                    @error('device_id')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="period">دوره زمانی</label>
                                                    <input wire:model.defer="state.period" type="number" class="form-control @error('period') is-invalid  @enderror"/>
                                                    @error('period')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                <label>آخرین درخواست</label>

                                 <div wire:ignore class="input-group @error('last_request_at') is-invalid @enderror" id="deviceDatePicker"  data-deviceDatePicker="@this">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    </div>
                                                                    <input  id="lastRequestedAtInput" data-target="deviceDatePicker" class="form-control" type="text">
                                                                </div>
                                                                    @error('last_request_at')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                <!-- /.input group -->
                                </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        @if ($updateDevice)
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

                <!-- /.card-header -->

                {{-- card body --}}
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                       <tr>
                            
                              <th></th>
                              <th>نام شرکت</th>
                              <th>نام دستگاه</th>
                              <th>دوره زمانی</th>
                              <th>تاریخ اخرین درخواست </th>
                              <th>عملیات</th>
                        </tr>
                      </thead>
                        <tbody>


                            @if ($fetchdevices->count() > 0)

                            
                            @foreach ($fetchdevices as $device)
                                
                            <tr>
                                 <td>
                        <div class="check-input">
                            <input wire:click="addTodelete({{$device->id}})" type="checkbox">
                        </div>
                       </td>
                            <td>{{$device->company->name}}</td>
                            <td>{{$device->device_id}}</td>
                            <td>{{$device->period}}</td>
                            <td>{{$device->last_request_at}}</td>
                            <td>
                                <span class="badge badge-success" style="cursor: pointer"  wire:click="edit({{$device->id}})">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </td>
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td>موردی یافت نشد</td>
                            </tr>
                            @endif


                        {{-- companies --}}


                        </tbody>
                    </table>
                 </div>
              <!-- /.card-body -->
             <div>
          </div>
</div>

