<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="editor.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     <script>tinymce.init({ selector:'textarea' });</script> -->
    <?php  
    include("speaker.php");
    ?>
      <?php
                 $sql="SELECT * FROM `speakers` ";
                 $results=mysqli_query($conn,$sql);
                //  $profiles=mysqli_fetch_assoc($results);
                 $speaker_edit=mysqli_query($conn,$sql);
       ?>
<!-- Add the following code inside the head tag -->
 
<style>
    .profileA{
        font-family: 'Poppins';
         font-size: 22px;
         text-align:left;
    }
    .profileB{
        font-family: 'Poppins';
         font-size: 22px;
    }

/*  */
.container{
    
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%;
    overflow: auto; 

}

.content{
    display: flex;
position: relative;
    background-color: #fffdfd;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 60%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    z-index: 1 !important;
}


select{
    font-size: medium;
    /* width: 400px; */
    padding: 5px;
    border-color: black;
}

input{

    font-size: medium;
    width: 95%;
    border-radius: 3px;
    margin: 10px !important;
    padding: 5px;
    border: 1px black solid;
    
}

.button{
    background-color: rgb(55, 55, 75);
    color: white;
    padding: 2px !important;
    border-radius: 5px;
    border-style: none;
    margin-bottom: 30px;
    float: bottom;
    font-size: medium;
}


.form{
    margin: auto;
    width: 600px;
    
}

.content h2{
    margin-right: 10px;
}

.textarea{
    width: 650px;
    margin-top: 10px;
    margin-bottom: 10px;
    border: 1px black solid;
   
}

#add_fields{
    text-decoration: none;
    padding: 5px;
    background-color: white;
    border-color: rgb(71, 71, 197);
    color: rgb(71, 71, 197);
    margin: 10px;
    border-radius:5px;
    
}
.close {
    color: #5f5050;
    float: right;
    justify-items: right;
     margin-top: -40px;
    
    font-size: 28px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }



/*  */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

</head>
<body>
<!-- popup text editor -->

<div class="container" >
    <div class="content">
        <form action="speaker.php" method="post" class="form" id="form" enctype="multipart/form-data">
            <span class="close" id="closeid">&nbsp;&nbsp;&nbsp;&nbsp;&times;</span>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">   Name Of Speaker: </label>
                  <input type="text" name="name_speaker" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email:</label>
                  <input type="text" name="email" class="form-control" id="exampleFormControlInput1">
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Country:</label>
                <input type="text" name="country" class="form-control" id="exampleFormControlInput1">
            </div> 
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contact:</label>
                <input type="text" name="contact" class="form-control" id="exampleFormControlInput1">
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Image:</label>
                  <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                 <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>             
            <button type="submit" class="button" id="submit">Submit</button>
        </form>
    </div>
</div>

<!-- popup text editor end -->
 <!-- edit button pop and edit form -->
 <?php   while($rows=$speaker_edit->fetch_assoc()) {  ?>
<div class="modal fade" id="Examplemodel<?php echo $rows["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$rows["name_speaker"] ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="speaker.php" method="post" enctype="multipart/form-data">

        <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Name of speaker</label>
                 <textarea class="form-control" name="name_speaker" id="exampleFormControlTextarea1" rows="3" > <?=$rows["name_speaker"] ?></textarea>
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Speaker Image</label>
                <br>
                <img src="image/<?=$rows["image"] ?>" alt="ex image" style="width:100px; height:100px;">
                  <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                 <textarea class="form-control" name="email" id="exampleFormControlTextarea1" rows="3" > <?=$rows["email"] ?></textarea>
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Country</label>
                 <textarea class="form-control" name="country" id="exampleFormControlTextarea1" rows="3" > <?=$rows["country"] ?></textarea>
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Contact</label>
                 <textarea class="form-control" name="contact" id="exampleFormControlTextarea1" rows="3" > <?=$rows["contact"] ?></textarea>
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                 <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" > <?=$rows["description"] ?></textarea>
            </div>
            <input type="text"  name="id"  value="<?=$rows["id"] ?>" required hidden />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
    </div>
    
  </div>

</div>

</form>
<?php }?>
<!-- view class -->



