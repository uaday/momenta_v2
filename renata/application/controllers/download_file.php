<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_file extends CI_Controller {


    public function pso_format()
    {
        header('Content-disposition: attachment; filename=PSO_data_format.csv');
        header('Content-type: csv');
        readfile('./upload/csv/pso_bulk_format.csv');
    }
    public function user_format()
    {
        header('Content-disposition: attachment; filename=USER_data_format.csv');
        header('Content-type: csv');
        readfile('./upload/csv/user_bulk_format.csv');
    }



}