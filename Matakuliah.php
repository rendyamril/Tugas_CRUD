<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
    protected $mkModel;

    public function __construct()
    {
        $this->mkModel = new MatakuliahModel();
    }

    // Tampil Data
    public function index()
    {
        $data = [
            'title' => 'Daftar Mata Kuliah',
            'matakuliah' => $this->mkModel->findAll()
        ];
        return view('matakuliah/index', $data);
    }

    // Form Tambah
    public function create()
    {
        session(); // Memanggil session untuk mengambil flashdata/error
        $data = [
            'title' => 'Tambah Mata Kuliah',
            'validation' => \Config\Services::validation()
        ];
        return view('matakuliah/create', $data);
    }

    // Simpan Data
    public function store()
    {
        // Validasi Form
        if (!$this->validate([
            'kode_mk' => [
                'rules' => 'required|is_unique[matakuliah.kode_mk]',
                'errors' => [
                    'required' => 'Kode MK wajib diisi.',
                    'is_unique' => 'Kode MK sudah terdaftar.'
                ]
            ],
            'nama_mk' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama MK wajib diisi.']
            ],
            'sks' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'SKS wajib diisi.',
                    'numeric' => 'SKS harus berupa angka.',
                    'greater_than' => 'SKS minimal 1.'
                ]
            ],
            'semester' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Semester wajib diisi.',
                    'numeric' => 'Semester harus berupa angka.'
                ]
            ]
        ])) {
            return redirect()->to('/matakuliah/tambah')->withInput();
        }

        $this->mkModel->insert([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
            'semester'=> $this->request->getPost('semester')
        ]);

        session()->setFlashdata('pesan', 'Data Mata Kuliah berhasil ditambahkan.');
        return redirect()->to('/matakuliah');
    }

    // Form Edit
    public function edit($kode_mk)
    {
        $data = [
            'title' => 'Edit Mata Kuliah',
            'validation' => \Config\Services::validation(),
            'mk' => $this->mkModel->find($kode_mk)
        ];
        return view('matakuliah/edit', $data);
    }

    // Update Data
    public function update($kode_mk)
    {
        // Validasi (Kecuali is_unique untuk kode_mk jika tidak diubah)
        if (!$this->validate([
            'nama_mk' => ['rules' => 'required', 'errors' => ['required' => 'Nama MK wajib diisi.']],
            'sks' => ['rules' => 'required|numeric', 'errors' => ['required' => 'SKS wajib diisi.', 'numeric' => 'SKS harus angka.']],
            'semester' => ['rules' => 'required|numeric', 'errors' => ['required' => 'Semester wajib diisi.', 'numeric' => 'Semester harus angka.']]
        ])) {
            return redirect()->to('/matakuliah/edit/' . $kode_mk)->withInput();
        }

        $this->mkModel->update($kode_mk, [
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
            'semester'=> $this->request->getPost('semester')
        ]);

        session()->setFlashdata('pesan', 'Data Mata Kuliah berhasil diubah.');
        return redirect()->to('/matakuliah');
    }

    // Hapus Data
    public function delete($kode_mk)
    {
        $this->mkModel->delete($kode_mk);
        session()->setFlashdata('pesan', 'Data Mata Kuliah berhasil dihapus.');
        return redirect()->to('/matakuliah');
    }
}