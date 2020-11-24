<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Akomodasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_upload_akomodasi');
    $this->load->library('excel');
    if (!$this->session->userdata('id_admin')) {
      redirect('Auth_admin');
    } elseif ($this->session->userData('type') != 'admin') {
      // redirect('JumlahPenumpang');
      echo "<script>;history.go(-1);</script>";
    }
  }

  function fetch()
  {
    $data = $this->M_upload_akomodasi->select();
    $output = '
    <h3>' . number_format($data->num_rows()) . '</h3>';
    echo $output;
  }

  function fetch2() //bentuk tabel
  {
    $data = $this->M_upload_akomodasi->select();
    $output = '
    <h3 align="center">Total Data - ' . $data->num_rows() . '</h3>
    <table id="upload_akomodasi" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID Akomodasi</th>
          <th>Akomodasi</th>
          <th>ID Kabupaten</th>
          <th>Alamat</th>
          <th>Jumlah Kamar</th>
        </tr>
      </thead>
      <tbody>
    ';
    foreach ($data->result() as $row) {
      $output .= '
      <tr>
        <td>' . $row->id_akomodasi . '</td>
        <td>' . $row->nama_hotel . '</td>
        <td>' . $row->id_kabupaten . '</td>
        <td>' . $row->alamat . '</td>
        <td>' . $row->jumlah_kamar . '</td>
      </tr>
      ';
    }
    $output .= '</tbody></table>';
    echo $output;
  }

  function import()
  {
    if (isset($_FILES["file"]["name"])) {
      $path = $_FILES["file"]["tmp_name"];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row = 3; $row <= $highestRow; $row++) {
          $kabupaten = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $id_akomodasi = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $tahun = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $kategori = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $jumlah_kamar = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $jumlah_tamu = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $data[] = array(
            'id_akomodasi' => $id_akomodasi,
            'kategori' => $kategori,
            'tahun' => $tahun,
            'jumlah_tamu' => $jumlah_tamu,
            'jumlah_kamar' => $jumlah_kamar
          );
        }
      }
      $this->M_upload_akomodasi->insert($data);
      echo 'Data Imported Successfully';
    }
  }
}
