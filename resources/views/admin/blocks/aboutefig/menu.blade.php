<div class="btn-group">
    <a href="{{ route('efig#cover#block') }}" class="btn btn-primary">Cover</a>
    <a href="{{ route('new#efig#block') }}" class="btn btn-primary">New Block</a>
    <a href="{{ route('efig#block') }}" class="btn btn-primary">Block List</a>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('deativated#list#efig#block') }}">Deactivated Block List</a>
    </div>
</div>
