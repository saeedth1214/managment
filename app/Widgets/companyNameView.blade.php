 <?php

$companies=$data[0];
// dd($companies);
 ?>
 
                                                <label for="company_name">انتخاب شرکت</label>
                                                    <select class="form-control @error('company_name') is_invalid @enderror">
                                                        @if ($companies->count() > 0)
                                                            @foreach ($companies as $key=>$value)
                                                           
                                                            <option wire:model.defer="state.company_name" value={{$key}}>{{$value}}</option>  
                                                            @endforeach
                                                        @else
                                                        <option value=0>موردی یافت نشد</option>
                                                        @endif
                                                    </select>
                                                      @error('company_name')<div class="invalid-feedback"> {{$message}}</div>@enderror 