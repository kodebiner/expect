<?php namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $allowedFields = [
        'name', 'image'
    ];

    protected $table      = 'clients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    

}