<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
    'addpso' => array (
        array(
                'field' => 'pso_name',
                'label' => 'Pso Name',
                'rules' => 'trim|required'
             ),
        array(
                'field'=>'pso_renata_id',
                'label'=>'Renata Employee ID',
                'rules' => 'trim|required|is_unique[tbl_user_pso.pso_id]'
            ),
        array(
                'field'=>'pso_code',
                'label'=>'Pso Code',
                'rules' => 'trim|required|is_unique[tbl_user_pso.renata_id]'
            ),
        array(
                'field'=>'pso_phone',
                'label'=>'Pso Phone',
                'rules' => 'trim|required'
            )
        ),
    'add_gen_name'=>array(
        array(
            'field'=>'gen_name',
            'label'=>'Generic Name',
            'rules'=>'trim|required|is_unique[tbl_drug_generic_name.gen_name]'
        )
    ),
    'add_doc_type'=>array(
        array(
            'field'=>'doc_type',
            'label'=>'Doctor Type',
            'rules'=>'trim|required|is_unique[tbl_doctor_type.type_name]'
        )
    ),'add_drug_name'=>array(
        array(
            'field'=>'drug_name',
            'label'=>'Drug Name',
            'rules'=>'trim|required|is_unique[tbl_drug.drug_name]'
        )
    ),
    'adduser1' => array (
        array(
                'field' => 'user_name',
                'label' => 'User Name',
                'rules' => 'trim|required'
             ),
        array(
                'field'=>'renata_id',
                'label'=>'Renata ID',
                'rules' => 'trim|required|is_unique[tbl_login.renata_id]'
            )
        ),
    'adduser2' => array (
        array(
                'field' => 'sm_code',
                'label' => 'Sales Manager Code',
                'rules' => 'trim|required|is_unique[tbl_user_sm.sm_code]'
             ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required|is_unique[tbl_login.renata_id]'
        )
        ),
    'adduser3' => array (
        array(
                'field' => 'rsm_code',
                'label' => 'Regional Sales Manager Code',
                'rules' => 'trim|required|is_unique[tbl_user_rsm.rsm_code]'
             ),
        array(
            'field' => 'sm_code',
            'label' => 'Sales Manager Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required|is_unique[tbl_login.renata_id]'
        )
        ),
    'adduser4' => array (
        array(
                'field' => 'dsm_code',
                'label' => 'District Sales Manager Code',
                'rules' => 'trim|required|is_unique[tbl_user_dsm.dsm_code]'
             ),
        array(
            'field' => 'rsm_code',
            'label' => 'Regional Sales Manager Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required|is_unique[tbl_login.renata_id]'
        )
        ),
    'adduser1_update' => array (
        array(
                'field' => 'user_name',
                'label' => 'User Name',
                'rules' => 'trim|required'
             ),
        array(
                'field'=>'renata_id',
                'label'=>'Renata ID',
                'rules' => 'trim|required'
            )
        ),
    'adduser2_update' => array (
        array(
                'field' => 'sm_code',
                'label' => 'Sales Manager Code',
                'rules' => 'trim|required'
             ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required'
        )
        ),
    'adduser3_update' => array (
        array(
                'field' => 'rsm_code',
                'label' => 'Regional Sales Manager Code',
                'rules' => 'trim|required'
             ),
        array(
            'field' => 'sm_code',
            'label' => 'Sales Manager Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required'
        )
        ),
    'adduser4_update' => array (
        array(
                'field' => 'rsm_code',
                'label' => 'Regional Sales Manager Code',
                'rules' => 'trim|required'
             ),
        array(
            'field' => 'dsm_code',
            'label' => 'District Sales Manager Code',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'user_name',
            'label' => 'User Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'renata_id',
            'label'=>'Renata ID',
            'rules' => 'trim|required'
        )
        ),
    'updatepso' => array (
        array(
            'field' => 'pso_name',
            'label' => 'Pso Name',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'pso_renata_id',
            'label'=>'Pso Id',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'pso_code',
            'label'=>'Pso Code',
            'rules' => 'trim|required'
        ),
        array(
            'field'=>'pso_phone',
            'label'=>'Pso Phone',
            'rules' => 'trim|required'
        )
        ),
    'editcat' => array (
        array(
                'field' => 'name',
                'label' => 'Categoey Name',
                'rules' => 'required'
             )
        ),
    'userlogin_check' => array (
        array(
                'field' => 'renata_id',
                'label' => 'Renata Id',
                'rules' => 'trim|required|xss_clean'
             ),
        array(
            'field' => 'password',
            'label' => 'User password',
            'rules' => 'trim|required'
        )
    ),
    'addproduct' => array (
        array(
                'field' => 'name',
                'label' => 'Product Name',
                'rules' => 'required'
             ),
        array(
            'field' => 'price',
            'label' => 'Product Price',
            'rules' => 'required'
        ),array(
                'field' => 'quantity',
                'label' => 'Product quantity',
                'rules' => 'required'
             ),
        array(
            'field' => 'cat',
            'label' => 'Product cat',
            'rules' => 'required'
        )
    )
);
