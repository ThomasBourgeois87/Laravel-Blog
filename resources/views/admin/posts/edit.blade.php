<x-layout>

    <x-setting :heading="'Edit post ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.textarea name="excerpt" :value="old('excerpt', $post->excerpt)" >
                {{ old('excerpt', $post->excerpt) }}
            </x-form.textarea>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"  />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mt-6 border">
            </div>

            <x-form.textarea name="body">
                {{ old('body', $post->body) }}
            </x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>


</x-layout>
