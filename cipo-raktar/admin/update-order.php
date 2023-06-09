<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Rendelés frissítése</h1>
        <br><br>


        <?php 
        
            
            if(isset($_GET['id']))
            {
                
                $id=$_GET['id'];

               
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
               
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    
                    $row=mysqli_fetch_assoc($res);

                    $cipo = $row['cipo'];
                    $price = $row['price'];
                    $meret = $row['meret'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address= $row['customer_address'];
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
               
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Termék neve</td>
                    <td><b> <?php echo $cipo; ?> </b></td>
                </tr>

                <tr>
                    <td>Összeg</td>
                    <td>
                        <b><?php echo $price; ?>Ft</b>
                    </td>
                </tr>

                <tr>
                    <td>Méret</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $meret; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Vásárló neve: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Vásárló telefonszám: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Vásárló email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Vásárló címe: </td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Rendelés frissítése" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            
            if(isset($_POST['submit']))
            {
                
                $id = $_POST['id'];
                $price = $_POST['price'];
                $meret = $_POST['qty'];

                $total = $price;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                
                $sql2 = "UPDATE tbl_order SET 
                    meret = $meret,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id
                ";

                
                $res2 = mysqli_query($conn, $sql2);

                
                if($res2==true)
                {
                    
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>


    </div>
</div>


