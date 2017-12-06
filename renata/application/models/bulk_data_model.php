<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bulk_data_model extends CI_Model
{


    public function total_drug()
    {
        $sql = "SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function upload_pso_file()
    {
        $allowed = array('csv');
        $filename = $_FILES['pso_bulk']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $this->session->set_userdata('error', 'Wrong File Format');
            redirect(base_url() . 'bulk_data/pso_bulk');
        } else {
            $sql = "SELECT pso_id FROM tbl_user_pso";
            $result = $this->db->query($sql);
            $k = 0;
            $fp = fopen($_FILES['pso_bulk']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                if (count($csv_line) == 10) {
                    $insert_csv = array();
                    $insert_csv['renata_id'] = $csv_line['0'];
                    $insert_csv['pso_id'] = $csv_line['1'];
                    $insert_csv['pso_name'] = $csv_line['2'];
                    $insert_csv['pso_phone'] = $csv_line['3'];
                    $insert_csv['pso_dob'] = $csv_line['4'];
                    $insert_csv['pso_gender'] = $csv_line['5'];
                    $insert_csv['depot_code'] = $csv_line['6'];
                    $insert_csv['dsm_code'] = $csv_line['7'];
                    $insert_csv['b_code'] = $csv_line['8'];
                    $insert_csv['pso_designation'] = $csv_line['9'];
                    if ($k != 0) {
                        $val = substr($insert_csv['pso_phone'], 0, 1);
                        if ($val != 0) {
                            $insert_csv['pso_phone'] = '0' . $insert_csv['pso_phone'];
                        }
                        if ($insert_csv['pso_gender'] == 'Male') {
                            $insert_csv['pso_gender'] = 1;
                        } else {
                            $insert_csv['pso_gender'] = 2;
                        }

                        $key = array_search($insert_csv['pso_id'], array_column($result->result_array(), 'pso_id'));
                        if ($key>-1) {
                            $sql1 = "UPDATE tbl_user_pso SET renata_id='$insert_csv[renata_id]',pso_id='$insert_csv[pso_id]',pso_name='$insert_csv[pso_name]',pso_gender='$insert_csv[pso_gender]',pso_dob='$insert_csv[pso_dob]',pso_phone='$insert_csv[pso_phone]',pso_designation='$insert_csv[pso_designation]',tbl_depot_depot_code='$insert_csv[depot_code]',tbl_user_dsm_dsm_code='$insert_csv[dsm_code]',tbl_business_business_code='$insert_csv[b_code]' WHERE pso_id='$insert_csv[pso_id]'";
                            $this->db->query($sql1);
                        } else {
                            $pso_password = mt_rand(100000, 999999);
                            $number = mt_rand(100, 999);
                            $curl = curl_init();
                            curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=RenataPharmaceutical&sms=' . urlencode("Your Renata App Id: $insert_csv[pso_id]\nRenata Password: $pso_password\n") . '&msisdn=88' . $insert_csv['pso_phone'] . '&csmsid=' . $number . 'App' . $insert_csv['renata_id'] . '', CURLOPT_USERAGENT => 'Sample cURL Request'));
                            $resp = curl_exec($curl);
                            curl_close($curl);
                            $sql2 = "INSERT INTO tbl_user_pso(renata_id,pso_id,pso_name,pso_gender,pso_dob,pso_phone,pso_designation,pso_password,tbl_depot_depot_code,tbl_user_dsm_dsm_code,tbl_business_business_code) VALUES ('$insert_csv[renata_id]','$insert_csv[pso_id]','$insert_csv[pso_name]','$insert_csv[pso_gender]','$insert_csv[pso_dob]','$insert_csv[pso_phone]','$insert_csv[pso_designation]',md5('$pso_password'),'$insert_csv[depot_code]','$insert_csv[dsm_code]','$insert_csv[b_code]')";
                            $this->db->query($sql2);
                        }
                    }
                    $k++;
                } else {
                    $this->session->set_userdata('error', 'Wrong File Format');
                    redirect(base_url() . 'bulk_data/pso_bulk');
                }
            }
            fclose($fp) or die("can't close file");
            $data['success'] = "success";
            return $data;
        }
    }


    public function check_user_delete($key_sm,$key_rsm,$key_dsm,$renata_id)
    {
        if($key_sm>-1)
        {
            $sql_del_sm="DELETE FROM tbl_user_sm WHERE renata_id='$renata_id'";
            $this->db->query($sql_del_sm);
        }
        if($key_rsm>-1)
        {
            $sql_del_rsm="DELETE FROM tbl_user_rsm WHERE renata_id='$renata_id'";
            $this->db->query($sql_del_rsm);
        }
        if($key_dsm>-1)
        {
            $sql_del_dsm="DELETE FROM tbl_user_dsm WHERE renata_id='$renata_id'";
            $this->db->query($sql_del_dsm);
        }
    }
    public function upload_user_file()
    {
        $allowed = array('csv');
        $filename = $_FILES['user_bulk']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $this->session->set_userdata('error', 'Wrong File Format');
            redirect(base_url() . 'bulk_data/user_bulk');
        } else {
            //Login User
            $sql = "SELECT renata_id FROM tbl_login";
            $result = $this->db->query($sql);

            //Different User Type;
            $sql_sm = "SELECT renata_id FROM tbl_user_sm";
            $result_sm=$this->db->query($sql_sm);
            $sql_rsm = "SELECT renata_id FROM tbl_user_rsm";
            $result_rsm=$this->db->query($sql_rsm);
            $sql_dsm = "SELECT renata_id FROM tbl_user_dsm";
            $result_dsm=$this->db->query($sql_dsm);

            $k = 0;
            $fp = fopen($_FILES['user_bulk']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                if (count($csv_line) == 9) {
                    $insert_csv = array();
                    $insert_csv['renata_id'] = $csv_line['0'];
                    $insert_csv['name'] = $csv_line['1'];
                    $insert_csv['depot_code'] = $csv_line['2'];
                    $insert_csv['b_code'] = $csv_line['3'];
                    $insert_csv['designation'] = $csv_line['4'];
                    $insert_csv['user_type'] = $csv_line['5'];
                    $insert_csv['sm_code'] = $csv_line['6'];
                    $insert_csv['rsm_code'] = $csv_line['7'];
                    $insert_csv['dsm_code'] = $csv_line['8'];
                    if ($k != 0) {

                        $key = array_search($insert_csv['renata_id'], array_column($result->result_array(), 'renata_id'));
                        $key_sm = array_search($insert_csv['renata_id'], array_column($result_sm->result_array(), 'renata_id'));
                        $key_rsm = array_search($insert_csv['renata_id'], array_column($result_rsm->result_array(), 'renata_id'));
                        $key_dsm = array_search($insert_csv['renata_id'], array_column($result_dsm->result_array(), 'renata_id'));
                        if ($key>-1) {

                            if (strtoupper($insert_csv['user_type']) == 'ADMIN') {
                                $user_type = 2;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'MARKETING') {
                                $user_type = 3;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'GM') {
                                $user_type = 7;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'SM') {
                                $user_type = 4;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_sm_insert="INSERT INTO tbl_user_sm(sm_code,renata_id,sm_name,sm_designation,tbl_depot_depot_code,tbl_business_business_code) VALUES('$insert_csv[sm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]')";
                                $this->db->query($sql_sm_insert);
                            } else if (strtoupper($insert_csv['user_type']) == 'RSM') {
                                $user_type = 5;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_rsm_insert="INSERT INTO tbl_user_rsm(rsm_code,renata_id,rsm_name,rsm_designation,tbl_depot_depot_code,tbl_business_business_code,tbl_user_sm_sm_code) VALUES('$insert_csv[rsm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]','$insert_csv[sm_code]')";
                                $this->db->query($sql_rsm_insert);
                            } else if (strtoupper($insert_csv['user_type']) == 'DSM') {
                                $user_type = 6;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_dsm_insert="INSERT INTO tbl_user_dsm(dsm_code,renata_id,dsm_name,dsm_designation,tbl_depot_depot_code,tbl_business_business_code,tbl_user_rsm_rsm_code) VALUES('$insert_csv[dsm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]','$insert_csv[rsm_code]')";
                                $this->db->query($sql_dsm_insert);
                            }
                            $sql_login = "UPDATE tbl_login SET renata_id='$insert_csv[renata_id]',name='$insert_csv[name]',user_type='$user_type',designation='$insert_csv[designation]' WHERE renata_id='$insert_csv[renata_id]'";
                            $this->db->query($sql_login);
                        } else {
                            $user_password = 123456;

                            if (strtoupper($insert_csv['user_type']) == 'ADMIN') {
                                $user_type = 2;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'MARKETING') {
                                $user_type = 3;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'GM') {
                                $user_type = 7;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                            } else if (strtoupper($insert_csv['user_type']) == 'SM') {
                                $user_type = 4;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_sm_insert="INSERT INTO tbl_user_sm(sm_code,renata_id,sm_name,sm_designation,tbl_depot_depot_code,tbl_business_business_code) VALUES('$insert_csv[sm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]')";
                                $this->db->query($sql_sm_insert);
                            } else if (strtoupper($insert_csv['user_type']) == 'RSM') {
                                $user_type = 5;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_rsm_insert="INSERT INTO tbl_user_rsm(rsm_code,renata_id,rsm_name,rsm_designation,tbl_depot_depot_code,tbl_business_business_code,tbl_user_sm_sm_code) VALUES('$insert_csv[rsm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]','$insert_csv[sm_code]')";
                                $this->db->query($sql_rsm_insert);
                            } else if (strtoupper($insert_csv['user_type']) == 'DSM') {
                                $user_type = 6;
                                $this->check_user_delete($key_sm, $key_rsm, $key_dsm,$insert_csv['renata_id']);
                                $sql_dsm_insert="INSERT INTO tbl_user_dsm(dsm_code,renata_id,dsm_name,dsm_designation,tbl_depot_depot_code,tbl_business_business_code,tbl_user_rsm_rsm_code) VALUES('$insert_csv[dsm_code]','$insert_csv[renata_id]','$insert_csv[name]','$insert_csv[designation]','$insert_csv[depot_code]','$insert_csv[b_code]','$insert_csv[rsm_code]')";
                                $this->db->query($sql_dsm_insert);
                            }
                            $sql_login_insert = "INSERT INTO tbl_login(renata_id,name,password,user_type,designation,account_create_date) VALUES ('$insert_csv[renata_id]','$insert_csv[name]',md5($user_password),'$user_type','$insert_csv[designation]',CURRENT_DATE)";
                            $this->db->query($sql_login_insert);
                        }
                    }
                    $k++;
                } else {
                    $this->session->set_userdata('error', 'Wrong File Format');
                    redirect(base_url() . 'bulk_data/user_bulk');
                }
            }
            fclose($fp) or die("can't close file");
            $data['success'] = "success";
            return $data;
        }
    }

}