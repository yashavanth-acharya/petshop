let table=$('#dataTable1').DataTable( {
    "processing": true,
    "ajax": "getcategories.php"
} );


$("#add").click(function(){
    $("#error").html("")
    let error = true
    if($("#categories").val().length==0){
        $("#error").html("Required*")
        error=false
    }
    $(".msg").html("");
    if(error){
        $.ajax({
            url:"addcategorie.php",
            method:"POST",
            data:$("#f1").serialize(),
            success:function(data){
                data=JSON.parse(data);  
                let echo;
                if(data.error==1){
                    $("#error").html(data.msg)
                }
                else{
                    echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`
                      $('#exampleModal').modal('hide');
                      $("form").tigger('reset');
                      $(".msg").html(echo);
                      table.ajax.reload();
                }
            }
        })
    }
  
})