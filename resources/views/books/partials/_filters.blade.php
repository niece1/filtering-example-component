<div class="filter-group">
    @if (count(array_intersect(array_keys(request()->query()), array_keys($mappings))))
    <p>
        <a href="{{ route('books.index') }}">Clear all filters</a>
    </p>
    @endif
    
    @foreach ($mappings as $key => $map)
    <div class="item">
    @foreach($map as $value => $name)
    <p class="{{ request($key) === $value ? ' active' : '' }}">
        <!-- Merging current query with the key and value of the filter --> 
        <a
            href="{{ route('books.index', array_merge(request()->query(), [$key => $value])) }}">
            {{ $name }}
        </a>
    </p>
    @endforeach
    </div>
    @endforeach
        
    
</div>
