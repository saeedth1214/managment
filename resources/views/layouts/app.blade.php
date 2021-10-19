<!DOCTYPE html>
<html xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <livewire:styles/>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">خانه</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">تماس</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-comments-o"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    حسام موسوی
                                    <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">با من تماس بگیر لطفا...</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    پیمان احمدی
                                    <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">من پیامتو دریافت کردم</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    سارا وکیلی
                                    <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                                </h3>
                                <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                        <span class="float-left text-muted text-sm">12 ساعت</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                        <span class="float-left text-muted text-sm">2 روز</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">سعید سلطانی</a>
              </div>
            </div>

            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        {{-- <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    داشبوردها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>داشبورد اول</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>داشبورد دوم</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>داشبورد سوم</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a href={{route('admin.users')}} class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                     کاربران
                                    {{--<span class="right badge badge-danger">جدید</span>--}}
                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href={{route('admin.packages')}} class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                     پکیج ها
                                    {{--<span class="right badge badge-danger">جدید</span>--}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                        <a href="{{route('admin.companies')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                     شرکت ها
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                       
                        </li>
                          <li class="nav-item has-treeview">
                        <a href="{{route('admin.transactions')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                      تراکنش ها
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                       
                        </li>
                           <li class="nav-item has-treeview">
                        <a href="{{route('admin.alerts')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                      پیغام ها 
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                       
                        </li>
                         <li class="nav-item has-treeview">
                        <a href="{{route('admin.discounts')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                      تخفیف ها 
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                       
                        </li>
                           <li class="nav-item has-treeview">
                        <a href="{{route('admin.invoices')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                      صورتحساب 
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                        <a href="{{route('admin.devices')}}" class="nav-link">
                                <i class="nav-icon fa fa-pie-chart"></i>
                                <p>
                                      دستگاه ها 
                                    {{-- <i class="right fa fa-angle-left"></i> --}}
                                </p>
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->

    </aside>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">           
                    {{$slot}}
            </div>          
        </section>

    </div>
</div>
<!-- ./wrapper -->


<livewire:scripts/>

{{-- @stack('scripts') --}}
<script src={{ asset('js/app.js') }}></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="application/javascript"></script>
<script>


//  test rendering

    // let checkBoxs=document.querySelectorAll('.checkbox');
    // checkBoxs.forEach()

window.addEventListener('checkFalse',function(){

        $(".checkbox").prop("checked", false);
});

    window.addEventListener('swal:modal', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
    });
});



window.addEventListener('swal:companyAlertConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('cancelAlertsFromCompany');
        }
    })
});

window.addEventListener('swal:discountConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deleteConfimed',event.detail.data);
        }
    })
});
window.addEventListener('swal:alertConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deleteConfimed',event.detail.data);
        }
    })
});




window.addEventListener('swal:deviceConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deleteDeviecs');
        }
    })
});

window.addEventListener('swal:packageConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deletePackages');
        }
    })
});
window.addEventListener('swal:invoiceConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deleteInvoices');
        }
    })
});

window.addEventListener('swal:companyConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('deleteCompany');
        }
    })
});

window.addEventListener('swal:userConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('delete',event.detail.id);
        }
    })
});

window.addEventListener('swal:setAlertToCompanyConfrim', event => { 
    swal({
      title: event.detail.message,
      text: event.detail.text,
      icon: event.detail.type,
      buttons:true,
      dangerMode:true,
    }).then((willDelete)=>{
        if(willDelete){
            window.livewire.emit('createAlertToCompany');
        }
    })
});

$(".activeUser").on('change',function(){

let userId=$(this).attr('data-userId');
// alert(userId);

    window.livewire.emit('activeUser',userId);

});

$(".salary").on('change',function(){

// alert($(this).attr('data-packageId'));
    let packageId=$(this).attr('data-packageId');
    window.livewire.emit('activeSalary',packageId);

});

$(".activeCompany").on('change',function(){
    let companyId=$(this).attr('data-companyId');
    window.livewire.emit('activeCompany',companyId);            
});

$(".online").on('change',function(){

// alert($(this).attr('data-packageId'));
    let packageId=$(this).attr('data-packageId');
    window.livewire.emit('activeConnected',packageId);

});



$("#userRegistred").on("hidden.bs.modal", function () {

// alert('hidden modal');
   window.livewire.emit('resetState');
});



$("#displayAlert").on("hidden.bs.modal", function () {

   window.livewire.emit('resetFileds');
});


$("#packageManager").on("hidden.bs.modal", function () {

   window.livewire.emit('resetFileds');
});




window.addEventListener('show-modal', event => {
   $("#userRegistred").modal('show');
})

window.addEventListener('resetDatePickerInput', event => {
    $("#activationAtInput").val("");
    $("#expiresInput").val("");
    $("#lastRequestedAtInput").val("");
    $("#deliveredateInput").val("");
    $("#startInput").val("")
    $("#endAtInput").val("")
    // $("#select2").select2()

})



window.addEventListener('closePackage', event => {
   $("#packageManager").modal('hide');
})
window.addEventListener('updatePackage', event => {
   $("#packageManager").modal('show');
})
window.addEventListener('closemodal', event => {
   $("#userRegistred").modal('hide');
   $("#displayAlert").modal('hide');
})



$('#alertDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#alertDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true
});


$('#deviceDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#deviceDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true
});

$('#discountDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#discountDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true
});


$('#companyDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#companyDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true
});

$('#discountDatePicker').on('change',function(){
    let date=$(this).attr('data-discountDatePicker');
    eval(date).set('state.expires_at',$("#expiresInput").val());
});
$('#companyDatePicker').on('change',function(){

    let date=$(this).attr('data-companyDatePicker');
    eval(date).set('state.activation_at',$("#activationAtInput").val());
});

$('#deviceDatePicker').on('change',function(){

    let date=$(this).attr('data-deviceDatePicker');
    eval(date).set('state.last_request_at',$("#lastRequestedAtInput").val());
});
$('#alertDatePicker').on('change',function(){

    let date=$(this).attr('data-alertDatePicker');
    eval(date).set('state.delivered_at',$("#deliveredateInput").val());

});

$('#startDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#startDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true,
//   rangeSelector:true,
  fromDate:true,
  groupId:'daterange'

});

$('#startDatePicker').on('change',function(){

    let date=$(this).attr('data-startDatePicker');
    eval(date).set('state.start_at',$("#startInput").val());

});

$('#endDatePicker').MdPersianDateTimePicker({ 
  targetTextSelector: '#endDatePicker input',
  dateFormat:"Y/m/d",
  disableBeforeToday:true,
  toDate:true,
  groupId:'daterange'
});

$('#endDatePicker').on('change',function(){
    let date=$(this).attr('data-endDatePicker');
    eval(date).set('state.end_at',$("#endAtInput").val());
});


//    $('.select2').select2({
//         // theme:'classic',
//     });

    $('#form').submit(function(){
        let data=$("#select2").attr('data-selectedData');
        eval(data).set("state.package_ids",$("#select2").val());
    })

</script>
</body>
</html>
