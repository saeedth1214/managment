
{{-- --}}
   
<div wire:ignore.self class="modal fade" id="displayAlert" tabindex="-1" role="dialog" aria-labelledby="displayAlertLable" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered alert-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="displayAlertLable">

        <span>پیام ها</span>
        {{-- @if ($updateUser)
        <span>ویرایش</span>
        @else
        <span>افزودن کاربر</span>
        @endif --}}
      </h5>
        <button type="button" class="close setnewMargin" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
             <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                       <tr>
                              <th></th>
                              <th> عنوان پیام</th>
                              <th>متن پیام</th>
                              {{-- <th>نام شرکت</th> --}}
                              <th>تاریخ فعال سازی</th>
                        </tr>
                      </thead>
                        <tbody>

                            @if ($alerts)
                                    @foreach ($alerts as $alert)
                                            <tr>
                                                <td>
                                                  <div class="check-input">
                                                    <input wire:click="cancelAlert({{$alert['id']}})" type="checkbox" class="checkbox">
                                                </div>
                                                </td>
                                            <td>{{$alert['title']}}</td>
                                            <td>{{$alert['message']}}</td>
                                            {{-- <td>{{$alert['pivot']['company_id']}}</td> --}}
                                            <td>{{$alert['delivered_at']}}</td>
                                        
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
                </div>
            </div>
             <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <button type="button" class="btn btn-sm btn-outline-info"  wire:click="cancelConfirmed">
                        لفو پیام
                    </button>
                </div>
            </div>
        </div>
          </div>
        </div>
  </div>
</div>
