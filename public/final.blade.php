<form action="http://127.0.0.1:8000/respuesta" method="get" id='return-form'>
    <input type="hidden" name="csrf" value="<?php echo $token ?>">
    <input type="hidden" name="responseCode" id='qwe' value = '0' >
</form>
<form action="http://127.0.0.1:8000/respuesta" method="get" id='return-form1'>
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    <input type="hidden" name="responseCode" id='asd'  value = '1'>
</form>
<script>
    if(window.localStorage.getItem('responseCode') == 0){
        document.getElementById('return-form').submit();
    }else{
        document.getElementById('return-form1').submit();
    }
</script>