<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['content', 'email', 'tags', 'image_path'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPostByemail($email = false)
    {
        if ($email === false) {
            return $this->findAll();    // get all posts
        }

        return $this->where(['email' => $email]);    // get all posts belongs to $user
    }

    public function getPostByDiv(int $page = 1)
    {
        $posts = $this->findAll();    // get all posts
        $page_post_count = 5;
        $page_limit = ceil(count($posts) / $page_post_count);
        if (count($posts) == 0) {
            return array(1, []);
        }
        if ($page > $page_limit)
            return array(0, null);
        if (count($posts) <= $page_post_count) {
            return array(1, $posts);
        } else {
            return array(0, null);
        }
        {
            // assert $page <= $page_limit
            return array($page_limit, array_slice($posts, 0+ $page * $page_post_count, min($page_post_count + ($page * $page_post_count), count($posts)))) ;
        }
    }

    public function getTop5Post()
    {
        $posts = $this->findAll();    // get all posts
        
        if (count($posts) <= 5) {
            return $posts;
        } else 
        {
            return array_slice($posts, 0, 5);
        }

    }
}
