@if (Session::has('success'))
    <div class="alert alert-success " role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-toggle="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger " role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="btn-close" data-toggle="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger " role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-toggle="alert" aria-label="Close"></button>
    </div>
@endif

