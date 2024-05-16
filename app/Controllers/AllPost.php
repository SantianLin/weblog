<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\PostModel;

class AllPost extends BaseController
{
    public function index(int $page = 1)
    {
        $model = model(PostModel::class);

        $posts = $model->getPostByDiv($page);
        
        if ($posts[0] === 0) {
            $data = [
                'post_list' => $posts[1],
                'title' => 'Invalid page number',
                'number_of_page'  => $posts[0],
                'current'  =>  $page,
            ];
            return view('header', ['nav' => 2]).
            view('allpost', $data).
            view('footer');
        }

        $data = [
            'post_list' => $posts[1],
            'title'     => 'All Posts here',
            'number_of_page'  => $posts[0],
            'current'  =>  $page,
        ];

        return view('header', ['nav' => 2]).
            view('allpost', $data).
            view('footer');
    }
}