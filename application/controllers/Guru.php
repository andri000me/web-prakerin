<?php

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "guru") {
            redirect(base_url("login"));
        }
    }

    public function index($offset = 0)
    {
        $key                        = $this->input->post('caro');
        $kepo                       = $this->db->get('tb_tempat_siswa');
        $config['total_rows']       = $kepo->num_rows();
        $config['base_url']         = base_url() . 'guru/index';
        $config['per_page']         = 3;

        $config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
        $config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
        $config['next_link']        = '<i class="fa fa-angle-right"></i>
		<span class="sr-only">Next</span>';
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>
		<span class="sr-only">Previous</span>';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';


        $this->pagination->initialize($config);
        $data['halaman']            = $this->pagination->create_links();
        $data['offset']             = $offset;
        $data['guru']               = $this->m_guru->fullget($key, $config['per_page'], $offset);

        $this->load->view('guru/header');
        $this->load->view('guru/sidebar');
        $this->load->view('guru/content', $data);
        $this->load->view('guru/footer');
    }

    public function komentar($id)
    {
        $dimana             = array('id_siswa' => $id);
        $data['komentar']   = $this->m_guru->getKomen($dimana);

        $this->load->view('guru/header');
        $this->load->view('guru/sidebar');
        $this->load->view('guru/komentar', $data);
        $this->load->view('guru/footer');
    }

    public function addKomen()
    {
        $siswa          = $this->input->post('id');
        $guru           = $this->input->post('guru');
        $perusahaan     = $this->input->post('perusahaan');
        $pimpinan       = $this->input->post('pimpinan');
        $alamat         = $this->input->post('alamat');
        $kejadian       = $this->input->post('kejadian');
        $keterangan     = $this->input->post('keterangan');
        $rekomendasi    = $this->input->post('rekomendasi');

        $data           = array(
            'id_siswa'          => $siswa,
            'id_guru'           => $guru,
            'kejadian'          => $kejadian,
            'nama_perusahaan'   => $perusahaan,
            'keterangan'        => $keterangan,
            'rekomendasi'       => $rekomendasi,
        );

        $this->m_guru->insert('tb_monitoring', $data);
        $this->session->set_flashdata('pesan', 'Pesan anda telah tersampaikan ke admin');
        redirect('guru');
    }
    public function kejadian()
    {
        $key                = $this->input->post('caro');
        $data['kejadian']   = $this->m_guru->cari($key);

        $this->load->view('guru/header');
        $this->load->view('guru/sidebar');
        $this->load->view('guru/kejadian/index', $data);
        $this->load->view('guru/footer');
    }
}
