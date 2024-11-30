<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $allowedFields = [
        'title', 'slug', 'content', 'images', 'description', 'featured', 'highlight', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected $table      = 'blog';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';


}