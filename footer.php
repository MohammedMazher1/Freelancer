<?php
date_default_timezone_set("Asia/Riyadh");
// "m": Numeric representation of the month with leading zeros (01 through 12).
// "d": Day of the month, two digits with leading zeros (01 through 31).
// "H": Hour in 24-hour format (00 through 23).
// "i": Minutes with leading zeros (00 through 59).
// "s": Seconds with leading zeros (00 through 59).
// $dateTime=date("y/m/d");
// $dateTime=date("Y-m-d");
// $dateTime =date("Y-m-d H:i:s");
// $datetime= date("H:i:s a");
$dateTime=date("Y/m/d");
// $dateTime=date("a");
?>

<footer>
    <p>Copy right <?php echo $dateTime ?>  &copy; my company</p>
</footer>
