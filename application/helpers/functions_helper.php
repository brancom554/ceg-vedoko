<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Role: Genere un numero a partir du dernier numero de la table
 * @parametres: string $table , $champs , $prefixe
 * @retourne: string  ou int
 */
if (!function_exists('genereateNumero')) {
    function generateNumero($table, $champs, $prefixe = FALSE, $lenght = FALSE)
    {
        //Recupere le derniere code ou numero
        $ci = &get_instance();
        $ci->load->database();
        if (empty($prefixe))
            $query = $ci->db->select_max($champs)->get($table);
        if ($prefixe) $query = $ci->db->select($champs)
            ->where($champs . " like '" . $prefixe . "%'")
            ->order_by($champs, "DESC")
            ->limit(1)
            ->get($table);
        $resultat = $query->row_array();

        $prefixe_len = strlen($prefixe);
        $code = $resultat[$champs];
        $number = 0;
        if (!empty($code)) {
            $number = substr($code, $prefixe_len);
        }
        $number++;
        if ($lenght == FALSE)
            return $prefixe . $number;
        $number_len = $lenght - $prefixe_len;
        return $prefixe . sprintf('%0' .  $number_len . 'd', $number);
    }
}

/**
 * Role: Formate une date
 * @param date $date
 * @param String $format
 * @return bool|string
 */
if (!function_exists('formatDate')) {
    function formatDate($date, $format)
    {
        if ($date == null) return null;
        $date = str_replace('/', '-', $date);
        $date = new DateTime($date);
        return $date->format($format);
    }
}


if (!function_exists('getExtension')) {
    function getExtension($fileName)
    {
        $fileName_explode  = explode('.', $fileName);
        foreach ($fileName_explode as $chaine) {
            if (strlen($chaine) == 3) {
                $extension = $chaine;
            }
        }
        if (isset($extension)) {
            return $extension;
        } else {
            return FALSE;
        }
    }
}


/**
 * Crypte un mot de passe avec un algorithme asymetrique
 * @param string $password
 * @return string
 */
function crypte($password)
{
    return sha1($password);
}



function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
    else $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getHumanReadableSize($size, $unit = null, $decemals = 2)
{
    $byteUnits = [ // 'o' ,  Ici en televersant les fichier la taille est exprimee en Ko
        'Ko', 'Mo', 'Go', 'To', 'Po', 'Eo', 'Zo', 'Yo'
    ];
    if (!is_null($unit) && !in_array($unit, $byteUnits)) {
        $unit = null;
    }
    $extent = 1;
    foreach ($byteUnits as $rank) {
        if ((is_null($unit) && ($size < $extent <<= 10)) || ($rank == $unit)) {
            break;
        }
    }
    return number_format($size / ($extent >> 10), $decemals) . $rank;
}


function byteConvert($bytes)
{
    if ($bytes == 0) return "0.00 B";
    $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    $e = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $e), 2) . $s[$e];
}


if (!function_exists('getImageDataSrc')) {
    function getImageDataSrc($image_path)
    {
        if (!file_exists($image_path)) return false;
        $image_data = base64_encode(file_get_contents($image_path));
        return "data:" . mime_content_type($image_path) . ";base64," . $image_data;
    }
}

function strip_chars($string)
{
    $string = trim($string);
    str_replace("'", '_', $string);
    $charToChange = array(
        'é' => 'e',
        'è' => 'e',
        'é' => 'e',
        'è' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'á' => 'a',
        'à' => 'a',
        'â' => 'a',
        'ä' => 'a',
        'ã' => 'a',
        'å' => 'a',
        'ç' => 'c',
        'í' => 'i',
        'ì' => 'i',
        'î' => 'i',
        'ï' => 'i',
        'ñ' => 'n',
        'ó' => 'o',
        'ò' => 'o',
        'ô' => 'o',
        'ö' => 'o',
        'õ' => 'o',
        'ú' => 'u',
        'ù' => 'u',
        'û' => 'u',
        'ü' => 'u',
        "'" => '_',
        "/" => '_',
        "\"" => '_',
        "|" => '_',
        "(" => '_',
        ")" => '_',
        "’" => '_',
        '’' => '_',
        ' ' => '_',
    );
    $string = strtr($string, $charToChange);
    $string = strtolower($string);
    //	$string = strtoupper($string);
    return $string;
}


/**
 * Genere une chaine de caracteres aleatoire
 * @param int $length 
 * @return string 
 */
function randomToken($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

function display($string)
{
    return print_r($string);
}
