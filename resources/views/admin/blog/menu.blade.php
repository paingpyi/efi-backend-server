<div class="btn-group">
    <a href="{{ route('new#blog') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> New</a>
    <a href="{{ route('blog#list') }}" class="btn btn-primary"><i class="fas fa-th-list"></i> List</a>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('unpublished#blog#list') }}">Unpublished List</a>
        <a class="dropdown-item" href="{{ route('drafted#blog#list') }}">Drafted List</a>
    </div>
</div>
