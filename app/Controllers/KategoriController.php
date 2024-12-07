<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    // Method untuk menampilkan daftar kategori
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/kategori/index', $data); // Lokasi view sesuai dengan namespace admin
    }

    // Method untuk menyimpan kategori
    public function store()
    {
        // Validasi input
        // if (!$this->validate([
        //     'nama_kategori' => 'required|min_length[3]',
        // ])) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        // Simpan data
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('admin/kategori')->with('success', 'Kategori berhasil ditambahkan'); // Konsisten dengan rute
    }

    // Method untuk menampilkan form edit kategori
    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);
        if (!$data['kategori']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('admin/kategori/edit', $data); // Sesuaikan dengan struktur folder view
    }

    // Method untuk memperbarui kategori
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_kategori' => 'required|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->to('admin/kategori')->with('success', 'Kategori berhasil diperbarui'); // Konsisten dengan rute
    }

    // Method untuk menghapus kategori
    public function delete($id)
    {
        if (!$this->kategoriModel->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil dihapus'); // Konsisten dengan rute
    }
}