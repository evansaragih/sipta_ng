<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upload_JumlahWisman extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_upload_jlh_wisman');
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
    $this->load->view('jumlah_wisman/tambah_data_excel');
  }

  function fetch()
  {
    $data = $this->M_upload_jlh_wisman->select();
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
          $kebangsaan = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $bulan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $tahun = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $jumlah = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $data[] = array(
            'kebangsaan' => $kebangsaan,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'jumlah' => $jumlah
          );
        }
      }
      $this->M_upload_jlh_wisman->insert($data);
      echo 'Data Imported Successfully';
    }
  }
}
