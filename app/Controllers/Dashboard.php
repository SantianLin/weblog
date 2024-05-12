<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\PostModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = model(PostModel::class);

        $data = [
            'post_list' => $model->getTop5Post(),
            'title'     => 'Posts for you',
        ];
        return view('header').
            view('dashboard', $data).
            view('footer');

    }
}