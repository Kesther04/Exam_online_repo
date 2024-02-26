// To channel requests from various forms in the system to the backend without reload
$(document).ready(function () {
   
    $(".reg-req").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_register.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".aj-btn").click(function() {
                    $("#total-div").load("#total-div");
                });

            }
            
        });    
    });

    $(".upd-reqc").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_upd_cand.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".aj-btn").click(function() {
                    $("#total-div").load("#total-div");
                });

            }
            
        });    
    });

    $(".upl-req").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_upload.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".aj-btn").click(function() {
                    $("#total-div").load("#total-div");
                });

            }
            
        });    
    });

    $(".upd-req").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_upl_update.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".aj-btn").click(function() {
                    $("#total-div").load("#total-div");
                });

            }
            
        });    
    });

    $(".vwcand").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/view_candidates.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".inner-masag-cot-back").click(function() {
                    $("#total-div").load("#total-div");
                });

            }
            
        });    
    });

    $(".vwcanddel").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/confirm_delete.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".can-del").click(function() {
                    $("#total-div").load("#total-div");
                });
            }
            
        });    
    });

    $(".vwsubdel").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/subj_confirm.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $("#masag").html(dat);
                $(".can-del").click(function() {
                    $("#total-div").load("#total-div");
                });
            }
            
        });    
    });

    $(".canddel").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_delcandidate.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            // success: function(dat) {
            //     $("#masag").css({'visibility':'visible'});
            //     $("#masag").html(dat);
            // }
            
        });    
    });

    $(".subdel").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url:'backend_requests/backend_delquest.php',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            // success: function(dat) {
            //     $("#masag").css({'visibility':'visible'});
            //     $("#masag").html(dat);
            // }
            
        });    
    });
});