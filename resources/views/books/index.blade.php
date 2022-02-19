<!-- Layout -->
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    
    <!-- Book list widget -->   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="books">
                        <div class="filters">
                            @include('books.partials._filters')
                        </div>
                        <!-- Book list -->
                        <div class="books-list">
                            @forelse ($books as $book)
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="http://via.placeholder.com/64x64&text=..." alt="{{ $book->name }}">
                                    </a>
                                    <div class="book-content">
                                        <h5>{{ $book->name }}</h5>
                                        @if ($book->subjects->count())
                                        @foreach ($book->subjects as $subject)
                                        <small class="subject">{{ $subject->name }}</small>
                                        @endforeach
                                        @endif
                                        <small>{{ $book->formattedDifficulty }}</small>
                                        <small>{{ $book->formattedAccess }}</small>
                                        <small>{{ $book->formattedType }}</small>
                                        <small>{{ $book->formattedStarted }}</small>
                                    </div>
                                </li>
                            </ul>
                            @empty
                            <h3>No books found.</h3>
                            @endforelse
                            <div class="pagination-holder">
                                {{ $books->appends(request()->query())->links() }}
                            </div>
                        </div>
                        <!-- /.Book list -->
                    </div>
                    <!-- /.Books -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.Book list widget -->

</x-app-layout>
<!-- /.Layout -->
