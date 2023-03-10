<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUnits extends Model
{
    protected $table = 'tb_satuan';

    public function rules() 
    {
        return [
            [
                'field' => 'id_satuan',
                'label' => 'id satuan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nama_satuan',
                'label' => 'nama satuan',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getAll() {
        $builder = $this->db->table($this->table);
        $query = $builder->get();

        return $query->getResultObject();
    }

    // protected $DBGroup          = 'default';
    // protected $table            = 'modelunits';
    // protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    // protected $allowedFields    = [];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}