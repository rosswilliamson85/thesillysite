
<?php  require_once("headers/header.php"); ?>


<div class="content">
<p id="homepage">The silly site was created for ridculous content. The internet doesnt have to be serious so lets make it fun again</p>
</div>



<h3>Latest Content</h3>

<?php 

    

	$data = $get_content->fetchAll(PDO::FETCH_OBJ);

	foreach($data as $content){
    

     echo "<a href=$content->url> $content->title</a>";


	}

	



?>



<?php  require_once("headers/footer.php"); ?>