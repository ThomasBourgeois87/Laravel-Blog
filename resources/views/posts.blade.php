<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="{{ route('post', $post->slug)  }}">{{ $post->title }}</a>
            </h1>
            <p>By
                <a href="{{ route('authors_list', $post->author->username) }}">{{ $post->author->name }}</a>
                in <a href="{{ route('category_list', $post->category->slug) }}">{{ $post->category->name  }}</a>
            </p>
            <div>
                <p>{{ $post->body }}</p>
            </div>
        </article>
    @endforeach
</x-layout>
