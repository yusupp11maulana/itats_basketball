<?php
class mmember extends CI_model{
    public function viewMem(){
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('jurusan', 'jurusan.id_jur = registrasi.id_jur');
        $query = $this->db->get();
        return $query->result_array();
    }
    function auto(){
        $query = mysql_query("SELECT MAX(id_regist) as kode FROM registrasi");
        $panggil = mysql_fetch_array($query);
        $kodenya = $panggil['kode'];
        $urutan = (int) substr($kodenya, 3,3);
        $urutan++;
        $simbol = "ID";
        $kodenya = $simbol . sprintf("%02s",$urutan);
        return $kodenya;
    }

    function addMem($tanggal,$foto)
    {
        $data = array(
            "id_regist" => $this->input->post('idp',true),
            "npm" => $this->input->post('npm',true),
            "namamhs" => $this->input->post('nmmhs',true),
            "id_jur" => $this->input->post('jur',true),
            "tanggal" => $tanggal,
            "foto"=> $foto,
        );

        $this->db->insert('registrasi',$data);
    }

    function updateMem()
    {
        $data = array(
            "npm" => $this->input->post('npm',true),
            "namamhs" => $this->input->post('nmmhs',true),
            "id_jur" => $this->input->post('jur',true),
        );
        $this->db->where('id_regist',$this->input->post('idp'));
        $this->db->update('registrasi',$data);
    }

    function upFoto($foto)
    {
        $data = array(
            "foto"=> $foto,
        );
        $this->db->where('id_regist',$this->input->post('idp'));
        $this->db->update('registrasi',$data);
    }
}
?>