<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;

class BlogsBatchActionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $posts = json_decode($request->input('data', ''));
            $data = array();
            foreach ($posts as $post) {
                $data['user_id'] = $request->user()->id;
                $data['title'] = $post->title;
                $data['body'] = $post->body;
                $blog = \DB::table('blog')->insert($data);
            }
            if (!is_null($blog)) {
                return response()->json([
                    'success' => 'You have added successfully.',
                    'blog' => $blog
                ]);
            } // else return with error message
            else {
                return response()->json([
                    'success' => false,
                    'message' => 'Whoops! some error encountered. Please try again.'
                ], 500);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Whoops! some error encountered. Please try again.'
            ], 500);
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            return Blog::find($id);
        } catch (\Exception $exception) {
            return response()->json(['success' => true,
                'message' => 'Whoops! some error encountered. Please try again.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $ids)
    {
        try {
            $allIds = $myArray = explode(',', $ids);
            $posts = json_decode($request->input('data', ''));

            foreach ($posts as $post) {
                if (in_array($post->id, $allIds)) {
                    $blog = Blog::find($post->id);
                    $blog->title = $post->title;
                    $blog->body = $post->body;
                    $blog->save();
                }
            }

            return response()->json(['success' => true,
                'message' => 'Successfully Update'], 200);
        } catch (\Exception $exception) {
            return response()->json(['success' => true,
                'message' => 'Whoops! some error encountered. Please try again.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $ids
     * @return Response
     */
    public function destroy($ids)
    {
        try {
            $allIds = $myArray = explode(',', $ids);
            Blog::whereIn('id', $allIds)->delete();
            return response()->json(['success' => true,
                'message' => 'Successfully Delete'], 200);
        } catch (\Exception $exception) {
            return response()->json(['success' => true,
                'message' => 'Whoops! some error encountered. Please try again.'], 500);
        }

    }
}
