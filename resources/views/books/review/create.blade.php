@extends('layouts.app')

@section('content')
    <h1 class="mb_10 text-2*1"> Add review for ({{ $book->title }}) book</h1>

    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review" cols="30" rows="10" required class="input mb-4"></textarea>

        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="input mb-4" required>
            <option value="">Select Rating</option>
            @for($i =1; $i <= 5 ; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <button type="submit" class="btn">add your review</button>
    </form>
@endsection
