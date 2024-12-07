<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class ProdukController extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('admin/produk/index', $data); // Lokasi view pada folder admin/produk
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/produk/create', $data); // Lokasi view pada folder admin/produk
    }

    // Menyimpan produk baru
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'kategori_produk' => 'required',
            'harga' => 'required|decimal',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data produk
        $this->produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id);
        if (!$data['produk']) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin/produk/edit', $data); // Lokasi view pada folder admin/produk
    }

    // Memperbarui data produk
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_produk' => 'required|min_length[3]',
            'kategori_produk' => 'required',
            'harga' => 'required|decimal',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Perbarui data produk
        $this->produkModel->update($id, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_produk' => $this->request->getPost('kategori_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('admin/produk')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk
    public function delete($id)
    {
        $produk = $this->produkModel->find($id);
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $this->produkModel->delete($id);
        return redirect()->to('admin/produk')->with('success', 'Produk berhasil dihapus');
    }
}
