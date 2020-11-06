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

    public function getdasbordRataKeuangan()
    {
        $this->db->select('proposal.tahun_akademik, proposal.semester, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
        Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran, COUNT(proposal.id_proposal) AS terlaksana');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        // $this->db->where(['proposal.tahun_akademik' => $tahun_akademik]);
        $this->db->group_by('proposal.tahun_akademik');
        return $this->db->get('proposal')->result_array();
    }
    public function getdasbordRataKeuanganfilter($tahun_akademik)
    {
        $this->db->select('proposal.tahun_akademik, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
        Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran, COUNT(proposal.id_proposal) AS terlaksana');
        $this->db->from('laporan');
        $this->db->where('proposal.id_proposal = laporan.id_proposal');
        $this->db->where(['proposal.tahun_akademik' => $tahun_akademik]);
        $this->db->group_by('proposal.tahun_akademik');
        return $this->db->get('proposal')->result_array();
    }

    public function getInfokegiatan($tahun_akademik)
    {
        return $this->db->query('SELECT proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan, 
        Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, Floor(AVG(laporan.biaya_pendapatan)) AS rata_pendapatan, 
        Floor(AVG(laporan.biaya_pengeluaran)) AS rata_pengeluaran FROM proposal, laporan 
        WHERE proposal.id_proposal = laporan.id_proposal AND proposal.tahun_akademik = "'.$tahun_akademik.'"
        GROUP BY proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan ASC')->result_array();
    }

    public function getKegiatan($tahun_akademik)
    {
        return $this->db->query('SELECT trans_kuesioner.id_kuesioner, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, 
        FLOOR((SUM(jawaban_kuesioner.skor_jawaban) / (COUNT(trans_kuesioner_opsi.id_pertanyaan) * (SELECT MAX(jawaban_kuesioner.skor_jawaban) FROM jawaban_kuesioner)) * 100 )) 
        AS Nilai FROM trans_kuesioner_opsi, jawaban_kuesioner, pertanyaan_kuesioner, trans_kuesioner, kategori_kuesioner, proposal, kuesioner_kegiatan 
        WHERE trans_kuesioner_opsi.id_jawaban=jawaban_kuesioner.id_jawaban AND trans_kuesioner_opsi.id_pertanyaan=pertanyaan_kuesioner.id_pertanyaan 
        AND trans_kuesioner_opsi.id_tkuesioner = trans_kuesioner.id_tkuesioner AND proposal.id_proposal = kuesioner_kegiatan.id_proposal 
        AND kuesioner_kegiatan.id_kuesioner = trans_kuesioner.id_kuesioner AND proposal.tahun_akademik = "'.$tahun_akademik.'"
        GROUP BY trans_kuesioner.id_kuesioner ASC')->result_array();
    }

    public function getjumlahPeserta($tahun_akademik)
    {
        return $this->db->query('SELECT proposal.id_proposal, proposal.nama_kegiatan, proposal.tahun_akademik, proposal.semester, COUNT(trans_kuesioner.id_siswa) as jumlah_peserta 
        FROM proposal, kuesioner_kegiatan, trans_kuesioner 
        WHERE trans_kuesioner.id_kuesioner = kuesioner_kegiatan.id_kuesioner 
        AND kuesioner_kegiatan.id_proposal = proposal.id_proposal
        AND proposal.tahun_akademik = "'.$tahun_akademik.'"
        GROUP BY proposal.id_proposal ASC')->result_array();
    }
}