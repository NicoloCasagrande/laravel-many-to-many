<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $new_tag = new Tag();
        $new_tag->fill($data);
        $new_tag->slug = Str::slug($new_tag->name);
        $new_tag->save();

        return redirect()->route('admin.tags.index')->with('message', 'Il Tag è stato creato con successo !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = Post::all();
        return view('admin.tags.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->fill($data);
        $tag->slug = Str::slug($tag->name);
        $tag->update();

        return redirect()->route('admin.tags.index')->with('message', 'Il Tag è stato modificato con successo !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $old_title = $tag->name;
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('message', "Il Tag $old_title è stato cancellato");
    }
}
