<?php
    $t1=$post->post_date;
    $t2=date("Y-m-d H:i:s");
    $diff=(strtotime($t2)-strtotime($t1))/7200;
    if($diff<24){echo '<span class="new_img"></span>';}
?>