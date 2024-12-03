<?php namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $allowedFields = [
        'image'
    ];

    protected $table      = 'gallery';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    

}