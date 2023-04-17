<!DOCTYPE html>
<html>
<head>
    
  <?php
    session_start();
    
    $conn=mysqli_connect("localhost","root","");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"on_the_go incident reporter");
    
    
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $u_id=$_SESSION['u_id'];
    $c_id=$_SESSION['cid'];
        
    $query="select c_id,description,inc_status,pol_status from complaint natural join user where c_id='$c_id' and u_id='$u_id'";
    $result=mysqli_query($conn,$query);
    
    $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$c_id'");


  ?>

	<title>Complaint Details</title>
    <link rel="stylesheet" type="text/css" href="../on_the_go incident reporter/Assets/css/complainer-complain-details.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
   
    <body>
	

        <header>

<div class="leftside">
    <a href=""> <img class="pic" src="../on_the_go incident reporter/Assets/pictures/logo.jpg" alt="Addis Ababa police commission logo"  ></a>
         
           <nav class="navleft">
             <a href="home.php"> Home </a>
            
         </nav>
 </div>

    <nav class="navigation">
       
       <a href="complainer_complain_history.php" class="active"> Complaint History</a>
       <a href="complainer_page.php">Log New Complain</a>
       <a href="Taker_logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
   
  
    </nav>   
</header>

<h4 class="title">Complaints Details</h4>
       
            <table class="table">
            <thead >
                <tr>
                    <th scope="col">Complain Id</th>
                    <th scope="col">Description</th>
                    <th scope="col">Police Status</th>
                    <th scope="col">Case Status</th>
                </tr>
            </thead>
            <?php
              while($rows=mysqli_fetch_assoc($result)){
            ?> 
             <tbody style="background-color: white; color: black;">
              <tr>
                <td><?php echo $rows['c_id']; ?></td>
                <td><?php echo $rows['description']; ?></td>     
                <td><?php echo $rows['inc_status']; ?></td>     
                <td><?php echo $rows['pol_status']; ?></td>
              </tr>
             </tbody>
            <?php
              } 
            ?>
            </table>
       
    
        <h4 class='title'>Case Details</h4>
            <table class="table ">
               <thead >
                   <tr>
                        <th class="head"scope="col">Date Of Update</th>
                        <th class="head" scope="col">Case Update</th>
                   </tr>
               </thead>
            <?php
                while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
                <tbody style="background-color: white; color: black;">
                <tr>
                    <td class="head"><?php echo $rows1['d_o_u']; ?></td>
                    <td class="head"><?php echo $rows1['case_update']; ?></td>
                </tr>
                </tbody>
            <?php
                } 
            ?>
          
            </table>
      
 
          
            </table>
        </div>
    
        <?php
        include("footer.php");
        ?>
    
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>