<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('admin/pelanggan/index', $data);
    }

    public function create()
    {
        return view('admin/pelanggan/create');
    }


    public function store()
    {
        $this->pelangganModel->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
        ]);
        return redirect()->to('admin/pelanggan');
    }

    // Tambahkan metode edit dan delete
    public function edit($id)
    {
        $data['pelanggan'] = $this->pelangganModel->find($id);
        
        // Cek apakah pelanggan ditemukan
        // if (!$data['pelanggan']) {
        //     return redirect()->to('admin/pelanggan')->with('error', 'Pelanggan tidak ditemukan');
        // }

        return view('admin/pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
        ]);
        return redirect()->to('admin/pelanggan');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to('admin/pelanggan');
    }
}