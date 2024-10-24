<?php

namespace App\Controllers;

class Sopir extends BaseController
{
    public function index()
    {
        $url = 'http://10.17.34:8080/sopir/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['sopir'] = json_decode($response->getBody(), true);

            return view('sopirView', $data);
        } catch (\Exception $e) {
            return view('sopirView', ['error' => $e->getMessage()]);
        }
    }

    public function tambahSopir()
    {
        return view('input-sopir');
    }
    public function sendData()
    {
        $data = [
            'id_sopir'      => $this->request->getPost('id_sopir'),
            'nik_sopir'     => $this->request->getPost('nik_sopir'),
            'nama_sopir'    => $this->request->getPost('nama_sopir'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'status_sopir'  => $this->request->getPost('status_sopir'),
            'tarif_per_hari'=> $this->request->getPost('tarif_per_hari')
        ];

        $url = 'https://10.10.17.34:8080/sopir/store';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('POST', $url, [
                'json' => $data,
                'verify' => false, // Nonaktifkan verifikasi SSL untuk pengujian
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->to('/sopir')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/sopir')->with('error', 'Gagal menyimpan data! Kode Status: ' . $response->getStatusCode());
            }
        } catch (CURLRequestException $e) {
            return redirect()->to('/sopir')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $url = 'https://10.10.17.34:8080/sopir/update/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url, [
                'verify' => false, // Nonaktifkan verifikasi SSL untuk pengujian
            ]);
            $data['sopir'] = json_decode($response->getBody(), true);

            if (!$data['sopir']) {
                return redirect()->to('/sopir')->with('error', 'Sopir tidak ditemukan.');
            }

            return view('edit-sopir', $data);
        } catch (CURLRequestException $e) {
            return view('edit-sopir', ['error' => $e->getMessage()]);
        }
    }

    public function editsopir()
    {
        $data = [
            'id_sopir'      => $this->request->getPost('id_sopir'),
            'nik_sopir'     => $this->request->getPost('nik_sopir'),
            'nama_sopir'    => $this->request->getPost('nama_sopir'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'status_sopir'  => $this->request->getPost('status_sopir'),
            'tarif_per_hari'=> $this->request->getPost('tarif_per_hari'),
        ];

        $url = 'https://10.10.17.34:8080/sopir/data/update/' . $this->request->getPost('id_sopir');
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('POST', $url, [
                'json' => $data,
                'verify' => false, // Nonaktifkan verifikasi SSL untuk pengujian
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->to('/sopir')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/sopir')->with('error', 'Gagal menyimpan data! Kode Status: ' . $response->getStatusCode());
            }
        } catch (CURLRequestException $e) {
            return redirect()->to('/sopir')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function hapus($id)
    {
        $url = 'https://10.10.17.34:8080/sopir/data/delete/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('DELETE', $url, [
                'verify' => false, // Nonaktifkan verifikasi SSL untuk pengujian
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->to('/sopir')->with('success', 'Pelanggan berhasil dihapus!');
            } else {
                $errorMessage = $response->getBody() ?: 'Gagal menghapus pengguna! Silakan coba lagi.';
                return redirect()->to('/sopir')->with('error', $errorMessage);
            }
        } catch (CURLRequestException $e) {
            return redirect()->to('/sopir')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}