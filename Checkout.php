<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
</head>
<body>
<?php
session_start();
session_destroy();
echo "<script>";
echo "alert('Logout Success')";
echo "</script>";
echo "<META HTTP-EQUIV='Refresh' CONTENT ='1;URL=./index.php'>";
?>
    <script type="text/javascript">
            function noBack(){
                window.history.forward()
            }
            noBack();
            window.onload = noBack;
            window.onpageshow = function(evt) { if (evt.persisted) noBack() }
            window.onunload = function() { void (0) }
            </script>
</body>
</html>

