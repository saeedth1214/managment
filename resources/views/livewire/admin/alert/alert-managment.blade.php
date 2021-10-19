
<div class="row">
    <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت پیغام ها
        </span>
    </div>
    <div class="add-company">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header">
                            <p>ایجاد پیام جدید</p>
                        </div>
                        <div class="card-body">
                        <form wire:submit.prevent={{$update ? "update" : "create"}} >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                    <label for="title">عنوان پیغام</label>
                                                    <input type="text" wire:model.defer="state.title" class="form-control @error('title') is-invalid @enderror">
                                                    @error('title')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                    <label for="message">متن پیغام</label>
                                                    <textarea wire:model.defer="state.message" class="form-control @error('message') is-invalid @enderror"></textarea>
                                                    @error('message')<div class="invalid-feedback"> {{$message}}</div>@enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        @if ($update)
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
                    <div class="col-md-6">
                        <div class="header">
                            <p>ثبت پیغام برای شرکت</p>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="setAlertToCompnay">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                    <label for="company_id" >انتخاب شرکت</label>
                                                    <select name="" wire:model.defer="state.company_id" class="form-control @error('company_id') is-invalid @enderror">
                                                            <option value=0>انتخاب شرکت...</option>
                                                        @if ($companies)      
                                                            @foreach ($companies as $key=>$value)
                                                                 <option value={{$key}}>{{$value}}</option>
                                                            @endforeach
                                                            @else
                                                            <option value=0>موردی یافت نشد</option>
                                                        @endif
                                                    </select>
                                                @error('company_id') <div class="invalid-feedback"> {{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                                <div class="form-group">
                                                            <label>تاریخ ارسال</label>
                                                                <div wire:ignore class="input-group @error("delivered_at") is-invalid @enderror" id="alertDatePicker"  data-alertDatePicker="@this">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                    </div>
                                                                    <input id="deliveredateInput" data-target="alertDatePicker" class="form-control" type="text">
                                                                </div>
                                                                    @error('delivered_at')<div class="invalid-feedback" style="display: block">{{$message}}</div>@enderror 
                                                </div>
                                    </div>
                                </div>
                                <div class="row" dir="ltr">
                                    <button type="submit" class="btn btn-success btn-sm" style="position: relative;top:30px">
                                        ثبت
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
                    <button class="btn btn-sm btn-light ml-1">
                        <span class="badge badge-info badge-pill">20</span>
                        فعال
                     </button>
                    <button class="btn btn-sm btn-light ml-1">
                        <span class="badge badge-danger badge-pill">80</span>
                        غیرفعال
                    </button>
                    <button class="btn btn-sm btn-secondary">
                        <span class="badge badge-pill bg-light">100</span>
                        همه
                    </button>
    
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
                              <th> عنوان پیام</th>
                              <th>متن پیام</th>
                              <th>وضعیت</th>
                              <th>عملیات</th>
                        </tr>
                      </thead>
                        <tbody>
                            @if ($alerts->isNotEmpty())
                                    @foreach ($alerts as $alert)
                                            <tr>
                                                <td>
                                                  <div class="check-input">
                                                    <input wire:click="addAlertTocompany({{$alert->id}})" type="checkbox" class="checkbox">
                                                </div>
                                                </td>
                                            <td>{{$alert->title}}</td>
                                            <td>{{$alert->message}}</td>
                                                <td>
                                                    <label class="switch switch-icon switch-primary switch-pill form-control-label">
                                                                <input type="checkbox" class="switch-input form-check-input" value="on" checked="">
                                                                <span class="switch-label"></span>
                                                                <span class="switch-handle"></span>
                                                            </label>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success" style="cursor: pointer" wire:click="edit({{$alert->id}})"><i class="fa fa-edit"></i></span>
                                                        <span type="button" class="badge badge-danger" style="cursor: pointer" wire:click="deleteAlert({{$alert->id}})">
                                                        <i class="fa fa-trash"></i>
                                                        </span>
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

