<?php

function check_for_number($str)
{
    $lenght = strlen($str); 
    for($i=0;$i<$lenght;)
    {
        if ((int)$str[$i++])
        {
            return true;
        }
    }
    return false;
}
