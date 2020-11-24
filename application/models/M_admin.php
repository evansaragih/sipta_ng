<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
  public function getData() //data biodata restoran
  {
    $this->db->SELECT('id, nip, nama, type, status, jenis_kelamin, username, foto_profil, created_at, updated_at');
    $this->db->FROM('admin');
    $this->db->ORDER_BY('created_at', 'ASC');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function cekData($username) //pada tambah data restoran pertahun
  {
    $this->db->SELECT('username , id');
    $this->db->FROM('admin');
    $this->db->WHERE('username', $username);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  // batas
  public function moveData2($user_ids = array())
  {
    foreach ($user_ids as $userid) {
      $data = array(
        'status' => "Unverified"
      );
      $this->db->update('tb_bar', $data, array('id' => $userid));
    }
    return false;
  }

  public function moveData($user_ids)
  {
    $this->db->set('status', 'Unverified');
    $this->db->where('id', $user_ids);
    $result = $this->db->update('admin');
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Berhasil Membatasi Akun');
    } else {
      $this->session->set_flashdata('warning', 'Gagal Mengubah Status');
    }
    // $this->db->update('tb_hotel', $data_update);
  }

  public function deleteData($user_ids = array()) //untuk menghapus jlh bar di data jumlah bar
  {
    foreach ($user_ids as $userid) {
      $this->db->delete('tb_nationality', array('id' => $userid));
    }
    return false;
  }

  public function deleteData2($user_ids) //untuk menghapus jenis kebangsaan di data DETAIL
  {
    $this->db->where('id', $user_ids);
    $result = $this->db->delete('tb_nationality');
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dipindahkan');
    } else {
      $this->session->set_flashdata('warning', 'Gagal Memindahkan Data');
    }
  }

  public function cekDatabeforeDelGrup($user_ids) //untuk menghapus jenis kebangsaan di data DETAIL
  {
    $this->db->SELECT('id , nationality, id_group');
    $this->db->FROM('tb_nationality');
    $this->db->WHERE('id_group', $user_ids);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function cekDatabeforeDelKebangsaan($user_ids) //untuk menghapus kebangsaan di data DETAIL
  {
    $this->db->SELECT('id , id_nationality');
    $this->db->FROM('tb_jlh_wisman');
    $this->db->WHERE('id_nationality', $user_ids);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function deleteDataGrup($user_ids = array()) //untuk menghapus jlh bar di data jumlah bar
  {
    foreach ($user_ids as $userid) {
      $this->db->delete('tb_group_nationality', array('id' => $userid));
    }
    return false;
  }

  public function deleteDataGrup2($user_ids) //untuk menghapus jenis kebangsaan di data DETAIL
  {
    $this->db->where('id', $user_ids);
    $result = $this->db->delete('tb_group_nationality');
    if ($result > 0) {
      $this->session->set_flashdata('success', 'Data Berhasil Dipindahkan');
    } else {
      $this->session->set_flashdata('warning', 'Gagal Memindahkan Data');
    }
  }
}
