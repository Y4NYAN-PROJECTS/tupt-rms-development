<?php

namespace App\Models;

use CodeIgniter\Model;

class ThesisModel extends Model
{
    protected $table = 'tbl_thesis';
    protected $primaryKey = 'thesis_code';
    protected $returnType = 'array';

    protected $allowedFields = [
        'thesis_title',
        'thesis_date',
        'agenda_id',
        'members',
        'program_id',
        'department_id',
        'file_path'
    ];

    protected $validationRules = [
        'thesis_title' => 'required|min_length[3]',
        'thesis_date' => 'required|valid_date',
    ];

    public function getTheses($departmentId = null, $searchTerm = '', $limit = 10, $offset = 0)
    {
        $builder = $this->builder();
        $builder->select('thesis_code, thesis_title, thesis_date, department_id')
            ->join('tbl_agenda', 'tbl_thesis.agenda_id = tbl_agenda.agenda_code', 'left');

        if ($departmentId !== null) {
            $builder->where('tbl_thesis.department_id', $departmentId);
        }

        if (!empty($searchTerm)) {
            $builder->like('thesis_title', $searchTerm);
        }

        $builder->orderBy('thesis_date', 'desc');
        $builder->limit($limit, $offset);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getThesisByCode($thesisCode)
    {
        $builder = $this->builder();
        $builder->select('*')
            ->where('thesis_code', $thesisCode);

        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getThesesByDepartments(array $departmentIds)
    {
        $builder = $this->builder();
        $builder->select('thesis_code, thesis_title, department_id')
            ->whereIn('department_id', $departmentIds)
            ->orderBy('thesis_title', 'asc');

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function createThesis($data)
    {
        return $this->insert($data);
    }

    public function updateThesis($thesisCode, $data)
    {
        return $this->update($thesisCode, $data);
    }

    public function deleteThesis($thesisCode)
    {
        return $this->delete($thesisCode);
    }
}
