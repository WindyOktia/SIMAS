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
        $this->db->select('proposal.tahun_akademik, Floor(AVG(proposal.tot_anggaran)) AS rata_anggaran, 
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
        AVG(proposal.tot_anggaran) AS rata_anggaran, AVG(laporan.biaya_pendapatan) AS rata_pendapatan, 
        AVG(laporan.biaya_pengeluaran) AS rata_pengeluaran FROM proposal, laporan 
        WHERE proposal.id_proposal = laporan.id_proposal AND proposal.tahun_akademik = "'.$tahun_akademik.'"
        GROUP BY proposal.tahun_akademik, proposal.semester, proposal.nama_kegiatan ASC')->result_array();
    }
}