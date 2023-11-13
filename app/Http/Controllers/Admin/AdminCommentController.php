<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Products - PCMaker';
        $viewData['products'] = Comment::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $newComment = new Comment();
        $newComment->setId($request->input('id'));
        $newComment->setText($request->input('text'));
        $newComment->setProductId($request->input('productId'));
        $newComment->setProduct($request->input('product'));
        $newComment->setUserId($request->input('userId'));
        $newComment->setUser($request->input('user'));
        $newComment->save();

        return back();
    }

    public function update(Request $request, int $id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->setId($request->input('id'));
            $comment->setText($request->input('text'));
            $comment->setProductId($request->input('productId'));
            $comment->setProduct($request->input('product'));
            $comment->setUserId($request->input('userId'));
            $comment->setUser($request->input('user'));
            $comment->save();

            return redirect()->route('admin.comment.index');
        }

        return back()->withErrors('comment not found');
    }

    public function destroy(int $id)
    {
        Comment::destroy($id);
        return redirect()->route('admin.comment.index');
    }
}
