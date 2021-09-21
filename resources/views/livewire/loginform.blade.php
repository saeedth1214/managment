<div>


    @include('partials.login-alerts')
    @include('partials.register-alerts')
    
    @if($registerUser)
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Name :</label>
                        <input type="text" wire:model="fullname" class="form-control">
                        @error('fullname') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Name :</label>
                        <input type="text" wire:model="companyName" class="form-control">
                        @error('companyName') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone :</label>
                        <input type="text" wire:model="phone" class="form-control">
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mobile :</label>
                        <input type="text" wire:model="mobilePhone" class="form-control">
                        @error('mobilePhone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Confirm Password :</label>
                        <input type="password" wire:model="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button class="btn text-white btn-success" wire:click.prevent="registerStore">Register</button>
                </div>
                <div class="col-md-12">
                    <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
                </div>
            </div>
        </form>
    @else
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn text-white btn-success" wire:click.prevent="login">Login</button>
                </div>
                <div class="col-md-12">
                    Don't have account? <a class="btn btn-primary text-white" wire:click.prevent="register"><strong>Register Here</strong></a>
                </div>
            </div>
        </form>
    @endif
</div>