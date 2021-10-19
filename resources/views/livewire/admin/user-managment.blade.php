
  {{-- <div  class="mt-3 bg-transparent">

    <button type="button" wire:click="deleteConfrimed(5)"> 
      new
    </button>
  </div> --}}
{{-- <?php


dd($users);

?> --}}

<div class="row">
  <div class="header-component">
        <span>
            داشبورد
        </span>
        <span>
            {{-- <i class="fa fa-arrow-left"></i> --}}
            /
        </span>
        <span class="bg-blue">
            مدیریت کاربران
        </span>
        
    </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="padding: 1.8rem 1.25rem">
                {{-- <h5 class="card-title">مدیریت کاربران</h5> --}}
                <div class="card-tools">
                  <div class="input-group input-group-sm w-300">
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

                    @if (count($users) > 0)
                                            
                         @foreach ($users as $key=>$user)
                                <tr>
                                      <td>{{$user['id']}}</td>
                                      <td>{{$user['full_name']}}</td>
                                      <td>{{$user['company_name']}}</td>
                                      <td>
                                               <label class="switch switch-icon switch-primary switch-pill form-control-label activeUser" data-userId="{{$user['id']}}" >
                                                      <input type="checkbox" class="switch-input form-check-input" {{$user['active']?'checked':''}} >
                                                      <span class="switch-label"></span>
                                                      <span class="switch-handle"></span>
                                                  </label>
                                      </td>
                                      <td>{{$user["email"]}}</td>
                                      <td>{{$user["phone"]}}</td>
                                      <td>{{$user["mobile"]}}</td>
                                      <td>{{$user["address"]}}</td>
                                      <td>
                                        <span class="badge badge-success" style="cursor: pointer" wire:click.prevent="edit({{$user['id']}})"><i class="fa fa-edit"></i></span>
                                        <span type="button" class="badge badge-danger" style="cursor: pointer" wire:click="deleteConfrimed({{$user['id']}})">
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
         @if (count($users) > 0 )
          {{-- {{$users->links('pagination-links')}} --}}
          {{-- {{$users->links()}} --}}
         @endif       
</div>
{{-- //modal --}}


          {{-- {{$users->links()}} --}}

 
              
   <livewire:admin.post-form/>              

 
