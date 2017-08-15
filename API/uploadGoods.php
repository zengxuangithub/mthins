<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  
  }
else
  {
  	
  //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  //echo "Type: " . $_FILES["file"]["type"] . "<br />";
  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br/>";
 if (file_exists("goodsPic/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      	if(move_uploaded_file($_FILES["file"]["tmp_name"],"../goodsPic/".$_FILES["file"]["name"]))
      	{
    

						if(isset($_POST['title']))
						{
							//echo "title----->";
							 
							Header("Location: ../gl/uploadGoods.html "); 
						}
						else
						{
							echo "no";
						}
				
      	}
      	else
      	{
      		echo "failed";
      	}
     

      }
  }
?>