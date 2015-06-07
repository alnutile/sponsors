<div class="row clearfix">
    <div class="col-md-4 column">

    </div>

    <div class="col-md-4 column">
        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if(Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="col-md-4 column">

    </div>
</div>
