<?php

function alert($type, $msg)
{
    echo <<<alert
        <div class="alert alert-warning alert-dismissible fade show custome-alert" role="alert">
           <strong class="me3">$msg</strong> 
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}
