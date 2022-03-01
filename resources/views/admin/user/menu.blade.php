<div class="btn-group">
    <a href="{{ route('new#user') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> New</a>
    <a href="#" class="btn btn-primary"><i class="fas fa-file-import"></i> Import</a>
    <a href="{{ route('user#list') }}" class="btn btn-primary"><i class="fas fa-th-list"></i> List</a>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('deactivated#user#list') }}">Deactivated List</a>
    </div>
</div>
