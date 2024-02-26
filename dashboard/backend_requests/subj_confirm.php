<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $vcn = explode('|',$_POST['vcn']);
    $id = $vcn[0];
    $sub = $vcn[1];
    $scode = $vcn[2];

    print("
        <div class='msg'>
            <div class='msa'>Are you sure you wish to delete these subject test questions for $sub</div>
            <div class='dec-del-cand'>
                <form class='subdel' action='backend_requests/backend_delquest.php' method='post'>
                    <input type='hidden' name='vcn' value='$id|$sub|$scode' required readonly>
                    <button class='aj-btn'>YES</button>
                </form>
                <button class='aj-btn can-del'>NO</button>
            </div>
        </div>
    ");
}


?>