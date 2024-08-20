<?php
namespace App\Models;
use CodeIgniter\Model;

class presensiModel extends Model{
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_magang',
        'status',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'foto',
        'kegiatan',
        'checkIn_latitude',
        'checkin_longitude', 
        'checkout_latitude', 
        'checkout_longitude'
    ];

    public function getPresensiUser($id_magang,$date=null, $limit=10, $offset =0){
        
       $builder =  $this->where('id_magang',$id_magang);

        if($date){
          $builder->where('tanggal',$date);
        }

        return $builder ->orderBy('tanggal','DESC')
                        ->limit($limit,$offset)
                        ->findAll();
    }

    public function getJumlahPresensi($id_magang, $tanggal = null){
        $builder = $this->where('id_magang', $id_magang);

        if($tanggal){
            $builder->where('tanggal', $tanggal);
        }

        return $builder->countAllResults();
    }

}