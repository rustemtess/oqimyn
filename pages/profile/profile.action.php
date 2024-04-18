<?php

if(isset($_POST['change_perm'])) {
    $_SESSION['superId'] = intval($_POST['change_perm']);
}

?>