<?php

class Dokumen_model extends CI_Model
{

    public function addProposal()
    {
        $data=[
            'role'=>$this->session->userdata('role'),
            'nama_kegiatan'=>$_POST['nama_kegiatan'],
            'tahun_akademik'=>$_POST['tahun_akademik_1'].'/'.$_POST['tahun_akademik_2'],
            'semester'=>$_POST['semester'],
            'lb_kegiatan'=>$_POST['lb_kegiatan'],
            'tujuan_kegiatan'=>$_POST['tujuan_kegiatan'],
            'harapan_kegiatan'=>$_POST['harapan_kegiatan'],
            'tgl_pelaksanaan'=>$_POST['tgl_pelaksanaan'],
            'tempat'=>$_POST['tempat'],
            'tot_anggaran'=>$_POST['tot_anggaran'],
            'tgl_pengajuan'=>$_POST['tgl_pengajuan']
        ];
        $this->db->insert('proposal',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getProposal()
    {
        return $this->db->get_where('proposal', ['role' => $this->session->userdata('role')])->result_array();
    }

    public function addLaporan()
    {
        $data=[
            'id_proposal'=>$_POST['id_proposal'],
            'lb_laporan'=>$_POST['lb_laporan'],
            'tujuan_laporan'=>$_POST['tujuan_laporan'],
            'lp_jln_kegiatan'=>$_POST['lp_jln_kegiatan'],
            'hasil_kegiatan'=>$_POST['hasil_kegiatan'],
            'kendala_kegiatan'=>$_POST['kendala_kegiatan'],
            'solusi_kegiatan'=>$_POST['solusi_kegiatan'],
            'kesimpulan'=>$_POST['kesimpulan'],
            'saran'=>$_POST['saran'],
            'tot_biaya'=>$_POST['tot_biaya'],
            'tgl_pengajuan_lp'=>$_POST['tgl_pengajuan_lp']
        ];
        $this->db->insert('laporan',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getLaporan()
    {
        return $this->db->get('Laporan')->result_array();
    }

    public function getProposalID($id)
    {
        return $this->db->get_where('proposal',['id_proposal'=> $id])->result_array();
    }

    public function getArsipLaporanID($id)
    {
        return $this->db->get_where('trans_doc',['code_id'=> 'proposal_'.$id])->result_array();
    }

    public function deleteSingleDoc($id)
    {
        $this->db->delete('trans_doc',['id_trans_doc'=>$id]);
        return $this->db->affected_rows();
    }

    public function deleteProposal($id)
    {
        $this->db->delete('proposal',['id_proposal'=>$id]);
        return $this->db->affected_rows();
    }

    public function getLaporanID($id)
    {
        return $this->db->get_where('laporan',['id_laporan'=> $id])->result_array();
    }


}