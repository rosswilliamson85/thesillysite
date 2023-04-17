<?php 

require_once("con.php");
$url = $_POST['url'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$check_if_voted = $conn->prepare("SELECT ip FROM votes WHERE ip = :ip AND url = :url");
                    $check_if_voted->bindParam("ip",$ip);
                    $check_if_voted->bindParam("url",$url);
                    $check_if_voted->execute();





				if($_POST['data'] == 1){


					

                    if($check_if_voted->rowCount() > 0){

                    	echo "<script> 

                    Swal.fire(
					  'Error!',
					  'You have already voted',
					  'error'

                      )

				 	</script>";

                    }else{
                    
				    $count = 1;
				    $insert_row = $conn->prepare("INSERT INTO votes (url,ip,yes) VALUES(:url,:ip,:count)");
				    $insert_row->bindParam("url",$url);
				    $insert_row->bindParam("count",$count);
				    $insert_row->bindParam("ip",$ip);
				    
				    $insert_row->execute();


				     }


				$count = $conn->prepare("SELECT yes from votes WHERE url = :url");
				$count->bindParam("url",$url);
				$count->execute();


				if($count->rowCount() > 0){
				    
				    
                   

					$sum = $conn->prepare("SELECT SUM(yes) as value  from votes WHERE url = :url");
					$sum->bindParam("url",$url);
					$sum->execute();

					$total = $sum->fetch(PDO::FETCH_OBJ);



					

					echo $total->value;
				}







				}





				if($_POST['data'] == 0){

				$count = 1;
				 if($check_if_voted->rowCount() > 0){

				 	echo "<script> 

                    Swal.fire(
					  'Error!',
					  'You have already voted',
					  'error'

                      )

				 	</script>";
				 }else{


				   $insert_row = $conn->prepare("INSERT INTO votes (url,ip,no) VALUES(:url,:ip,:count)");
				    $insert_row->bindParam("count",$count);
				    $insert_row->bindParam("ip",$ip);
				    $insert_row->bindParam("url",$url);
				    $insert_row->execute();

                  }
				$count = $conn->prepare("SELECT no from votes WHERE url = :url ");
				$count->bindParam("url",$url);
				$count->execute();


				if($count->rowCount() > 0){
				    
				    


					$sum = $conn->prepare("SELECT SUM(no) as value  from votes");
					$sum->execute();

					$total = $sum->fetch(PDO::FETCH_OBJ);



					

					echo $total->value;
				}







				}




				if($_POST['data'] == 2){


					

                    if($check_if_voted->rowCount() > 0){

                    	echo "<script> 

                    Swal.fire(
					  'Error!',
					  'You have already voted',
					  'error'

                      )

				 	</script>";

                    }else{
                    
				    $count = 1;
				    $insert_row = $conn->prepare("INSERT INTO votes (url,ip,mutual) VALUES(:url,:ip,:count)");
				    $insert_row->bindParam("url",$url);
				    $insert_row->bindParam("count",$count);
				    $insert_row->bindParam("ip",$ip);
				    
				    $insert_row->execute();


				     }


				$count = $conn->prepare("SELECT mutual from votes WHERE url = :url");
				$count->bindParam("url",$url);
				$count->execute();


				if($count->rowCount() > 0){
				    
				    
                   

					$sum = $conn->prepare("SELECT SUM(mutual) as value  from votes WHERE url = :url");
					$sum->bindParam("url",$url);
					$sum->execute();

					$total = $sum->fetch(PDO::FETCH_OBJ);



					

					echo $total->value;
				}







				}