<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-`lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical" style="max-width:215px">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-div="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="ADORE.png" alt="...">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <!-- <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a> -->
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-divledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="login1.html" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item active" >
                        <!-- <a class="nav-link" href="index.php">
                            <i class="bi bi-house" ></i>  Home -->
                            <a class="nav-link" href="index.php">
                            <i class="bi bi-house" ></i>
                                Home <span class="sr-only"> (active)</span></a>
                        <!-- </a> -->
                    </li>
                    <!-- user................-->
                    <!-- Inside your modal -->

    <!-- Your other modal content -->

    <!-- User Button -->
    

                  <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <i class="bi bi-people" ></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">
                            <i class="bi bi-people" ></i> bio of speaker
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                <!-- <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                            <i class="bi bi-person-square"></i> bio of speaker
                        </button>
                    </li> -->
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                            <i class="bi bi-person-square"></i> Account
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login1.html">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-5 ">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight ">Bio of speaker</h1>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">

<!-- Modal -->


<!-- Your existing code for the "Entry" button -->
<span class="btn d-inline-flex btn-sm btn-primary mx-1">
     <span class="pe-2" id="entry" >       
        <i class="bi bi-plus"></i>
       CREATE
    </span>
                                 </span>
                            </div>
                        </div>
                    </div>
                    <!-- Nav -->
                    
                </div>
            </div>
        </header>
        <!-- Main -->
        
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0" style="box-shadow: none;">Applications</h5> 
                    
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                    <!-- <th scope="col">Id</th> -->
                                    <th scope="col">Name of speaker</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">TimeStamp</th>
                                    <th scope="col">Image</th>
                                    <!-- <th scope="col">TimeStamp</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                               
                               while ($rows = $results->fetch_assoc()) { ?>
                                    
                                <tr>
                                    <td>
                                       
                                        <a class="text-heading font-semibold" href="#">
                                            <!-- backend  -->
                                               <?php echo $rows["name_speaker"] ?>
                                        
                                        </a>
                                    </td>
                                    <td>
                                    <?php echo $rows["email"] ?>
                                    </td>
                                    <td>
                                       
                                        <a class="text-heading font-semibold" href="#">
                                            <!-- <span class="badge badge-lg badge-dot"><i class="bg-success"></i></span> -->
                                           <?php echo $rows["country"]?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $rows["contact"] ?>
                                    </td>
                                    <td>
                                        <?php echo $rows["created_at"] ?>
                                    </td>
                                    <td>
                                        <?php echo $rows["image"] ?>
                                    </td>
                                
                                <td class="text-end">
                                       
                                       <!-- <a href="#" class="btn btn-sm btn-neutral">View</a> -->
                                <button type="button" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-bs-toggle="modal" 
                                        data-bs-target="#Examplemodel<?php echo $rows["id"];?>" data-bs-whatever="@mdo">
                                       <i class="bi bi-pencil" ></i>Edit
                                                  </button>
 
                                        <!-- Button trigger modal -->
                                        <a href="speaker_viewpage.php?id=<?php echo $rows["id"]; ?>" class="btn btn-sm btn-neutral">View</a>             
                           
                                        <a href="delete1.php?id=<?php echo $rows["id"]; ?>" class="btn btn-sm btn-neutral">Delete</a>
                                   </td>

                                </tr>

                                   <?php  }?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 0 items out of 0 results found</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Add the following code inside the script tag or include it from an external file -->

<script defer src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


 <script src="entry.js"></script>
                      
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="s-keyboard="false" tabindex="-1" aria-divledby="staticBackdropdiv" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">tatic" data-bs
                            <div class="modal-body"> 
                                <div class="row" >
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                        <div class="profileA"><b>Name</b></div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["name_speaker"] ?></div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                        <div class="profileA"><b>Country</b></div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["email"] ?></div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                        <div class="profileA"><b>Email</b> </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["country"]  ?></div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                        <div class="profileA"> <b> Contact:</b></div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["contact"] ?> </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["image"] ?> </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="login2 pull-left pull-right-pro"><?=$profiles["description"] ?> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
                            </div>
                        </div>
                    </div>
                </div>


    </body> 
    </html>