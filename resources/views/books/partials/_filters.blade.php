<div class="filter-group">
    @foreach (['free' => 'Free', 'premium' => 'Premium'] as $value => $name)
    <p>
        <a
            href="{{ route('books.index', array_merge(request()->query(), ['access' => $value])) }}" 
            class="{{ request('access') === $value ? ' active' : '' }}">
            {{ $name }}
        </a>
    </p>
    @endforeach
        <p><a href="#" class="list-group-item">PHP</a></p>
    
</div>
