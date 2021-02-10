<?php

$mysqli = new mysqli("localhost", "root", "dtb456", "udaje");

if($mysqli->connect_error) {
    exit('Could not connect');
}


$sql = "SELECT nazov, zaner, hodnotenie, obrazok FROM udaje.serialy ORDER BY RAND() LIMIT 1";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nazov, $zaner, $hodnotenie, $obrazok);
$stmt->fetch();
$stmt->close();

echo '
        <div class="card shadow-sm">
                <div class="card-header cover"> 
                    <h3>
                        Tip na serial:
                    </h3>
                </div>
                             <div class="uprava2 mt-2">
                                <img src='. $obrazok .'  width="300" height="400" class="responsive" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        '.$nazov.'
                                         <br>
                                          Hodnotenie:    '. $hodnotenie .'
                                         <br>
                                          Žáner : '.$zaner.'
                                    </p>
                                </div>
                            </div>
                            
                             <div class="odsad"
                                <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">'.$nazov.'</small>
                                </div>
                            </div>
        </div>

';
?>