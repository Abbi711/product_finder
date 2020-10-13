
<SCRIPT type="text/javascript">
    window.history.forward();
    //function noBack() { window.history.forward(); }
</SCRIPT>
<?php
session_start();
//unset($_SESSION["username"]);
session_destroy();
header("Location:index.php");
?>
