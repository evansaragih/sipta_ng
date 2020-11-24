<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Restoran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_upload_restoran');
    $this->load->library('excel');
    if (!$this->session->userdata('id_admin')) {
      redirect('Auth_admin');
    } elseif ($this->session->userData('type') != 'admin') {
      // redirect('JumlahPenumpang');
      echo "<script>;history.go(-1);</script>";
    }
  }

  function index()
  {
    $this->load->view('restoran/tambah_data_excel');
  }

  function fetch()
  {
    $data = $this->M_upload_restoran->select();
    $output = '
    <h3>' . number_format($data->num_rows()) . '</h3>';
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
          // $id_jlh_wisman = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $kabupaten = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $nama_restoran = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $tahun = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $jenis_wisatawan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $jumlah = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $data[] = array(
            'nama_objek' => $nama_restoran,
            'tahun' => $tahun,
            'jenis_wisatawan' => $jenis_wisatawan,
            'jumlah' => $jumlah
          );
        }
      }
      $this->M_upload_restoran->insert($data);
      echo 'Data Imported Successfully';
    }
  }
}
