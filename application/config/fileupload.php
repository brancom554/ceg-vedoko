<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| File Upload
|--------------------------------------------------------------------------
|
| Custom Config 
*/

$config['upload_path']          = 'uploads/'; // Le chemin parent des documents
$config['allowed_types']        = 'jpg|jpeg|png|gif|doc|docx|pdf|xls|xlsx|txt|zip|rar';
$config['max_size']             = 10240; // 10Mo
//$config['max_width']            = 1024;
//$config['max_height']           = 768;

$config['userprofil']['upload_path']          = 'uploads/profil_img/'; // Le chemin parent des images des utilisateurs 
$config['userprofil']['allowed_types']        = 'jpg|jpeg|png|gif';
$config['userprofil']['default_image']        = 'avatar.jpg';
$config['userprofil']['max_size']             = 2048; // 2Mo
$config['usercover']['overwrite']            = TRUE;

$config['usercover']['upload_path']          = 'uploads/profil_cover/'; // Le chemin parent des images des utilisateurs 
$config['usercover']['allowed_types']        = 'jpg|jpeg|png|gif';
$config['usercover']['default_image']        = 'avatar.jpg';
$config['usercover']['max_size']             = 2048; // 2Mo
$config['usercover']['overwrite']            = TRUE;

$config['post']['upload_path']          = 'uploads/post/'; // Le chemin parent des images des utilisateurs 
$config['post']['allowed_types']        = 'jpg|jpeg|png|gif';
$config['post']['default_image']        = 'placeholder.png';
$config['post']['max_size']             = 2048; // 2Mo
$config['post']['overwrite']            = TRUE;

$config['zip_tmp_path']         = 'tmp/';

$config['error_prefix'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert">'
        . '<span class="glyphicon glyphicon-remove"></span>&nbsp;';
$config['error_suffix'] = '</div>';