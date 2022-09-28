<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
           'posts' => Post::paginate(50),
        ]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store() {
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = \Str::slug(request('title'));
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);


        return redirect('/')->with('success', 'Your post was created!');
    }


    public function edit(Post $post)
    {
        return view('admin/posts/edit', ['post' => $post]);
    }


    public function update(Post $post)
    {
        $attributes = $this->validatePost();

        if( isset($attributes['title']) ) {
            $attributes['slug'] = \Str::slug(request('title'));
        }

        if( isset($attributes['thumbnail']) ) {
            if(Storage::exists($post->thumbnail)){
                Storage::delete($post->thumbnail);
            } else{
                return abort('404');
            }

            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }


       $post->update($attributes);


        return redirect('/admin/posts')->with('success', 'Post updated');
    }


    public function destroy(Post $post) {
        if(Storage::exists($post->thumbnail)){
            Storage::delete($post->thumbnail);
        } else{
            return abort('404');
        }

        $post->delete();

        return redirect('/admin/posts')->with('success', 'Post ' . $post->title . ' deleted');
    }


    private function validatePost(?Post $post = null) {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'slug' => [Rule::unique('posts', 'slug')->ignore($post)],
            'category_id' => [Rule::exists('categories', 'id')],
        ]);
    }
}
