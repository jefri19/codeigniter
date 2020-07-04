<?php

class Mahasiswa extends CI_Controller{
    public function index()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampil_data()->
        result();
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa', $data);
		$this->load->view('templates/footer');
    }

    public function tambah_aksi(){
        $data = [
            'nama'     =>$this->input->post('nama'),
            'nim'      =>$this->input->post('nim'),
            'tgl_lahir'=>$this->input->post('tgl_lahir'),
            'jurusan'  =>$this->input->post('jurusan'),
            'alamat'   =>$this->input->post('alamat'),
            'email'    =>$this->input->post('email'),
            'no_telpon'=>$this->input->post('no_telpon'), 
            'foto'     =>$this->input->post('foto'),

        ];

        $foto   = $_FILES['foto'];
        if($foto=''){} else{
            $config['upload_path']    = './assets/foto';
            $config['allowed_tyeps']  = 'JPG|jpg|png|gif';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto')){
                $error= [
                    'error' => $this->upload->display_errors()
                ];
                echo "Upload Gagal ". $error['error']; die();
            }else{ 
                $foto = $this->upload->data('file_name');           }
        }
        
        $this->m_mahasiswa->input_data($data,'tb_mahasiswa');
        redirect('mahasiswa/index');   
    }

   

    public function hapus ($id)
    {
        $where = ['id' => $id];
        $this->m_mahasiswa->hapus_data($where, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function edit ($id)
    {
        $where = ['id' => $id];
        $data ['mahasiswa'] = $this->m_mahasiswa->edit_data($where, 'tb_mahasiswa')->result();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit', $data);
        $this->load->view('templates/footer');
           
    }

    public function update(){
        $id        = $this->input->post('id');
        $nama      = $this->input->post('nama');
        $nim       = $this->input->post('nim');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jurusan   = $this->input->post('jurusan');
        $alamat    = $this->input->post('alamat');
        $email     = $this->input->post('email');
        $no_telpon = $this->input->post('no_telpon');

        $data = [
            'nama'     => $nama,
            'nim'      => $nim,
            'tgl_lahir'=> $tgl_lahir,
            'jurusan'  => $jurusan,
            'alamat'   => $alamat,
            'email'    => $email,
            'no_telpon'=> $no_telpon,
        ];

        $where = [
            'id' => $id
        ];

        $this->m_mahasiswa->update_data($where,$data,'tb_mahasiswa');
        redirect('mahasiswa/index');
    }

    public function detail($id){
        $this->load->model('m_mahasiswa');
        $detail = $this->m_mahasiswa->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }
}

?>