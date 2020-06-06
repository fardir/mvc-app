<?php

class Bukutamu extends Controller
{

    public function index()
    {
        $data['judul'] = 'Buku Tamu';
        $data['tamu'] = $this->model('Bukutamu_model')->getAllTamu();
        $this->view('templates/header', $data);
        $this->view('bukutamu/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['judul'] = 'Detail Tamu';
        $data['tamu'] = $this->model('Bukutamu_model')->getTamuById($id);
        $this->view('templates/header', $data);
        $this->view('bukutamu/detail', $data);
        $this->view('templates/footer');
    }
    
    public function tambah()
    {
        if( $this->model('Bukutamu_model')->tambahDataTamu($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan','success');
            header('Location: '.BASEURL.'/bukutamu');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan','danger');
            header('Location: '.BASEURL.'/bukutamu');
            exit;
        }
    }
    
    public function hapus($id)
    {
        if( $this->model('Bukutamu_model')->hapusDataTamu($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus','success');
            header('Location: '.BASEURL.'/bukutamu');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus','danger');
            header('Location: '.BASEURL.'/bukutamu');
            exit;
        }
    }
    
    public function getEdit()
    {
        echo json_encode($this->model('Bukutamu_model')->getTamuById($_POST['id']));
    }
    
    public function edit()
    {
        if ($this->model('Bukutamu_model')->editDataTamu($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/bukutamu');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/bukutamu');
            exit;
        }
    }
    
    
    public function cari()
    {
        $data['judul'] = 'Buku Tamu';
        $data['tamu'] = $this->model('Bukutamu_model')->cariDataTamu();
        $this->view('templates/header', $data);
        $this->view('bukutamu/index', $data);
        $this->view('templates/footer');
    }
}
