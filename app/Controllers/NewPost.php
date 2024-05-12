<?php
 
 namespace App\Controllers;
  
 use App\Controllers\BaseController;
 use App\Models\PostModel;
 use CodeIgniter\CLI\CLI;
 use CodeIgniter\Files\File;

 class NewPost extends BaseController
 {
    public function index()
    {
        $model = model(PostModel::class);

        $data = [
            'post_list' => $model->getTop5Post(),
            'title'     => 'Posts for you',
        ];

        return view('dashboard', $data);
    }
 
    public function new()
    {
        helper('form');

        return view('header').view('create', ['title' => 'Create a new Post']).view('footer');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['email', 'content', 'tags']);
        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'email' => 'required|valid_email|min_length[3]',
            'content'  => 'required|max_length[5000]|min_length[1]',
            'tags' => 'permit_empty|max_length[50]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }
        $post = $this->validator->getValidated();

        // $validationRule = [
        //     'post_image' => [
        //         'label' => 'Image File',
        //         'rules' => [
        //             'uploaded[userfile]',
        //             'is_image[userfile]',
        //             'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
        //         ],
        //     ],
        // ];
        // if (! $this->validateData([], $validationRule)) {
        //     $data = [
        //         'title' => "error posting",
        //         'errors' => $this->validator->getErrors()];
        //     return view('create', $data);
        // }
        $model = model(PostModel::class);
        $img = $this->request->getFile("post_image");
        
        // CLI::print("n".$img->getName());

        if ($img->getName() === "") {
            $model->save([
                'content'  => $post['content'],
                'email' => $post['email'],
                'tags' => $post['tags'],
            ]);

            return view('header').
            view('createsuccess', ['title' => 'Create a news item']).
            view('footer');
        }

        $imageName = $img->getRandomName(); 
        $filepath= $img->move(ROOTPATH.'public/assets/uploads/', $imageName);

        $model->save([
            'content'  => $post['content'],
            'email' => $post['email'],
            'tags' => $post['tags'],
            'image_path' => 'assets/uploads/'.$imageName,
        ]);

        return view('header').
            view('createsuccess', ['title' => 'Create a news item']).
            view('footer');
    }
 }