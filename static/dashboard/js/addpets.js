function imageUploaded(id) {
    var file = document.getElementById(id)['files'][0];

    var reader = new FileReader();
    console.log("next");
    
    reader.onload = function () {
        base64String = reader.result  
        imageBase64Stringsep = base64String;

        localStorage.setItem("petimage",imageBase64Stringsep)
    }
    reader.readAsDataURL(file);
}


let table=$('#dataTable1').DataTable( {
"processing": true,
"ajax": "getpet.php"
} );

$("#add").click(function(){

function showerror(tag,errortag){
    if(tag.val().length==0){
        errortag.html("Required *")
        tag.addClass("errorborder")
        return false
    }else{
        tag.removeClass("errorborder")
        return true
    }
}

function checkimage(tag,errortag){
if(tag.length==0){
    errortag.html("Required *")
    return false
}else{
    if(tag[0].size>1083743){
        errortag.html("Image size must be less than 1MB*");
        return false 
    }else{
        return true
    }
}
}

let image=$("#petimage");
let categories=$("#categories");
let petname=$("#petname");
let price=$("#petprice");
let description=$("#description");

let imageerror=$("#imgerror")
let categorieerror=$("#categorieerror")
let petnameerror=$("#petnameerror")
let petpriceerror=$("#petpriceerror")
let descriptionerror=$("#discriptionerror")

imageerror.html("")
categorieerror.html("")
petnameerror.html("")
petpriceerror.html("")
descriptionerror.html("")

let error1=true,error2=true,error3=true,error4=true,error5=true;


error1=showerror(categories,categorieerror)
error2=showerror(petname,petnameerror)
error3=showerror(price,petpriceerror)
error4=showerror(description,descriptionerror)
error5=checkimage(image[0].files,imageerror)


if(error4){
if(description.val().length>500){
    descriptionerror.html("Details lenght should be less than 500*")
    error5=false;
}else{
    error5=true;
}
}

if(error5){
var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
if ($.inArray(String(image[0].files[0].name).split('.').pop().toLowerCase(), fileExtension) == -1) {
    imageerror.html("Only formats are allowed : "+fileExtension.join(', '));
    error5=false;
}
else{
    error5=true
}
}

if( error1 && error2 && error3 && error4 && error5 ){
$.ajax({
    url:"addpets.php",
    method:"post",
    data:{
        "images":localStorage.getItem("petimage"),
        "categories":$("#categories").val(),
        "petname":$("#petname").val(),
        "price":$("#petprice").val(),
        "description":$("#description").val(),
        },
    success:function(data){
        console.log(data);
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
                  localStorage.removeItem("petimage")
                  $('#modal').modal('hide');
                  $('#f1').trigger("reset");
                  $(".msg").html(echo);
                  table.ajax.reload();
            }
    }
})
}


})
