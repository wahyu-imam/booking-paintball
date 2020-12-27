<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body>
    <p><input type="number" id="total" name="total" value="100000" readonly /></p>
    <p><input type="number" id="input" name="input" /></p>
    <p id="kembali"></p>
</body>
</html>

<script type="text/javascript">
    $('#input').on('keyup', function(){
        var total = parseInt (document.getElementById('total').value);
        var input = parseInt ($(this).val());
        var kembali = input - total;
        $('#kembali').text(kembali);
    });
</script>