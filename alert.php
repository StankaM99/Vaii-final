<?php

function alert($typ, $text): string
{
    return '
            <div class="alert alert-'.$typ.' alert-dismissible fade show" role="alert">
              <strong>'.$text.'</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
    ';
}
?>