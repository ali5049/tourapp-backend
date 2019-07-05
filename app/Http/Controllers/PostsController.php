<?php

namespace tourApp-backend\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use tourApp-backend\Post;
class PostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::orderBy('created_at','desc')->with(['user'])->paginate(30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required',
            'price' => 'required|integer',
            'days' => 'required|integer',
            'departure' => 'required|date',
            
        ]);
    
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        
        if($request->hasFile('image')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }
        // create Post
        
      
        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->company = $request->input('company');
        $post->price = $request->input('price');
        $post->days = $request->input('days');
        $post->image = $fileNameToStore;
        $post->departure = $request->input('departure');
        $post->save();
    
        $response = ['success' => true,'post'=>$post];
    
        return response($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
