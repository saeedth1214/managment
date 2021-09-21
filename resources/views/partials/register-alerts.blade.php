<div class="row">
        <div class="col-md-12">
            @if (session()->has('userRegistredSuccess'))
                <div class="alert alert-success">
                    {{ session('userRegistredSuccess') }}
                </div>
            @endif
            @if (session()->has('userRegistredFailed'))
                <div class="alert alert-danger">
                    {{ session('userRegistredFailed') }}
                </div>
            @endif
        </div>
    </div>