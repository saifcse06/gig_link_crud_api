<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;

class BlogsSingleActionController extends Controller
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
            // if validation success then create an input array
            $inputArray = array(
                'user_id' => $request->user()->id,
                'title' => $request->title,
                'body' => $request->body,
            );

            // add new blog
            $user = Blog::create($inputArray);

            // if blog success then return with success message
            if (!is_null($user)) {
                return response()->json([
                    'success' => 'You have added successfully.',
                    'blog' => $user
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
    public function update(Request $request, $id)
    {
        try {
            $user = Blog::findOrFail($id);
            $user->update($request->all());
            return response()->json([
                'success' => 'You have added successfully.',
                'blog' => $user
            ]);
        }catch (\Exception $exception){
            return response()->json(['success' => true,
                'message' => 'Whoops! some error encountered. Please try again.'], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            Blog::find($id)->delete();
        }catch (\Exception $exception){
            return response()->json(['success' => true,
                'message' => 'Whoops! some error encountered. Please try again.'], 204);
        }
    }
}
