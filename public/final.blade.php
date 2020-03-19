<form action="http://127.0.0.1:8000" method="get" id='return-form'>
    <input type="hidden" name="csrf" value="<?php echo $token ?>">
</form>
<script>
    document.getElementById('return-form').submit();
</script>
    