<?php

function noFaktur($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "P" . date('dmy', time()) . "000" . $num;
            break;
        case 2:
            $NoTrans = "P" . date('dmy', time()) . "00" . $num;
            break;
        case 3:
            $NoTrans = "P" . date('dmy', time()) . "0" . $num;
            break;
        default:
            $NoTrans = "P" . date('dmy', time()) . $num;
    }
    return $NoTrans;
}

function fakturAutoID()
{
    $ci = &get_instance();
    $ci->db->from('penjualan');
    $result = $ci->db->get()->num_rows();
    return $result;
}