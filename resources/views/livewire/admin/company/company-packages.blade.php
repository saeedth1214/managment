@inject('dbStatus', 'App\Widgets\dbStatus')

<div class="row">
    {{-- {{-- <div class="header-component">
        <span>
            داشبورد
        </span>
        /
        <span class="bg-blue">
            مدیریت تخفیف ها
        </span>
    </div> --}}
          <div class="add-company">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <p>پکیج های فعال</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {{-- <div class="card mt-1"> --}}
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>نام شرکت</td>
                                        <td>{{$company->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>نام دیتابیس</td>
                                        <td>{{$company->database}}</td>
                                    </tr><tr>
                                        <td>وضعیت دیتابیس</td>
                                        <td>{!!$dbStatus->getTag($company->db_status)!!}</td>
                                    </tr>
                                    <tr>
                                        <td>وضعیت کلی</td>
                                        <td>{!!$dbStatus->getStatusTag($company->status)!!}</td>
                                    </tr>
                                    <tr>
                                        <td>تاریخ فعال سازی</td>
                                        <td>{{$company->activation_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    {{-- </div> --}}
                    <div class="col-md-6">
                       <table class="table table-bordered table-hover">

                        <tbody>
                            @if ($package)
                                
                            <tr>
                                <td>نام پکیچ</td>
                                <td>{{$package->package_name}}</td>
                            </tr>
                              <tr>
                                <td>نفرات</td>
                                <td>{{$package->persons}}</td>
                             </tr>
                              <tr>
                                <td>شیفت ها</td>
                                <td>{{$package->shifts}}</td>
                            </tr>
                             <tr>
                                <td>شیفت - گروه</td>
                                <td>{{$package->shifts}}</td>
                            </tr> <tr>
                                <td>ترافیک</td>
                                <td>{{$package->traffics}}</td>
                            </tr> 
                            <tr>
                                <td>حقوق ماهانه</td>
                                <td>{{number_format($package->max_salary_month)}} تومان</td>
                            </tr>
                            <tr>
                                <td>جایگاه ها</td>
                                <td>{{$package->locations}}</td>
                            </tr>
                            <tr>
                                <td>وضعیت حقوق</td>
                                <td>{!!$dbStatus->getStatusTag($package->access_salary) !!}</td>
                            </tr>
                             <tr>
                                <td>اتصال</td>
                                <td>{!!$dbStatus->getStatusTag($package->online_connect)!!}</td>
                            </tr>
                             <tr>
                                <td>قیمت</td>
                                <td>{{number_format($package->price)}} تومان</td>
                            </tr>
                              <tr>
                                <td>مدت زمان</td>
                                <td>{{$package->duration}} روز</td>
                            </tr>
                            <tr>
                                <td>مقدار شارژ</td>
                                <td>{{number_format($package->sms_charge)}} تومان</td>
                            </tr>
                            <tr>
                                <td>مقدار تخفیف</td>
                                <td>{{$package->discount}} درصد</td>
                            </tr>
                            @else
                            <tr>
                            <td> .در حال حاضر پکیج فعالی وجود ندارد. برای ثبت پکیج روی این <a href="{{route('admin.packages')}}">لینک</a> کلیک کنید</td>
                            </tr>
                            @endif


                        </tbody>

                       </table>
                    </div>
                </div>
    </div>
</div>

