<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Termékek Kezelése</h1>

        <br /><br />

                
                <a href="<?php echo SITEURL; ?>admin/add-cipo.php" class="btn-primary">Termék hozzáadása</a>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Ár</th>
                        <th>Kép</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Műveletek</th>
                    </tr>

                    <?php 

                        $sql = "SELECT * FROM tbl_cipo";

                        
                        $res = mysqli_query($conn, $sql);

                        
                        $count = mysqli_num_rows($res);

                        
                        $sn=1;

                        if($count>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?>FT</td>
                                    <td>
                                        <?php  
                                            
                                            if($image_name=="")
                                            {
                                                
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                                
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/cipo/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-cipo.php?id=<?php echo $id; ?>" class="btn-secondary">Frissités</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-cipo.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Törlés</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                           
                            echo "<tr> <td colspan='7' class='error'>Sikertelen</td> </tr>";
                        }

                    ?>

                    
                </table>
    </div>
    
</div>

