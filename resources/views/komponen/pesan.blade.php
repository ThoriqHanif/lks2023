@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <ul>
                <li>{{ $item }}</li>
            </ul>
        @endforeach
    </div>
@endif

@if (session('response'))
    <div class="alert alert-success">
        {{ session('response') }}
    </div>
@endif