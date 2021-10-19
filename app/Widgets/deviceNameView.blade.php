<?php

$devices=$data[0];

// return "ok";
?>
 
                                                <label for="package_name">انتخاب دستگاه</label>
                                                    <select wire:model.defer="state.device_name" class="form-control @error('device_name') is_invalid @enderror">
                                                        @if (count($devices)>0)
                                                            @foreach ($devices as $key=>$value)
                                                                  <option {{$state['device_name']==$key ?'selected':''}} value={{$key}}>{{$value}}</option>
                                                            @endforeach 
                                                        @else
                                                            <option value=0>موردی یافت نشد</option>
                                                        @endif
                                                    </select>
                                                    @error('device_name')<div class="invalid-feedback"> {{$message}}</div>@enderror 