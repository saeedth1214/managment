                                        <?php

$status=$data[0];
$db_status=$data[1];
// dd($db_status);
                                        ?>
                                        <div class="form-group">
                                                    <label for="db_status">وضعیت دیتابیس</label>
                                                    <select class="form-control @error('db_status') is-invalid @enderror " wire:model.defer="state.db_status">
                                                        @foreach ($status as $key=>$value)
                                                        <option {{ $key==$db_status?"selected":"" }} value={{$key}}>{{$value}}</option>
                                                        @endforeach
                                                    </select>     
                                                        @error('db_status')<div class="invalid-feedback" style="display: block"> {{$message}}</div>@enderror 
                                        </div>
