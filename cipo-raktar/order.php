<?php include('partials-front/menu.php'); ?>

    <?php 
        
        if(isset($_GET['cipo_id']))
        {
           
            $cipo_id = $_GET['cipo_id'];

            
            $sql = "SELECT * FROM tbl_cipo WHERE id=$cipo_id";
            
            $res = mysqli_query($conn, $sql);
           
            $count = mysqli_num_rows($res);
            
            if($count==1)
            {
                
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                
                header('location:'.SITEURL);
            }
        }
        else
        {
            
            header('location:'.SITEURL);
        }
    ?>

   
    <section class="cipo-search">
        <div class="container">
            
            <h2 class="text-center text-white">Rendelés Kitöltése</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Kiválaszott cipő</legend>

                    <div class="cipo-menu-img">
                        <?php 
                        
                            
                            if($image_name=="")
                            {
                                
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                               
                                ?>
                                <img src="<?php echo SITEURL; ?>images/cipo/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="cipo-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="cipo" value="<?php echo $title; ?>">

                        <p class="cipo-price"><?php echo $price; ?>FT</p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Méret</div>
                        <input type="number" name="meret" class="input-responsive" min="40" max="46" required>
                        
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend >Szállítási adatok</legend>
                    <div class="order-label">Teljes név</div>
                    <input type="text" name="full-name" placeholder="Teljes Név" class="input-responsive" required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="contact" placeholder="Telefonszám" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="email cím" class="input-responsive" required>

                    <div class="order-label">Cím</div>
                    <textarea name="address" placeholder="Cím" class="input-responsive" required></textarea>
                    <input type="submit" name="submit" value="Rendelés" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                
                if(isset($_POST['submit']))
                {
                    

                    $cipo= $_POST['cipo'];
                    $price = $_POST['price'];
                    $meret = $_POST['meret'];

                    $total = $price;

                    $order_date = date("Y-m-d h:i:sa"); 

                    $status = "Ordered";  

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    
                    $sql2 = "INSERT INTO tbl_order SET 
                        cipo = '$cipo',
                        price = $price,
                        meret = $meret,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

                 
                    $res2 = mysqli_query($conn, $sql2);

                    
                    if($res2==true)
                    {
                        
                        $_SESSION['order'] = "<div class='success text-center'>Sikeres Rendelés</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        
                        $_SESSION['order'] = "<div class='error text-center'>Sikertelen Rendelés</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>