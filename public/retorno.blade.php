<?php
    require_once '../vendor/autoload.php';

    use Transbank\Webpay\Webpay;
    use Transbank\Webpay\Configuration;

    $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))->getNormalTransaction();
    $tokenWs = filter_input(INPUT_POST,'token_ws');
    $result = $transaction->getTransactionResult($tokenWs);
    $output = $result->detailOutput;
    if($output->responseCode == 0){
        echo '<scipt>window.localStorage.clear();</script>';
        echo '<scipt>window.localStorage.setItem("authorizationCode",' .  $output->authorizationCode  . ' );</script>';
        echo '<scipt>window.localStorage.setItem("amount",' .  $output->amount  . ' );</script>';
        echo '<scipt>window.localStorage.setItem("responseCode",' .  $output->responseCode  . ' );</script>';
    }else{

    }
?>
<?php if($output->responseCode == 0): ?>
    <form action="http://127.0.0.1:8000" method="GET" id='return-form'>
        <input type="hidden" name="token_ws" value='<?php echo $tokenWs ?>'>
    </form>

    <script>
        document.getElementById('return-form').submit();
    </script>
<?php endif; ?>