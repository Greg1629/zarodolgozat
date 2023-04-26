<?php 
    include('../config/constants.php');

    

    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
       

        
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

      
        if($image_name != "")
        {
          
            $path = "../images/cipo/".$image_name;

            
            $remove = unlink($path);

           
            if($remove==false)
            {
               
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
               
                header('location:'.SITEURL.'admin/manage-cipo.php');
              
                die();
            }

        }

        $sql = "DELETE FROM tbl_cipo WHERE id=$id";
       
        $res = mysqli_query($conn, $sql);

        
        if($res==true)
        {
           
            $_SESSION['delete'] = "<div class='success'>Sikeres</div>";\
            header('location:'.SITEURL.'admin/manage-cipo.php');
        }
        else
        {
        
            $_SESSION['delete'] = "<div class='error'>Sikertelen</div>";\
            header('location:'.SITEURL.'admin/manage-cipo.php');
        }

        

    }
    else
    {
       
        $_SESSION['unauthorize'] = "<div class='error'>Hibás hozzáférés</div>";
        header('location:'.SITEURL.'admin/manage-cipo.php');
    }

?>