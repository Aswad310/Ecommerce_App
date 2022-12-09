<?php
    // convert price into floating format
    function numberFormat(float $amount)
    {
        return 'Rs.'.number_format(abs($amount), 2);
    }
?>
