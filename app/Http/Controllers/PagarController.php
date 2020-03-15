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
    public function index(){
        /* $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))->getNormalTransaction();
        $tokenWs = filter_input(INPUT_POST,'token_ws');
        $result = $transaction->getTransactionResult($tokenWs); */
        /* $output = $result->detailOutput;
        if($output == 0){
            $hola= 'PASÓ!!!!!!!';
        }else{
            $hola= 'NO PASÓ!!!!!!!';
        } */
        return redirect()->route('home');
    }
}
