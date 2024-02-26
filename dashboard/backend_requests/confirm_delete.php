<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $vcn = explode('|',$_POST['vcn']);
    $id = $vcn[0];
    $reg = $vcn[1];
    $name = $vcn[2];

    print("
        <div class='msg'>
            <div class='msa'>Are you sure you wish to delete the details of $name</div>
            <div class='dec-del-cand'>
                <form class='canddel' action='backend_requests/backend_delcandidate.php' method='post'>
                    <input type='hidden' name='vcn' value='$id|$reg' required readonly>
                    <button class='aj-btn'>YES</button>
                </form>
                <button class='aj-btn can-del'>NO</button>
            </div>
        </div>
    ");
}


?>