
@inject('InvoiceStatus', "App\Widgets\InvoiceStatus")


<?php

// dd($invoices);

?>
<div class="row">
    <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت صورتحساب ها
        </span>
    </div>
    <div class="add-company">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <p>صورتحساب  جدید</p>
                        </div>
                        <div class="card-body">
                        <form wire:submit.prevent={{$this->updateInvoice ?"update":'create'}}>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="company_id">انتخاب شرکت</label>

                                                    <select class="form-control @error('company_id') is-invalid @enderror"  wire:model.defer="state.company_id">
                                                        @if (count($companies) >0)
                                                    
                                                            @foreach ($companies as $key=>$value)
                                                                    <option {{$this->state['company_id']==$key ? 'selected' :''}} value={{$key}}>{{$value}}</option>    
                                                            @endforeach
                                                        
                                                            @else
                                                            
                                                            <option value=0>موردی یافت نشد</option>
                                                            @endif  
                                                    </select>  
                                                        @error('company_id')<div class="invalid-feedback"> {{$message}}</div>@enderror 

                                        </div>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="package_id">نام پکیج</label>
                                                       <select class="form-control @error('package_id') is-invalid @enderror" wire:model.defer="state.package_id">
                                                        @if (count($packages) >0)
                                                        
                                                            @foreach ($packages as $key=>$value)
                                                                    <option {{$this->state['package_id']==$key ? 'selected' :''}} value={{$key}}>{{$value}}</option>    
                                                            @endforeach
                                                        
                                                            @else
                                                            
                                                            <option value=0>موردی یافت نشد</option>
                                                            @endif
                                                            
                                                        </select>  
                                                        @error('package_id')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                                
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="amount">هزینه</label>
                                                    <input type="number" wire:model.defer="state.amount" class="form-control @error('amount') is-invalid @enderror">
                                                    @error('amount')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="discount">تخفیف استفاده شده</label>
                                                    <input type="number" wire:model.defer="state.discount" class="form-control @error('discount') is-invalid @enderror">
                                                    @error('discount')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                    <label for="status">وضعیت</label>
                                                        <select class="form-control @error('status') is-invalid @enderror" wire:model.defer="state.status">
                                                        @if (count($status) >0)
                                                            @foreach ($status as $key=>$value)
                                                                    <option {{ $state['status'] ==$key ? 'selecetd':'' }} value={{$key}}>{{$InvoiceStatus->getDescription($value)}}</option>    
                                                            @endforeach
                                                        
                                                            @else
                                                            
                                                            <option value=0>موردی یافت نشد</option>
                                                            @endif
                                                            
                                                        </select>  
                                                        @error('status')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        @if ($updateInvoice)
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
                      <button type="button" class="btn btn-danger btn-sm ml-2" wire:click="deleteConfimed()" ><i class="fa fa-trash"></i>حذف</button>

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
                              <th>نام پکیج</th>
                              <th>هزینه کلی</th>
                              <th>درصد تخفیف</th>
                              <th>وضعیت</th>
                              <th>عملیات</th>
                        </tr>
                      </thead>
                        <tbody>

                            @if ($invoices->isNotEmpty())
                            
                                @foreach ($invoices as $invoice)
                                    <tr>
                                                <td>
                                        <div class="check-input">
                                            <input type="checkbox"  wire:click="addTodelete({{$invoice->id}})">
                                        </div>
                                    </td>
                        <td>{{$invoice->company->name}}</td>
                        <td>{{$invoice->package->package_name}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td>{{$invoice->discount}}</td>
                        <td>
                          
                            {!!$InvoiceStatus->getTag($invoice->status)!!}
                           
                        </td>
                       <td>
                        <span class="badge badge-success" style="cursor: pointer" wire:click="edit({{$invoice->id}})"><i class="fa fa-edit"></i></span>
                       </td>
                   </tr>
                                    @endforeach
                            
                            @else
                            <tr>
                                <td>موردی یافت نشد</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                 </div>
              <!-- /.card-body -->
             <div>
          </div>
</div>

