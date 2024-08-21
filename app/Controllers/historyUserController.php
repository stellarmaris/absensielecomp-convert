<?php

namespace App\Controllers;
use App\Models\presensiModel;
use App\Models\UserModel;

class historyUserController extends BaseController
{

    public function riwayat()
    {
    
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');


        $ModelPresensi= new presensiModel();
        
        $tanggal = $this->request->getGet('tanggal');
        $currentPage = $this->request->getGet('page') ?? 1;
        $perPage=2;

        $query = $ModelPresensi->where('id_magang',$userId);

        if ($tanggal) {
            $query = $query->where('tanggal', $tanggal);
        }

        $data['data_presensi'] = $query ->orderBy('tanggal','DESC')
                                        ->paginate($perPage,'presensi');

        $data['pager'] = $ModelPresensi->pager;

       $data['tanggal'] = $tanggal;
       $data['title'] = 'Riwayat';
       $data['currentPage'] = $currentPage;
       $data['perPage'] = $perPage;

       echo view ('riwayat',$data);

    //      // $data['data_presensi'] = $ModelPresensi->findAll();
    //     $data['data_presensi'] = $ModelPresensi->getPresensiUser($userId,$tanggal, $perPage,$offset);
        
    // //    $data['data_presensi'] = $ModelPresensi->where('id_magang',$userId)
    // //                             ->where('tanggal',$tanggal)
    // //                             ->findAll();
       
    //    $data['id_magang']= $userId;
    //     $data['tanggal'] = $tanggal;
    //     $data['title'] = 'Riwayat';
    //     $pager = \Config\Services::pager();
    //     $data['pager'] = $pager->makeLinks($page,$perPage, $total,'custom');
    //     echo view('riwayat', $data);
    }
    

  
}
