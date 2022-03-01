<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin#dashboard') }}">Home</a></li>
    @php
        $last = '';
    @endphp

    @foreach (explode('/', Request::path()) as $item)
        @if ($last != 'edit' and $last != 'show' and $last != 'add-assignee')
            <li class="breadcrumb-item text-capitalize active">{{ $item }}</li>
        @endif

        @php
            $last = $item;
        @endphp
    @endforeach
</ol>
