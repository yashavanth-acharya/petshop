function addtocart(id){
    $.ajax({
        url: "Addtocart.php",
        method: "POST",
        data:{"id":id},
        success: function(data){
                data=JSON.parse(data);  
                let echo;
                if(data.error==1){
                    echo=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Invalid </strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`
                    $(".msg").html(echo)
                }
                else{
                    echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>`
        
                      $(".msg").html(echo);
                     
                }
            }
    })
    }