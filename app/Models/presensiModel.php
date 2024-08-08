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

}