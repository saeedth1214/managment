<div class="row">
        <div class="col-md-12">
            @if (session()->has('userLoggedInSuccess'))
                <div class="alert alert-success text-center">
                    {{ session('userLoggedInSuccess') }}
                </div>
            @endif
            @if (session()->has('userLoggedInFailed'))
                <div class="alert alert-danger text-center">
                    {{ session('userLoggedInFailed') }}
                </div>
            @endif
        </div>
    </div>