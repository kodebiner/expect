<?php namespace App\Models;

use CodeIgniter\Model;

class AgendaCategoryModel extends Model
{
    protected $allowedFields = [
        'name'
    ];

    protected $table      = 'agenda_cat';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    

}