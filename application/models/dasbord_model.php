<?php
class dasbord_model extends CI_Model
{
    public function getdasbordKeuangan()
    {
        $this->db->select('proposal.nama_kegiatan, proposal.tot_anggaran, laporan.biaya_pendapatan, laporan.biaya_pengeluaran');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        return $this->db->get('proposal')->result_array();
    }
    
    public function getdefault_anggaran()
    {
        return $this->db->get('v_ratarata_anggaran')->result_array();
    }

    public function getlaporan_masuk($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT * FROM v_lprn_masuk WHERE tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'"')->result_array();
    }

    public function getjmlh_survei($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT * FROM v_survei_terlaksana WHERE tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'"')->result_array();
    }
    
    public function getkegiatan_berjalan($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT * FROM v_survei_terlaksana WHERE tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'"')->result_array();
    }

    public function getminatSiswa($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT * FROM v_minat_siswa WHERE tahun_akademik="'.$tahun_akademik.'" AND semester="'.$semester.'"')->result_array();
    }

    public function getanggaran_th1($dari)
    {
        return $this->db->query('SELECT * FROM v_ratarata_anggaran WHERE tahun_akademik="'.$dari.'"')->result_array();
    }

    public function getanggaran_semester($semester)
    {
        return $this->db->query('SELECT * FROM v_ratarata_anggaran WHERE semester="'.$semester.'"')->result_array();
    }

    public function getanggaran_th1_semester($dari,$semester)
    {
        return $this->db->query('SELECT * FROM v_ratarata_anggaran WHERE tahun_akademik="'.$dari.'" AND semester="'.$semester.'"')->result_array();
    }

    public function getanggaran_between1($dari)
    {
        return $this->db->query('SELECT * FROM v_ratarata_anggaran WHERE tahun_akademik 
        BETWEEN "'.$dari.'" AND (SELECT Max(tahun_akademik)FROM v_ratarata_anggaran)')->result_array();
    }

    public function getanggaran_between2($dari,$sampai)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where tahun_akademik
         BETWEEN "'.$dari.'" AND "'.$sampai.'"')->result_array();
    }

    public function getanggaran_between3($semester,$dari,$sampai)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN "'.$dari.'" AND "'.$sampai.'"')->result_array();
    }

    public function getanggaran_between4($semester,$sampai)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN (SELECT MIN(tahun_akademik)FROM v_ratarata_anggaran) AND "'.$sampai.'"')->result_array();
    }

    public function getanggaran_between5($semester)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where semester="'.$semester.'"')->result_array();
    }
    
    public function getanggaran_between6($dari,$semester)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where semester="'.$semester.'" AND tahun_akademik 
        BETWEEN "'.$dari.'" AND (SELECT MAX(tahun_akademik)FROM v_ratarata_anggaran)')->result_array();
    }
    
    public function getanggaran_between7($sampai)
    {
        return $this->db->query('SELECT * FROM  v_ratarata_anggaran where tahun_akademik 
        BETWEEN (SELECT MIN(tahun_akademik)FROM v_ratarata_anggaran) AND "'.$sampai.'"')->result_array();
    }

    public function getdasbordRataKeuangan($tahun_akademik, $semester)
    {
        $this->db->select('proposal.tahun_akademik, proposal.semester, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
        Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran, COUNT(laporan.id_proposal) AS terlaksana');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where(['proposal.tahun_akademik' => $tahun_akademik]);
        $this->db->where(['proposal.semester' => $semester]);
        $this->db->group_by('proposal.tahun_akademik');
        return $this->db->get('proposal')->result_array();
    }
    
    public function getdasbordRataKeuanganfilter($tahun_akademik, $semester)
    {
        $this->db->select('proposal.tahun_akademik, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
        Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where(['proposal.tahun_akademik' => $tahun_akademik]);
        $this->db->where(['proposal.semester' => $semester]);
        return $this->db->get('proposal')->result_array();
    }
    public function getdasbordalokasiBiaya($tahun_akademik, $semester)
    {
        $this->db->select('proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
        Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where(['proposal.tahun_akademik' => $tahun_akademik]);
        $this->db->where(['proposal.semester' => $semester]);
        $this->db->group_by('proposal.tahun_akademik, proposal.semester, proposal.id_proposal');
        return $this->db->get('proposal')->result_array();
    }

    public function getInfokegiatan($tahun_akademik,$semester)
    {
        return $this->db->query('SELECT proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan, 
        Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran FROM proposal, laporan 
        WHERE proposal.id_proposal = laporan.id_proposal AND proposal.tahun_akademik = "'.$tahun_akademik.'" AND proposal.semester = "'.$semester.'"
        GROUP BY proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan ASC')->result_array();
    }

    public function getKegiatan($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT proposal.tahun_akademik, proposal.semester, proposal.id_proposal, proposal.nama_kegiatan, 
        Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran FROM laporan, proposal WHERE proposal.id_proposal = laporan.id_proposal 
        AND proposal.tahun_akademik = "'.$tahun_akademik.'" AND proposal.semester = "'.$semester.'" GROUP BY proposal.tahun_akademik, proposal.semester, proposal.id_proposal
        ')->result_array();
    }

    public function getjumlahPeserta($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT proposal.id_proposal, proposal.tahun_akademik, proposal.semester, 
        COUNT(trans_kuesioner.id_siswa) as jumlah_peserta FROM proposal, kuesioner_kegiatan, trans_kuesioner 
        WHERE trans_kuesioner.id_kuesioner = kuesioner_kegiatan.id_kuesioner 
        AND kuesioner_kegiatan.id_proposal = proposal.id_proposal 
        AND proposal.tahun_akademik = "'.$tahun_akademik.'" AND proposal.semester = "'.$semester.'"')->result_array();
    }

    public function getjumlahKeterlibatan($tahun_akademik, $semester)
    {
        return $this->db->query('SELECT proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, 
        COUNT(trans_kuesioner.id_siswa) as jumlah_peserta FROM proposal, kuesioner_kegiatan, trans_kuesioner 
        WHERE trans_kuesioner.id_kuesioner = kuesioner_kegiatan.id_kuesioner AND kuesioner_kegiatan.id_proposal = proposal.id_proposal 
        AND proposal.tahun_akademik = "'.$tahun_akademik.'" AND proposal.semester = "'.$semester.'"
        GROUP BY proposal.tahun_akademik, proposal.semester ASC')->result_array();
    }

}