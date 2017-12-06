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
                'label'=>'Pso Id',
                'rules' => 'trim|required|is_unique[tbl_user_pso.renata_id]'
            ),
        array(
                'field'=>'pso_code',
                'label'=>'Pso Code',
                'rules' => 'trim|required|is_unique[tbl_user_pso.pso_id]'
            ),
        array(
                'field'=>'pso_phone',
                'label'=>'Pso Phone',
                'rules' => 'trim|required'
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
		        'field' => 'rsm_code',
		        'label' => 'Regional Sales Manager Code',
		        'rules' => 'trim|required'
		     ),
        array(
            'field' => 'dsm_code',
            'label' => 'District Sales Manager Code',
            'rules' => 'trim|required|is_unique[tbl_user_dsm.dsm_code]'
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
