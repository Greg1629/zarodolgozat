
    <?php include('partials-front/menu.php'); ?>

    
    <section class="cipo-search text-center">
        <div class="container">
            <?php 

                //Get the Search KeywordExplore
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Keresés eredménye erre: <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>



    <section class="-menucipo">
        <div class="container">
            <h2 class="text-center">Termékek</h2>

            <?php 

                $sql = "SELECT * FROM tbl_cipo WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

               
                $res = mysqli_query($conn, $sql);

              
                $count = mysqli_num_rows($res);

                
                if($count>0)
                {
                    
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="cipo-menu-box">
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
                                <h4><?php echo $title; ?></h4>
                                <p class="cipo-price"><?php echo $price; ?>FT</p>
                                <p class="cipo-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Megveszem</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    
                    echo "<div class='error'>Nincs találat</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
   

    <?php include('partials-front/footer.php'); ?>