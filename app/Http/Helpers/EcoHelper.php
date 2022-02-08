<?php

namespace App\Http\Helpers;

use App\Models\PlantTreeTransaction;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Notification;

const STATUS_PUBLISH = 'PUBLISH';
const STATUS_DRAFT = 'PUBLISH';




function tanamPohohCalculateTotalPrice(PlantTreeTransaction $d)
{
    /** @var PlantTreeTransaction $d*/
    $unit_price = $d->unit_price;
    $qty = $d->quantity;
    $unique_code = $d->unique_code;
    $price = ($unit_price * $qty) + $unique_code;
    return $price;
}


function notifyAdmin($notification){
    $admins = User::whereRoleId(Role::ADMIN)->get();
    Notification::send($admins, $notification);
}

/** 
 * ================================
 * FUNCTION GROUP VIEW
 * ================================
 */
/**
 * @return Carbon
 */

function htmlDateToCarbon(String $date)
{
    return Carbon::parse($date);
}

function integerToRupiah(int $int)
{
    return "Rp " . number_format($int, 0);
}

function rupiahToInteger(String $string)
{
    $string = str_replace("Rp", "", $string);
    $string = str_replace(".", "", $string);
    return intval($string);
}

function getJumlah($data)
{
    return is_int($data) ? $data : rupiahToInteger($data);
}

/** @return String */
function intToBulan(int $int)
{
    $arr = [
        "",
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];
    return $arr[$int];
}

function delimitArray($array, $address)
{

    try {
        if (!is_array($address)) {
            $address = explode(".", $address);
        }
        $num_args = count($address);

        $val = $array;
        for ($i = 0; $i < $num_args; $i++) {
            // every iteration brings us closer to the truth
            $val = $val[$address[$i]];
        }
        return $val;
    } catch (Exception $e) {
        return null;
    }
}
