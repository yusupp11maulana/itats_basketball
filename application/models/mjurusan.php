<?php
class mjurusan extends CI_model{
    public function viewJur(){
        return $this->db->get('jurusan')->result_array();
    }
    function auto(){
        $query = mysql_query("SELECT MAX(id_jur) as kode FROM jurusan");
        $panggil = mysql_fetch_array($query);
        $kodenya = $panggil['kode'];
        $urutan = (int) substr($kodenya, 2,2);
        $urutan++;
        $simbol = "J";
        $kodenya = $simbol . sprintf("%02s",$urutan);
        return $kodenya;
    }

    function addJur()
    {
        $data = array(
            "id_jur" => $this->input->post('kj',true),
            "nama_jur" => $this->input->post('nj',true),
            "kelas" => $this->input->post('kelas',true),
        );

        $this->db->insert('jurusan',$data);
    }

    function upJur()
    {
        $data = array(
            "nama_jur" => $this->input->post('nj',true),
            "kelas" => $this->input->post('kelas',true),
        );
        $this->db->where('id_jur',$this->input->post('kj'));
        $this->db->update('jurusan',$data);
    }

    function delJur($id)
    {
        $this->db->where('id_jur',$id);
        $this->db->delete('jurusan');
    }
}
?>