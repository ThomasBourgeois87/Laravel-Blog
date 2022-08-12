<x-layout>
    <h1>{{ $post->title }}</h1>
    <p>
        By <a href="{{ route('authors_list', $post->author->username) }}">{{ $post->author->username }}</a>
        in <a href="{{ route('category_list', $post->category->slug) }}">{{ $post->category->name  }}</a>
    </p>
    <div>
        <p>{{ $post->body }}</p>
    </div>

    <a href="{{ route('homepage') }}">Go back</a>
</x-layout>
