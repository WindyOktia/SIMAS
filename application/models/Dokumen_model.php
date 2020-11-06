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
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, user.nama');
        $this->db->from('user');
        $this->db->where('proposal.id_user = user.id_user');
        $this->db->where(['user.role'=>$this->session->userdata('role')]);
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
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
        $this->db->trans_start();		
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
        $this->db->trans_complete();

        $this->db->trans_start();
        $this->db->delete('verifikasi_proposal',['id_proposal'=>$_POST['id_proposal'],'status'=>'Revisi']);
        $this->db->trans_complete();
        return $this->db->affected_rows();
    }

    public function addVerifikasiProposal()
    {
        $verifi=$this->db->get_where('verifikasi_proposal',['id_user'=> $this->session->userdata('id_user'),'id_proposal'=> $_POST['id_proposal']])->result_array();
        // $laporan=$this->db->get_where('verifikasi_proposal',['id_proposal'=> $_POST['id_proposal']])->result_array();
        if( $verifi){
            $this->db->trans_start();
            $this->db->set('id_user',$this->session->userdata('id_user'),);
            $this->db->set('status',$_POST['status']);
            $this->db->set('catatan',$_POST['catatan']);
            $this->db->set('tgl_verifikasi',$_POST['tgl_verifikasi']);
            $this->db->where('id_proposal',$_POST['id_proposal']);
            $this->db->where('id_user',$this->session->userdata('id_user'));
            $this->db->update('verifikasi_proposal');
            $this->db->trans_complete();
        } else {
            $this->db->trans_start();
            $data = [
            'id_user'=>$this->session->userdata('id_user'),
            'id_proposal'=>$_POST['id_proposal'],
            'status'=>$_POST['status'],
            'catatan'=>$_POST['catatan'],
            'tgl_verifikasi'=>$_POST['tgl_verifikasi']
            ];
            $this->db->insert('verifikasi_proposal', $data);
            $this->db->trans_complete();
        }
        return true;
    }

    public function getVerifikasiProposalID($id)
    {
        return $this->db->get_where('verifikasi_proposal',['id_proposal'=> $id])->result_array();
    }

    public function getProposalVerifikasi()
    {
        // return $this->db->get('proposal_view')->result_array();
        $this->db->trans_start();
        $this->db->select('proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, user.nama');
        $this->db->from('user');
        $this->db->where('proposal.id_user = user.id_user');
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiProposalWaka()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_proposal.id_proposal, verifikasi_proposal.status');
        $this->db->from('user');
        $this->db->from('verifikasi_proposal');
        $this->db->where('verifikasi_proposal.id_proposal = proposal.id_proposal AND user.id_user = verifikasi_proposal.id_user AND user.role=2');
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiProposalPJ()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_proposal.id_proposal, verifikasi_proposal.status');
        $this->db->from('user');
        $this->db->from('verifikasi_proposal');
        $this->db->where('verifikasi_proposal.id_proposal = proposal.id_proposal AND user.id_user = verifikasi_proposal.id_user AND user.role=7');
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiProposalKepsek()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_proposal.id_proposal, verifikasi_proposal.status');
        $this->db->from('user');
        $this->db->from('verifikasi_proposal');
        $this->db->where('verifikasi_proposal.id_proposal = proposal.id_proposal AND user.id_user = verifikasi_proposal.id_user AND user.role=4');
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
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
        // return $this->db->get_where('laporan_view',['role'=>$this->session->userdata('role')])->result_array();
        $this->db->trans_start();
        $this->db->select('laporan.id_laporan, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, laporan.tgl_pengajuan_lp, user.nama');
        $this->db->from('proposal');
        $this->db->from('user');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where('user.id_user = laporan.id_user');
        $this->db->where(['user.role'=>$this->session->userdata('role')]);
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
    }

    public function getLaporanCheck()
    {
        $this->db->trans_start();
        return $this->db->query('SELECT proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester
        FROM laporan, proposal
        WHERE proposal.id_proposal NOT IN (SELECT laporan.id_proposal FROM laporan)
        GROUP BY proposal.id_proposal')->result_array();
        $this->db->trans_complete();
        // return $this->db->get_where('laporan_view',['role'=>$this->session->userdata('role')])->result_array();
    }

    public function joinLaporanID($id)
    {
        // return $this->db->get_where('laporan_view',['id_laporan'=> $id])->result_array();
        $this->db->trans_start();
        $this->db->select('laporan.id_laporan, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, proposal.tempat, proposal.tot_anggaran, laporan.biaya_pendapatan,laporan.biaya_pengeluaran, laporan.tgl_pengajuan_lp, laporan.lb_laporan, laporan.tujuan_laporan,laporan.lp_jln_kegiatan, laporan.hasil_kegiatan, laporan.kendala_kegiatan, laporan.solusi_kegiatan, laporan.kesimpulan, laporan.saran, user.nama');
        $this->db->from('proposal');
        $this->db->from('user');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where('user.id_user = laporan.id_user');
        $this->db->where(['laporan.id_laporan'=>$id]);
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
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
        $this->db->trans_start();
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
        $this->db->trans_complete();

        $this->db->trans_start();
        $this->db->delete('verifikasi_laporan',['id_laporan'=>$_POST['id_laporan'],'status'=>'Revisi']);
        $this->db->trans_complete();
        return $this->db->affected_rows();
    }

    public function addVerifikasiLaporan()
    {
        $verifi=$this->db->get_where('verifikasi_laporan',['id_user'=> $this->session->userdata('id_user'),'id_laporan'=> $_POST['id_laporan']])->result_array();
        if( $verifi ){
            $this->db->trans_start();
            $this->db->set('id_user',$this->session->userdata('id_user'),);
            $this->db->set('status',$_POST['status']);
            $this->db->set('catatan',$_POST['catatan']);
            $this->db->set('tgl_verifikasi_lp',$_POST['tgl_verifikasi_lp']);
            $this->db->where('id_laporan',$_POST['id_laporan']);
            $this->db->where('id_user',$this->session->userdata('id_user'));
            $this->db->update('verifikasi_laporan');
            $this->db->trans_complete();
        } else {
            $this->db->trans_start();
            $data = [
            'id_user'=>$this->session->userdata('id_user'),
            'id_laporan'=>$_POST['id_laporan'],
            'status'=>$_POST['status'],
            'catatan'=>$_POST['catatan'],
            'tgl_verifikasi_lp'=>$_POST['tgl_verifikasi_lp']
            ];
            $this->db->insert('verifikasi_laporan', $data);
            $this->db->trans_complete();
        }
        return true;
    }

    public function getVerifikasiLaporanID($id)
    {
        return $this->db->get_where('verifikasi_laporan',['id_laporan'=> $id])->result_array();
    }

    public function getLaporanVerifikasi()
    {
        // return $this->db->get('laporan_view')->result_array();
        // $this->db->trans_start();
        // $this->db->select('laporan.id_laporan, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, proposal.tot_anggaran, laporan.biaya_pengeluaran');
        // $this->db->join('verifikasi_laporan', 'verifikasi_laporan.id_laporan = laporan.id_laporan');
        // $this->db->join('proposal', 'proposal.id_proposal = laporan.id_proposal');
        // return $this->db->get('laporan')->result_array();
        // $this->db->trans_complete();
        $this->db->trans_start();
        $this->db->select('laporan.id_laporan, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, user.nama');
        $this->db->from('proposal');
        $this->db->from('user');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where('user.id_user = laporan.id_user');
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiLaporanWaka()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_laporan.id_laporan, verifikasi_laporan.status');
        $this->db->from('user');
        $this->db->from('verifikasi_laporan');
        $this->db->where('verifikasi_laporan.id_laporan = laporan.id_laporan AND user.id_user = verifikasi_laporan.id_user AND user.role=2');
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiLaporanPJ()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_laporan.id_laporan, verifikasi_laporan.status');
        $this->db->from('user');
        $this->db->from('verifikasi_laporan');
        $this->db->where('verifikasi_laporan.id_laporan = laporan.id_laporan AND user.id_user = verifikasi_laporan.id_user AND user.role=7');
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
    }

    public function getVerifikasiLaporanKepsek()
    {
        // return $this->db->get('laporan_view')->result_array();
        $this->db->trans_start();
        $this->db->select('verifikasi_laporan.id_laporan, verifikasi_laporan.status');
        $this->db->from('user');
        $this->db->from('verifikasi_laporan');
        $this->db->where('verifikasi_laporan.id_laporan = laporan.id_laporan AND user.id_user = verifikasi_laporan.id_user AND user.role=4');
        return $this->db->get('laporan')->result_array();
        $this->db->trans_complete();
    }

    public function getProposalLaporan()
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, user.nama');
        $this->db->from('user');
        $this->db->where('proposal.id_user = user.id_user');
        $this->db->where(['user.role'=>$this->session->userdata('role')]);
        return $this->db->get('proposal')->result_array();
        $this->db->trans_complete();
    }
    // End Laporan

    // Kuesioner

    public function getKuesionerCheck()
    {
        $this->db->trans_start();
        return $this->db->query('SELECT proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester
        FROM kuesioner_kegiatan, proposal
        WHERE proposal.id_proposal NOT IN (SELECT kuesioner_kegiatan.id_proposal FROM kuesioner_kegiatan)
        GROUP BY proposal.id_proposal')->result_array();
        $this->db->trans_complete();
        // return $this->db->get_where('laporan_view',['role'=>$this->session->userdata('role')])->result_array();
    }

    public function getKuesioner()
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('kuesioner_kegiatan.id_kuesioner, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, kategori_kuesioner.nama_kategori, kuesioner_kegiatan.deskripsi, kuesioner_kegiatan.tgl_mulai, kuesioner_kegiatan.tgl_selesai, kode_kuesioner.link_kuesioner');
        $this->db->from('kategori_kuesioner');
        $this->db->from('proposal');
        $this->db->where('kuesioner_kegiatan.id_kategori = kategori_kuesioner.id_kategori');
        $this->db->where('kuesioner_kegiatan.id_proposal = proposal.id_proposal');
        $this->db->join('kode_kuesioner', 'kode_kuesioner.id_kuesioner = kuesioner_kegiatan.id_kuesioner', 'left');
        return $this->db->get('kuesioner_kegiatan')->result_array();
        $this->db->trans_complete();
    }

    public function getKuesionerID($id)
    {
        $this->db->trans_start();
        $this->db->select('kuesioner_kegiatan.id_kuesioner, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, kategori_kuesioner.nama_kategori, kuesioner_kegiatan.deskripsi, kuesioner_kegiatan.tgl_mulai, kuesioner_kegiatan.tgl_selesai');
        $this->db->from('kategori_kuesioner');
        $this->db->from('proposal');
        $this->db->where('kuesioner_kegiatan.id_kategori = kategori_kuesioner.id_kategori');
        $this->db->where('kuesioner_kegiatan.id_proposal = proposal.id_proposal');
        $this->db->where(['kuesioner_kegiatan.id_kuesioner'=>$id]);
        return $this->db->get('kuesioner_kegiatan')->result_array();
        $this->db->trans_complete();
    }

    public function getKategori()
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('kategori_kuesioner.id_kategori, kategori_kuesioner.nama_kategori');
        // $this->db->from('kategori_kuesioner');
        // $this->db->where('proposal.id_user = user.id_user');
        // $this->db->where(['user.role'=>$this->session->userdata('role')]);
        return $this->db->get('kategori_kuesioner')->result_array();
        $this->db->trans_complete();
    }
    
    public function getPertanyaan()
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('pertanyaan_kuesioner.id_pertanyaan, pertanyaan_kuesioner.pertanyaan, kategori_kuesioner.nama_kategori');
        $this->db->from('kategori_kuesioner');
        $this->db->where('pertanyaan_kuesioner.id_kategori = kategori_kuesioner.id_kategori');
        return $this->db->get('pertanyaan_kuesioner')->result_array();
        $this->db->trans_complete();
    }

    public function getIDPertanyaan($id)
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('pertanyaan_kuesioner.id_pertanyaan, pertanyaan_kuesioner.pertanyaan, kategori_kuesioner.nama_kategori');
        $this->db->from('kategori_kuesioner');
        $this->db->from('kuesioner_kegiatan');
        $this->db->where('pertanyaan_kuesioner.id_kategori = kategori_kuesioner.id_kategori');
        $this->db->where('kategori_kuesioner.id_kategori = kuesioner_kegiatan.id_kategori');
        $this->db->where(['kuesioner_kegiatan.id_kuesioner'=>$id]);
        return $this->db->get('pertanyaan_kuesioner')->result_array();
        $this->db->trans_complete();
    }

    public function getJawaban()
    {
        $this->db->trans_start();
        $this->db->select('jawaban_kuesioner.id_jawaban, jawaban_kuesioner.jawaban, jawaban_kuesioner.skor_jawaban');
        return $this->db->get('jawaban_kuesioner')->result_array();
        $this->db->trans_complete();
    }

    public function addKuesioner()
    {
        $data=[
            'id_proposal'=>$_POST['id_proposal'],
            'deskripsi'=>$_POST['deskripsi'],
            'tgl_mulai'=>$_POST['tgl_mulai'],
            'tgl_selesai'=>$_POST['tgl_selesai'],
            'id_kategori'=>$_POST['id_kategori']
        ];
        $this->db->insert('kuesioner_kegiatan',$data);
        return $this->db->affected_rows();
    }

    public function addKategori()
    {
        $data=[
            'nama_kategori'=>$_POST['nama_kategori']
        ];
        $this->db->insert('kategori_kuesioner',$data);
        return $this->db->affected_rows();
    }

    public function addPertanyaan($pertanyaan)
    {
        $this->db->trans_start();
        $result = array();
            foreach($pertanyaan AS $key => $val){
                 $result[] = array(
                  'id_kategori'  	=> $_POST['id_kategori'],
                  'pertanyaan'  	=> $_POST['pertanyaan'][$key]
                 );
            }      
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('pertanyaan_kuesioner', $result);
        $this->db->trans_complete();
        return $this->db->affected_rows();
    }

    public function deleteKuesioner($id)
    {
        $this->db->delete('kuesioner_kegiatan',['id_kuesioner'=>$id]);
        return $this->db->affected_rows();
    }

    public function deleteKategori($id)
    {
        $this->db->delete('kategori_kuesioner',['id_kategori'=>$id]);
        return $this->db->affected_rows();
    }

    public function deletePertanyaan($id)
    {
        $this->db->delete('pertanyaan_kuesioner',['id_pertanyaan'=>$id]);
        return $this->db->affected_rows();
    }

    // public function getTest()
    // {
    //     // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
    //     $this->db->trans_start();
    //     $this->db->select('trans_kuesioner.id_kuesioner, (SUM(jawaban_kuesioner.skor_jawaban) / (MAX(jawaban_kuesioner.skor_jawaban) * COUNT(pertanyaan_kuesioner.id_pertanyaan)) * 100) AS Nilai ');
    //     $this->db->from('jawaban_kuesioner');
    //     $this->db->from('trans_kuesioner');
    //     $this->db->from('pertanyaan_kuesioner');
    //     $this->db->from('kategori_kuesioner');
    //     $this->db->where('trans_kuesioner_opsi.id_jawaban=jawaban_kuesioner.id_jawaban');
    //     $this->db->where('trans_kuesioner_opsi.id_tkuesioner = trans_kuesioner.id_tkuesioner');
    //     $this->db->where('pertanyaan_kuesioner.id_kategori = kategori_kuesioner.id_kategori');
    //     return $this->db->get('trans_kuesioner_opsi')->result_array();
    //     $this->db->trans_complete();
    // }

    // End Kuesioner

    public function deleteSingleDoc($id)
    {
        $this->db->delete('trans_doc',['id_trans_doc'=>$id]);
        return $this->db->affected_rows();
    }

    public function genKuesioner($id)
    {
        $seed = str_split('12345'
        .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
        $data = [
        "id_kuesioner" => $id,
        "link_kuesioner" => $rand
        ];
        $this->db->insert('kode_kuesioner', $data);
        return true;
    }

    public function getPenugasan()
    {
        // return $this->db->get_where('proposal_view',['role'=>$this->session->userdata('role')] )->result_array();
        $this->db->trans_start();
        $this->db->select('penugasan.id_tugas, proposal.nama_kegiatan, guru.nama_guru, guru.nip');
        $this->db->from('guru');
        $this->db->from('proposal');
        $this->db->where('penugasan.id_guru = guru.id_guru');
        $this->db->where('proposal.id_proposal = penugasan.id_proposal');
        return $this->db->get('penugasan')->result_array();
        $this->db->trans_complete();
    }

    public function addPenugasan()
    {
        $data=[
            'id_proposal'=>$_POST['id_proposal'],
            'id_guru'=>$_POST['id_guru']
        ];
        $this->db->insert('penugasan',$data);
        return $this->db->affected_rows();
    }

    public function deletePenugasan($id)
    {
        $this->db->delete('penugasan',['id_tugas'=>$id]);
        return $this->db->affected_rows();
    }



    
    // function update_data($where,$data,$table){
	// 	$this->db->where($where);
	// 	$this->db->update($table,$data);
	// }


}