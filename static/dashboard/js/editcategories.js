function Edit(id){
    $("#editerror").html("")
localStorage.setItem("id",id)
$('#edit').modal('show');
$("#editcategories").text("Loading....");

$.ajax({
    url:"editviewcategorie.php",
    method:"POST",
    data:{"id":id},
    success:function(data){
        data=JSON.parse(data);  
        if(data.error==1){
            $("#editerror").html(data.msg)
        }
        else{
            $("#editcategories").text(data.data); 
        }
    }
})
}
$("#editbtn").click(function(){
    let error = true
    if($("#editcategories").val().length==0){
        $("#editerror").html("Required*")
        error=false
    }
    $(".msg").html("");
    if(error){
        $.ajax({
            url:"editcategorie.php",
            method:"POST",
            data:{"id":localStorage.getItem("id"),"categories":$("#editcategories").val()},
            success:function(data){
                data=JSON.parse(data);  
                let echo;
                if(data.error==1){
                    $("#editerror").html(data.msg)
                }
                else{
                    localStorage.removeItem("id")
                    echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                        $('#edit').modal('hide');
                        $(".msg").html(echo);
                        table.ajax.reload();
                }
            }
        })
    }
    
})