<?php

namespace App\Models;

use CodeIgniter\Model;

class AturanModel extends Model
{
    protected $table            = 'aturan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['penyakit_id', 'gejala_id', 'cf_pakar'];

    public function getAturanWithDetails()
    {
        return $this->select('aturan.id, penyakit.nama_penyakit, gejala.nama_gejala, aturan.cf_pakar')
                    ->join('penyakit', 'penyakit.id = aturan.penyakit_id')
                    ->join('gejala', 'gejala.id = aturan.gejala_id')
                    ->orderBy('penyakit.kode_penyakit', 'ASC')
                    ->findAll();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

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
}
