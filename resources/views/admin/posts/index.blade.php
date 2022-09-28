<x-layout>

    <x-setting heading="Publish new Post">
        @if( count($posts) !== 0 )
            <table class="min-w-max w-full table-auto">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Post Title</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">

                    @foreach($posts as $post)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <a href="/post/{{ $post->slug }}" class="font-medium text-blue-500">{{ $post->title }}</a>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500">Edit</a>
                                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="ml-8 text-red-500">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <p>No posts created</p>
        @endif
    </x-setting>


</x-layout>
