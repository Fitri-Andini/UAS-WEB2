<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
class PostController extends Controller
{
    /**
     * Display a listening of the resource
     * 
     * @return View
     */

    public function index(): View
    {
        //get posts
        $post = Post::latest()->paginate(5);

        // Kirim data post ke view
        return view('posts.index', compact('post'));
    }
    public function generatedPDF() 
    {
        $post = Post::all();
        $pdf = PDF::loadView('post.pdf', compact('posts'));
        return $pdf->download('posts.pdf');
    }
   
    public function view($code): View
    {
        $post = Post::findOrFail($code);
        return view ('posts.view',compact('post'));
    }
    public function edit($code)
    {
        $post = Post::findOrFail($code);
        return view ('posts.edit', compact('post'));
    }  
    public function login(){
        return view ('posts.login');
    }
    public function add(){
        return view ('posts.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=> 'required|string|max:255',
            'content'=> 'required|string',
            'image'=> 'required|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
        ]);

        $post = new Post();
        $post->tittle = $validate['title'];
        $post->content = $validate['content'];

        if (array_key_exists('image', $validate)){
            $post->image =$validate['image']->store('images', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('success','Post created succesfully.');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title'=> 'required|string|max:255',
            'content'=> 'required|string',
            'image'=> 'nullable|file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048'
        ]);
        $post = Post::findOrFail($id);
        $post->tittle = $validate['title'];
        $post->content = $validate['content'];

        if ($request->hasFile('image')){
            // Delete the old image
            if (($post->image)){
                //Menggunakan Storage facade
                Storage::delete('public/' . $post->image);

                // Alternatif dengan File facade
                // File::delete(storage_path('app/public/' . $post->image));
            }
            $post->image = $request->file('image')->store('images','public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('success','Post created succesfully.');

    }
    public function destroy($id){
    $post = Post::findOrFail($id);

    if ($post->image){
        Storage::disk('public')->delete($post->image);
    }
    $post->delete();

    return redirect()->route('post.index')->with('success','Post deleted successfully.');
    }
}