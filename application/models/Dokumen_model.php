<?php

class Dokumen_model extends CI_Model
{
    // Proposal
    public function addProposal()
    {
        $data=[
            'id_user'=>$this->session->userdata('id_user'),
            'nama_kegiatan'=>$_POST['nama_kegiatan'],
            'tahun_akademik'=>$_POST['tahun_akademik_1'].' / '.$_POST['tahun_akademik_2'],
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
        return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
    }

    public function getProposalID($id)
    {
        return $this->db->get_where('proposal',['id_proposal'=> $id])->result_array();
    }

    public function getArsipProposalID($id)
    {
        return $this->db->get_where('trans_doc',['code_id'=> 'proposal_'.$id])->result_array();
    }

    public function deleteProposal($id)
    {
        $this->db->delete('proposal',['id_proposal'=>$id]);
        return $this->db->affected_rows();
    }

    function edit_data($tahun_akademik){		
        $this->db->set('id_user',$this->session->userdata('id_user'));
        $this->db->set('nama_kegiatan',$_POST['nama_kegiatan']);
        $this->db->set('tahun_akademik',$tahun_akademik);
        $this->db->set('semester',$_POST['semester']);
        $this->db->set('lb_kegiatan',$_POST['lb_kegiatan']);
        $this->db->set('tujuan_kegiatan',$_POST['tujuan_kegiatan']);
        $this->db->set('harapan_kegiatan',$_POST['harapan_kegiatan']);
        $this->db->set('tgl_pelaksanaan',$_POST['tgl_pelaksanaan']);
        $this->db->set('tempat',$_POST['tempat']);
        $this->db->set('tot_anggaran',$_POST['tot_anggaran']);
        $this->db->set('tgl_pengajuan',$_POST['tgl_pengajuan']);
        $this->db->where('id_proposal',$_POST['id_proposal']);
        $this->db->update('proposal');

        return $this->db->affected_rows();
    }

    public function addVerifikasiProposal()
    {
        $data=[
            'id_user'=>$this->session->userdata('id_user'),
            'id_proposal'=>$_POST['id_proposal'],
            'status'=>$_POST['status'],
            'catatan'=>$_POST['catatan'],
            'tgl_verifikasi'=>$_POST['tgl_verifikasi']
        ];
        $this->db->insert('verifikasi_proposal',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getVerifikasiProposalID($id)
    {
        return $this->db->get_where('verifikasi_proposal',['id_proposal'=> $id])->result_array();
    }

    // End Proposal

    // Laporan
    public function addLaporan()
    {
        $data=[
            'id_user'=>$this->session->userdata('id_user'),
            'id_proposal'=>$_POST['id_proposal'],
            'lb_laporan'=>$_POST['lb_laporan'],
            'tujuan_laporan'=>$_POST['tujuan_laporan'],
            'lp_jln_kegiatan'=>$_POST['lp_jln_kegiatan'],
            'hasil_kegiatan'=>$_POST['hasil_kegiatan'],
            'kendala_kegiatan'=>$_POST['kendala_kegiatan'],
            'solusi_kegiatan'=>$_POST['solusi_kegiatan'],
            'kesimpulan'=>$_POST['kesimpulan'],
            'saran'=>$_POST['saran'],
            'biaya_pendapatan'=>$_POST['biaya_pendapatan'],
            'biaya_pengeluaran'=>$_POST['biaya_pengeluaran'],
            'tgl_pengajuan_lp'=>$_POST['tgl_pengajuan_lp']
        ];
        $this->db->insert('laporan',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getLaporan()
    {
        return $this->db->get_where('laporan_view',['role'=>$this->session->userdata('role')])->result_array();
    }

    public function joinLaporanID($id)
    {
        return $this->db->get_where('laporan_view',['id_laporan'=> $id])->result_array();
    }

    public function getLaporanID($id)
    {
        return $this->db->get_where('laporan',['id_laporan'=> $id])->result_array();
    }

    public function getArsipLaporanID($id)
    {
        return $this->db->get_where('trans_doc',['code_id'=> 'laporan_'.$id])->result_array();
    }

    public function deleteLaporan($id)
    {
        $this->db->delete('laporan',['id_laporan'=>$id]);
        return $this->db->affected_rows();
    }

    function edit_LPJ($lbLaporan){
        $this->db->set('id_user',$this->session->userdata('id_user'));		
        $this->db->set('lb_laporan',$lbLaporan);
        $this->db->set('tujuan_laporan',$_POST['tujuan_laporan']);
        $this->db->set('lp_jln_kegiatan',$_POST['lp_jln_kegiatan']);
        $this->db->set('hasil_kegiatan',$_POST['hasil_kegiatan']);
        $this->db->set('kendala_kegiatan',$_POST['kendala_kegiatan']);
        $this->db->set('solusi_kegiatan',$_POST['solusi_kegiatan']);
        $this->db->set('kesimpulan',$_POST['kesimpulan']);
        $this->db->set('saran',$_POST['saran']);
        $this->db->set('biaya_pendapatan',$_POST['biaya_pengeluaran']);
        $this->db->set('biaya_pengeluaran',$_POST['biaya_pengeluaran']);
        $this->db->set('tgl_pengajuan_lp',$_POST['tgl_pengajuan_lp']);
        $this->db->where('id_laporan',$_POST['id_laporan']);
        $this->db->update('laporan');

        return $this->db->affected_rows();
    }

    public function addVerifikasiLaporan()
    {
        $data=[
            'id_user'=>$this->session->userdata('id_user'),
            'id_laporan'=>$_POST['id_laporan'],
            'status'=>$_POST['status'],
            'catatan'=>$_POST['catatan'],
            'tgl_verifikasi_lp'=>$_POST['tgl_verifikasi_lp']
        ];
        $this->db->insert('verifikasi_laporan',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getVerifikasiLaporanID($id)
    {
        return $this->db->get_where('verifikasi_laporan',['id_laporan'=> $id])->result_array();
    }
    // End Laporan

    public function deleteSingleDoc($id)
    {
        $this->db->delete('trans_doc',['id_trans_doc'=>$id]);
        return $this->db->affected_rows();
    }



    
    // function update_data($where,$data,$table){
	// 	$this->db->where($where);
	// 	$this->db->update($table,$data);
	// }


}