<x-layout>
    @include('posts.header')

    @if( $posts->count() )
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <x-post-featured-card :post="$posts[0]"></x-post-featured-card>

            @if( $posts->count() > 1 )
                <x-posts-grid :posts="$posts"></x-posts-grid>

                {{ $posts->links() }}
            @endif
        </main>

    @else
        <p class="text-center m-20">No post yet, please check back later</p>
    @endif


</x-layout>


