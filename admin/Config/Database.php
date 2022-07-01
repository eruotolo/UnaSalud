<?php
if(!session_id())
    session_start();
    $conn = mysqli_connect(
        'localhost',
        'root',
        'root',
        'dev-unasalud-01'
    );

    /*if(!session_id())
        session_start();
    $conn = mysqli_connect(
        'localhost',
        'uhpua9t5w2jaf',
        'injjgxehgbgy',
        'dbwctlmnbn81gg'
    );
    */
?>
