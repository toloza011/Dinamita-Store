<?php

namespace App\Http\Controllers;

require_once '../vendor/autoload.php';

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Illuminate\Http\Request;
use Redirect;
use DB;

class PagarController extends Controller
{
    public function index($responseCode){
        if($responseCode == 0){
            $tot = 'es cero';
        }else{
            $tot = 'no es cero';
        }
        dd(tot);
    }
}
