<?php
    require_once '../vendor/autoload.php';

    use Transbank\Webpay\Webpay;
    use Transbank\Webpay\Configuration;

    $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))->getNormalTransaction();
    $tokenWs = filter_input(INPUT_POST,'token_ws');
    $result = $transaction->getTransactionResult($tokenWs);
    $output = $result->detailOutput;
    echo '<script>window.localStorage.clear();</script>';
    echo '<script>window.localStorage.setItem("responseCode",' .  $output->responseCode  . ' );</script>';
    if( $output->responseCode == 0){
        echo '<script>window.localStorage.setItem("authorizationCode",' .  $output->authorizationCode  . ' );</script>';
        echo '<script>window.localStorage.setItem("amount",' .  $output->amount  . ' );</script>';
    }
?>
<?php if($output->responseCode == 0): ?>
    <form action="http://127.0.0.1:8000/respuesta" method="GET" id='return-form'>
        <input type="hidden" name="token_ws" value='<?php echo $tokenWs ?>'>
        <input type="hidden" name="urlRedirection" value='<?php echo $result->urlRedirection ?>'>
        <input type="hidden" name="buyOrder" value='<?php echo $result->buyOrder ?>'>
        <input type="hidden" name="responseCode" value='<?php echo $output->responseCode ?>'>
        <input type="hidden" name="authorizationCode" value='<?php echo $output->authorizationCode ?>'>
        <input type="hidden" name="amount" value='<?php echo $output->amount ?>'>
    </form>
    <script>
        document.getElementById('return-form').submit();
    </script>
<?php else: ?>
    <form action="http://127.0.0.1:8000/respuesta" method="GET" id='return-form1'>
        <input type="hidden" name="token_ws" value='<?php echo $tokenWs ?>'>
        <input type="hidden" name="responseCode" value='<?php echo $output->responseCode ?>'>
    </form>
    <script>
        document.getElementById('return-form1').submit();
    </script>
<?php endif; ?>
