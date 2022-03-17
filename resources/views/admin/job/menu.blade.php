<div class="btn-group">
    <a href="{{ route('new#job') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> New</a>
    <a href="{{ route('job#list') }}" class="btn btn-primary"><i class="fas fa-th-list"></i> List</a>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('closed#job#list') }}">Closed Job List</a>
    </div>
</div>
