<?php
$page = 'mainpage';
include 'sidebar.php';
include 'header.php';
active($page)
?>
<script src="./assets/vendor/libs/jquery/jquery.js">
    $("#links").load("/mail-ayar.php #jq-p-Getting-Started li");
</script>
<?php 
include 'ticket.php';
include 'footer.php' ?>