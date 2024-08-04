@extends('layouts.app')

@section('content')

    <h1 class="mb-10 text-2x1"> Books </h1>

    <form method="GET" action="{{ route('books.index') }}" class="mb-10 flex items-center space-x-2">
        <input type="text" name="title" class="input" placeholder="search by title" value="{{ request('title') }}">

        <input type="hidden" name="filter" value="{{ request('filter') }}">

        <button type="submit" class="btn">Search</button>
        <a href="{{ route('books.index') }}" class="btn">Clear</a>
    </form>


    <div class="filter-container mb-4 flex">
        @php
            $filters = [
                ''=>'Latest',
                'popular_last_month'=>'Popular Last Month',
                'popular_last_6months'=>'Popular Last 6 Months',
                'highest_last_month'=>'Highest Rated Last Month',
                'highest_last_6months'=>'Highest Rated Last 6 Months'
            ];
        @endphp

        @foreach($filters as $key => $value)
            <a href="{{ route('books.index', [...request()->query(),'filter' => $key]) }}" class="{{ request('filter') === $key || (request('filter') == null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
                {{ $value }}
            </a>
        @endforeach
    </div>


    <u1>
        @forelse($books as $book)
            <li class="mb-4">
                <div class="book-item">
                    <div
                        class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto">
                            <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                            <span class="book-author">by {{ $book->author }}</span>
                        </div>
                        <div>
                            <div class="book-rating">
                                <x-star-rating :rating="$book->reviews_avg_rating"/>
                            </div>
                            <div class="book-review-count">
                                out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">No books found</p>
                    <a href="{{ route('books.index') }}" class="reset-link">Reset page</a>
                </div>
            </li>
        @endforelse
    </u1>
@endsection
