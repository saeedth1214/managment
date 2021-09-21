

<div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">مدیریت کاربران</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">
                     <button type="submit" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#userRegistred">
                          <i class="fa fa-plus"></i>
                          افزودن
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
                              <th>ردیف</th>
                              <th>نام کاربر</th>
                              <th>نام شرکت</th>
                              <th>وضعیت</th>
                              <th>ایمیل</th>
                              <th>تلفن </th>
                              <th>موبایل</th>
                              <th>ادرس</th>
                              <th>عملیات</th>
                        </tr>
                      </thead>
                   <tbody>

                    @if ($users->count() > 0)
                                                
                         @foreach ($users as $user)
                                <tr>
                                      <td>{{$user->id}}</td>
                                      <td>{{$user->full_name}}</td>
                                      <td>{{$user->company_name}}</td>
                                      <td>
                                        @if ($user->active)
                                                <span class="badge badge-success">فعال</span>
                                        @else 
                                                <span class="badge badge-danger">غیرفعال</span>
                                        @endif
                                      </td>
                                      <td>{{$user->email}}</td>
                                      <td>{{$user->phone}}</td>
                                      <td>{{$user->mobile}}</td>
                                      <td>{{$user->address}}</td>
                                      <td>
                                        <span class="badge badge-success" style="cursor: pointer" wire:click="edit({{$user->id}})"><i class="fa fa-edit"></i></span>
                                        <span type="button" class="badge badge-danger" style="cursor: pointer" wire:click="deleteConfrimed({{$user->id}})">
                                          <i class="fa fa-trash"></i>
                                        </span>
                                      </td>
                                </tr>    
                         @endforeach

                  
                         @else

                         <tr>

                          <td>
                            <span>موردی یافت نشد</span>
                          </td>
                         </tr>
                    @endif


                  </tbody>
                    </table>
                 </div>
              <!-- /.card-body -->

          
               <div>
              </div>
              
            </div>
{{-- //modal --}}

   @if ($users->count() > 0 )
          {{$users->links('pagination-links')}}
   @endif
              
       <livewire:admin.post-form/>     
              
 
