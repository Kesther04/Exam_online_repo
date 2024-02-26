$(document).ready(function () {
   
    $("#noq").keyup(function () {
        var catna = $("#noq").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","backend_requests/quest_fill.php?items="+catna,false);
        xmlhttp.send(null);
        $(".ques-tab").html(xmlhttp.responseText);
    }); 

       
 
    $("#aopt").change(function () {
        var atx = $("#aopt").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","backend_questions.php?items="+atx,false);
        xmlhttp.send(null);
        $("#total-div").load("#total-div");
    }); 
    
    $("#bopt").change(function () {
        var atx = $("#bopt").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","backend_questions.php?items="+atx,false);
        xmlhttp.send(null);
        $("#total-div").load("#total-div");
    }); 
    
    $("#copt").change(function () {
        var atx = $("#copt").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","backend_questions.php?items="+atx,false);
        xmlhttp.send(null);
        $("#total-div").load("#total-div");
        //$(".total-attempts").html(xmlhttp.responseText);
    }); 
    
    $("#dopt").change(function () {
        var atx = $("#dopt").val();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","backend_questions.php?items="+atx,false);
        xmlhttp.send(null);
        $("#total-div").load("#total-div");
    }); 
});