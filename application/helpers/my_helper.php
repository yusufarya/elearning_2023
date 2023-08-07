<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if (!function_exists('get_instance')) {
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if (!function_exists('getHashedPassword')) {
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if (!function_exists('verifyHashedPassword')) {
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if (!function_exists('getBrowserAgent')) {
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser()) {
            $agent = $CI->agent->browser() . ' ' . $CI->agent->version();
        } else if ($CI->agent->is_robot()) {
            $agent = $CI->agent->robot();
        } else if ($CI->agent->is_mobile()) {
            $agent = $CI->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if (!function_exists('setFlashData')) {
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

function FormatPeriod_($cKey)
{
    return Left($cKey, 2) . "/" . Right($cKey, 4);
}

function Left($Str, $Len)
{
    return substr($Str, 0, $Len);
}

function Right($Str, $Len)
{
    return substr($Str, -$Len);
}

function Mid($Str, $Start, $Len)
{
    return substr($Str, $Start, $Len);
}

function SetPeriod_($cKey)
{
    return Left($cKey, 2) . Right($cKey, 4);
}

function SetAcc_($cKey)
{
    return Left($cKey, 4) . Right($cKey, 4);
}

function FormatAcc_($cKey)
{
    return Left($cKey, 4) . "." . Right($cKey, 4);
}

function FormatDate_($cDate, $cFormat)
{
    return date($cFormat, strtotime($cDate));
}

function FormatNo_($cKey)
{
    return Left($cKey, 2) . "-" . Mid($cKey, 2, 4) . "/" . Mid($cKey, 6, 2) . "-" . Right($cKey, 4);
}

function SetNo_($cKey)
{
    return Left($cKey, 2) . Mid($cKey, 3, 4) . Mid($cKey, 8, 2) . Right($cKey, 4);
}

function Space_($nLen)
{
    return str_repeat("&nbsp;", $nLen);
}

function CekDatabase_($dbName)
{
    $CI = get_instance();
    $row =  $CI->db->query("SHOW DATABASES LIKE '%$dbName%'")->num_rows();
    if ($row > 0)
        return true;
    else
        return false;
}

function Find_($arrData, $colName, $strToFind)
{

    $result = in_array($strToFind, array_column($arrData, $colName));

    return $result;
}

function replace_mychar($str)
{
    $string = str_replace(['\'', '"'], '`', $str);
    return $string;
}

function blank_to_zero($str)
{
    $zero = $str && $str != 'NaN' && $str != 'null' && $str != 'NULL' && $str != 'undefined' && $str != 'Undefined' ? $str : 0;
    return $zero;
}

function dateToWeek($qDate)
{
    $dt = strtotime($qDate);
    $day  = date('j', $dt);
    $month = date('m', $dt);
    $year = date('Y', $dt);
    $totalDays = date('t', $dt);
    $weekCnt = 1;
    $retWeek = 0;
    for ($i = 1; $i <= $totalDays; $i++) {
        $curDay = date("N", mktime(0, 0, 0, $month, $i, $year));
        if ($curDay == 7) {
            if ($i == $day) {
                $retWeek = $weekCnt + 1;
            }
            $weekCnt++;
        } else {
            if ($i == $day) {
                $retWeek = $weekCnt;
            }
        }
    }
    return $retWeek;
}

// function renderPdf($nama_dokumen,$html)
// {
//     ini_set("memory_limit","-1");

//     include_once(APPPATH.'third_party/mpdf/content/modules/mPDF/MPDF61/mpdf.php');
//     $mpdf = new mPDF('utf-8','A4');

//     $mpdf->WriteHTML($html);
//     $mpdf->Output($nama_dokumen.".pdf",'D');
//     // exit;
// }

function cekSession()
{
    $CI = get_instance();
    $CI->db->select('users.*, role.role AS rolename');
    $CI->db->from('users');
    $CI->db->join('role', 'role.id = users.role_id');
    $CI->db->where('users.email', $CI->session->userdata('email'));
    $cekSession = $CI->db->get()->row_array();
    if ($cekSession == '') {
        $CI->session->set_flashdata('message', '<div class="alert alert-danger py-2" role="alert">Anda belum login.</div>');
        redirect('admin');
    }
    return $cekSession;
}

function cekSessionUser()
{
    $CI = get_instance();
    $CI->db->select('users.*, role.role AS rolename');
    $CI->db->from('users');
    $CI->db->join('role', 'role.id = users.role_id');
    $CI->db->where('users.email', $CI->session->userdata('email'));
    $cekSession = $CI->db->get()->row_array();
    if ($cekSession == '') {
        $CI->session->set_flashdata('message', '<div class="alert alert-danger py-2" role="alert">Anda belum login.</div>');
        redirect('login');
    }
    return $cekSession;
}

function cekSessionMurid()
{
    $CI = get_instance();
    
    $CI->db->select('users.*, role.role AS rolename, kls.kelas as kelass');
    $CI->db->from('users');
    $CI->db->join('role', 'role.id = users.role_id');
    $CI->db->join("kelas AS kls", "kls.id = users.kelas_id");
    $CI->db->where('users.email', $CI->session->userdata('email'));
    $cekSession = $CI->db->get()->row_array();
    if ($cekSession == '') {
        $CI->session->set_flashdata('message', '<div class="alert alert-danger py-2" role="alert">Anda belum login.</div>');
        redirect('login');
    }
    return $cekSession;
}

// ADD BY YUSUF
function getNamaBulan($bulan)
{
    switch ($bulan) {
        case '01':
            $bulan = 'Januari';
            break;
        case '02':
            $bulan = 'Februari';
            break;
        case '03':
            $bulan = 'Maret';
            break;
        case '04':
            $bulan = 'April';
            break;
        case '05':
            $bulan = 'Mei';
            break;
        case '06':
            $bulan = 'Juni';
            break;
        case '07':
            $bulan = 'Juli';
            break;
        case '08':
            $bulan = 'Agustus';
            break;
        case '09':
            $bulan = 'September';
            break;
        case '10':
            $bulan = 'Oktober';
            break;
        case '11':
            $bulan = 'November';
            break;
        case '12':
            $bulan = 'Desember';
            break;
        default:
            $bulan = '';
    }

    return $bulan;
}
// ADD BY YUSUF
function getNamaHari($val)
{
    switch ($val) {
        case '1':
            $val = 'Senin';
            break;
        case '2':
            $val = 'Selasa';
            break;
        case '3':
            $val = 'Rabu';
            break;
        case '4':
            $val = 'Kamis';
            break;
        case '5':
            $val = "Jum'at";
            break;
        case '6':
            $val = 'Sabtu';
            break;
        case '7':
            $val = 'Minggu';
        default:
            $val = '';
    }

    return $val;
}
// ADD BY YUSUF
function getCurrentDay($val)
{
    switch ($val) {
        case 'Monday':
            $val = 'Senin';
            break;
        case 'Tuesday':
            $val = 'Selasa';
            break;
        case 'Wednesday':
            $val = 'Rabu';
            break;
        case 'Thursday':
            $val = 'Kamis';
            break;
        case 'Friday':
            $val = "Jum'at";
            break;
        case 'Saturday':
            $val = 'Sabtu';
            break;
        case 'Sunday':
            $val = 'Minggu';
    }

    return $val;
}
