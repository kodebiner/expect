<?php namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $allowedFields = [
        'cat_id', 'name'
    ];

    protected $table      = 'agenda';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    

}