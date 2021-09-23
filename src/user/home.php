<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="/petshop_project/static/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <style>
        #message {
        height: 248px;
        }

        input {
        height: 70px;
        }
    </style>

</head>
<body>
   
	

<header class="text-center text-white masthead">
        <div class="masthead-content">
            <div class="container">
                <h1 class="masthead-heading mb-0">PET PARADISE</h1>
                <h2 class="masthead-subheading mb-0">All pets favourite place :)</h2>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
    </header>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="rounded-circle img-fluid" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/golden-retriever-royalty-free-image-506756303-1560962726.jpg?crop=0.672xw:1.00xh;0.166xw,0&amp;resize=640:*"></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Dog</h2>
                        <p>The dog or domestic dog is a domesticated descendant of the wolf, characterized by an upturning tail. The dog derived from an ancient, extinct wolf, and the modern grey wolf is the dog's nearest living relative.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5"><img class="rounded-circle img-fluid" src="https://static.affinity-petcare.com/advance/cdn/farfuture/JOoq_jxUyjH7E0lazgJUuJ6DAQOWIGVUqggiIQr4oUA/drupal-cache:qvko3p/sites/default/files/styles/article-list/public/field/image/16-bosque_noruega.jpeg?itok=LXSxp1mE"></div>
                </div>
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <h2 class="display-4">Cat</h2>
                        <p>The cat is a domestic species of small carnivorous mammal. It is the only domesticated species in the family Felidae and is often referred to as the domestic cat to distinguish it from the wild members of the family.&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <?php

function checkempty($tag) {
    if($tag==""){
        return false;
    }
    else{
        return true;
    }
}

function validate($type,$tag) {

    if($type=="phone"){
        if(!preg_match("/^[0-9]{10}+$/",$tag)){
            return false;
        }else{
            return true;
        }
    }

    if($type=="email"){
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$tag)){
            return false;
        }else{
            return true;
        }
    }

}

        $name_error="";
        $email_error="";
        $phone_error="";
        $msg_error=""; 

        $name="";
        $email="";
        $phone="";
        $message=""; 
        if(isset($_POST['sendMessageButton'])){
            $name_error="";
            $email_error="";
            $phone_error="";
            $msg_error=""; 

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone=$_POST['phone'];
            $message = $_POST['message'];
            $name_error1=checkempty($name);
            if(!$name_error1){
                $name_error='Required *';
            }
            $phone_error1=checkempty($phone);
            if(!$phone_error1){
                $phone_error='Required *';
                }

            $email_error1=checkempty($email);
            if(!$email_error1){
                $email_error='Required *';
            }


            $msg_error1=checkempty($message);
            if(!$msg_error1){
                $msg_error='Required *';
            }


            if($phone_error1){
                $phone_error1=validate("phone",$phone);
                if(!$phone_error1){
                    $phone_error='Invalid phone number';
                }
            }

            if($email_error1){
                $email_error1=validate("email",$email);
                if(!$email_error1){
                    $email_error='Invalid Email id';
                }
            }

            if($name_error1 && $phone_error1 && $msg_error1 && $email_error1){

                $sql="INSERT INTO `contactus`(`name`, `email`, `phone`, `message`) VALUES ('".$name."','".$email."','".$phone."','".$message."')";
                $confirm=mysqli_query($conn,$sql);
   
                if($confirm){
                    echo "<script>alert('Thank you')</script>";
                }else
                {
                    echo "Server error";
                }


                            }
        }
        ?>
        <section id="contact" style="background-image: url('https://coolbackgrounds.io/images/backgrounds/index/ranger-4df6c1b6.png');padding: 25px;background-size:cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="text-uppercase section-heading">Contact Us</h2>
                        <h3 class="text-muted section-subheading"></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" method="post" name="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Your Name *" required value="<?php echo $name ?>">
                                        <small class="form-text text-danger flex-grow-1 help-block lead">
                                        <?php echo $name_error;  ?>
                                        </small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Your Email *" required="" value="<?php echo $email ?>">
                                        <small class="form-text text-danger help-block lead">
                                        <?php echo $email_error;  ?>
                                        </small>
                                    </div>
                                    <div class="form-group mb-3"><input class="form-control" name="phone" type="tel" placeholder="Your Phone *" required value="<?php echo $phone ?>">
                                    <small class="form-text text-danger help-block lead">
                                    <?php echo $phone_error;  ?>
                                    </small></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required>
                                        <?php echo $message ?>
                                        </textarea>
                                        <small class="form-text text-danger help-block lead">
                                        <?php echo $msg_error;  ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" name="sendMessageButton" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
 <script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</body>
</html>