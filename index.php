<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">   
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>    
   <style>
       .form-control
       {
           border-radius:20px;
       }
       .la{
        font-weight:bold;
       }
   </style>
   
    <div class="bg-danger">
    <div class="container">  
    <div class="row">        
       <div class="col-12">
          <h1 class="text-center p-3 text-light">CRUD Application</h1>
       </div>
    </div>
</div>
</div>
<!--end heading-->
<div class="jumbotron">
<div class="container">
    <div class="row">
    <div class="col-md-4 col-sm-12 mt-3">
        <h2 class="page-header p-3">Add Students</h2><hr>
        <form id="frm">
            <div class="form-group p-2">
                <label for="name" class="la">Name :</label><br>
                <input type="text" class="form-control" name="name" id="name" placeholder="enter the name">
            </div>
            <div class="form-group p-2">
                <label for="name" class="la">Age :</label><br>
                <input type="text" class="form-control" name="age" id="age" placeholder="enter the name">
            </div>
            <div class="form-group p-2">
                <label for="name" class="la">City :</label><br>
                <input type="text" class="form-control" name="city" id="city" placeholder="enter the name">
            </div>
            <div class="form-group p-2">
            <input type="hidden" name="id" id="id" value="0">   
            <button type="button" class="btn btn-success d-inline" id="save" value="save details" style="width:70px;">Save</button>
            </div>
            <div class="form-group p-2">
             <p class="text-success" id="sa"></p>
               </div>
        </form>
    </div>
    <div class="col-md-8 col-sm-12 mt-3" >
    <h2 class="page-header p-3 text-center">Students Details</h2>
    <div class="container table-responsive" id="output">

    </div>
    </div>

</div>
</div>
<!--contant end-->
<script>
    $(document).ready(function(){
        $("#output").load("view.php");
$("#save").click(function(){
    var id=$("#id").val();
    if(id==0)
    {
    $.ajax({
        url:"insert.php",
        type:"post",
        data:$("#frm").serialize(),
        success:function(d)
        {
        $("<tr></tr>").html(d).appendTo(".table");
        $("#frm")[0].reset();
        $("#id").val(""); 
        }
    });  
    }
    else{
        $.ajax({
        url:"update.php",
        type:"post",
        data:$("#frm").serialize(),
        success:function(d)
        {
            $("#output").load("view.php"); 
        $("#frm")[0].reset();
        $("#id").val(""); 
        }
    }); 
    }  

});

$(document).on("click",".del",function(){
var del=$(this);
var id=$(this).attr("data-id");
$.ajax({
        url:"delete.php",
        type:"post",
        data:{id:id},
        success:function(){
       del.closest("tr").hide();
        }
    }); 

});
//update
    $(document).on("click",".edit",function(){
var row=$(this);
var id=$(this).attr("data-id");
$("#id").val(id);  
var name=row.closest("tr").find("td:eq(0)").text();
$("#name").val(name);
var age=row.closest("tr").find("td:eq(1)").text();
$("#age").val(age);
var city=row.closest("tr").find("td:eq(2)").text();
$("#city").val(city);
   
});



    });
</script>
</body>
</html>