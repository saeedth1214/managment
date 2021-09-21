
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">مثال ساده</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form wire:submit.prevent="login">
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">آدرس ایمیل</label>
                    <input type="text" class="form-control" wire:model.lazy="email" placeholder="ایمیل را وارد کنید">
                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" wire:model.lazy="password" placeholder="پسورد را وارد کنید">
                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputFile">ارسال فایل</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">مرا بخاطر بسپار</label>
                  </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
            </div>

            </div>
        </div>
    </div>
