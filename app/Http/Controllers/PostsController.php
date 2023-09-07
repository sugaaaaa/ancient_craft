<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catecgory;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        
        $postcrud = Post::all();
        return view('admin/Post/post')->with('postcrud',$postcrud);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $catecgories = Catecgory::all();
        $tags =Tag::all();
        return view('admin/Post/newpost', ['catecgories'=>$catecgories, 'tags' => $tags]);

    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $nameImage = time().'.'.$request->image->extension();  
            $request->image->move(public_path('/images'), $nameImage);


            $postcruds = new Post([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'image' => $nameImage,
                'category'=> $request->get('category'),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
            ]);
            $postcruds->save();
            $postcruds->tags()->sync($request->tags);
            return redirect('admin/dashboard/Post/post')->with('flash_message', 'Added data sucesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {

        $postcrud =Post::find($id);
        return view('admin/Post/show', ['postcrud' => $postcrud]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $postcrud =Post::find($id);
        $tags =Tag::all();
        return view('admin/Post/edit', ['postcrud' => $postcrud, 'tags' => $tags]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
    
        $postcrud= Post::find($id);
        $postcrud->title = $request->get('title');
        $postcrud->content = $request->get('content');
        $postcrud->image = $request->get('image');
        // $postcrud->category -> $request->get('category');
        if($request->image !=''){
            $nameImage = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $nameImage);
            $postcrud->image = $nameImage;
        };

        $postcrud->save();
        $postcrud->tags()->sync($request->tags);
        return redirect('admin/dashboard/Post/post')->with('flash_message', 'Edit data succesfully!');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::destroy($id);
        return redirect('admin/dashboard/Post/post')->with('flash_message', 'Data Deleted!');
    }

    public function homepost(string $id):View
    {
        $postcrud =Post::find($id);
        return view('/productdetail')->with('postcrud',$postcrud);
    }

    public function homeall():View
    {
        $postcrud =Post::all();
        $catecgories = Catecgory::all();
        return view('/home')->with('postcrud',$postcrud)->with('catecgories',$catecgories);
    }

    //search
    public function search(Request $request)
{
    $query = $request->input('query');
    
    $results = Post::where('title', 'like', "%$query%")
                   ->orWhere('content', 'like', "%$query%")
                   ->get();

    return view('search_results', ['results' => $results]);
}
// public function search_admin(Request $request)
//     {
//         $searchTerm = $request->input('query');
        
//         // Perform a search in your database using the $searchTerm
//         $searchResults = Post::where('title', 'LIKE', '%' . $searchTerm . '%')
//                               ->orWhere('content', 'LIKE', '%' . $searchTerm . '%')
//                               ->get();
        
//         return view('admin.search_results', compact('searchResults'));
//     }
    
}
