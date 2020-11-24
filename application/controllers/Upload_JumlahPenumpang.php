<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upload_JumlahPenumpang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_upload_jlh_penumpang');
    $this->load->library('excel');
    if (!$this->session->userdata('id_admin')) {
      redirect('Auth_mitra');
    } elseif ($this->session->userData('type') != 'admin') {
      // redirect('JumlahPenumpang');
      echo "<script>;history.go(-1);</script>";
    }
  }

  function index()
  {
    $this->load->view('jumlah_penumpang/tambah_data_excel');
  }

  function fetch()
  {
    $data = $this->M_upload_jlh_penumpang->select();
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
          $pintu_masuk = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $bulan = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $tahun = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $jenis_penumpang = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $jumlah = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $data[] = array(
            'pintu_masuk' => $pintu_masuk,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'jenis_penumpang' => $jenis_penumpang,
            'jumlah' => $jumlah
          );
        }
      }
      $this->M_upload_jlh_penumpang->insert($data);
      echo 'Data Imported Successfully';
    }
  }
}
