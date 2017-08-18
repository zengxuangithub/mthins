<?php
	
	header("Content-Type: text/html;charset=utf-8");
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  
  }
else
  {
  
 if (file_exists("goodsPic/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      	$timestr=time();
      	$pic_add=urldecode("http://www.mthins.com/mthins/goodsPic/".$timestr.".jpg");
      	echo $pic_add;
      	if(move_uploaded_file($_FILES["file"]["tmp_name"],"../goodsPic/".$timestr.".jpg"))
      	{
      		 
    
						$title;
						$price;
						$taobao_price;
						$quan_num;
						$good_type="1";
						$url;
						if(isset($_POST['title']))
						{
							//echo "title----->";
							 $title=$_POST["title"];
						
						}
						else
						{
							echo "no  title";
							exit;
						}
						if(isset($_POST["price"]))
						{
							$price=$_POST["price"];
							
						}
						else
						{
							echo "no  price";
							exit;
						}
						
						if(isset($_POST["taobao_price"]))
						{
							$taobao_price=$_POST["taobao_price"];
						}
						else
						{
								echo "no  taobao_price";
								exit;
						}
						if(isset($_POST["quan_num"]))
						{
							$quan_num=$_POST["quan_num"];
						}
						else
						{
							echo "no  quan_num";
							$good_type="0";
							
						}
						
						if(isset($_POST["url"]))
						{
							$url=$_POST["url"];
							
						}
						else
						{
							echo "no  url";
							exit;
						}
						
						 $mysqli=new mysqli("112.74.45.198","root","chairman521","mthins");
						
						if($mysqli->connect_error)
						{
							$error="数据库链接失败";
							echo($error);
							exit;
						}
						else
						{
							$sql="insert into goods (title,price,taobao_price,quan_num,url,goods_type,pic_url) values ('".$title."','".$price."','".$taobao_price."','".$quan_num."','".$url."','".$good_type."','".$pic_add."');";
							//$sql="insert into goods (title,price,taobao_price,quan_num,url,goods_type) values ('','".$price."',".$taobao_price."','".$quan_num."','".$url."','".$good_type."');";
							
							$result=$mysqli->query($sql);
							if($result===true)
							{
								Header("Location: ../gl/uploadGoods.html "); 
							}
							else
							{
								echo("添加商品失败".$mysqli->connect_error);
							}
							
						}
					
						
						//
				
      	}
      	else
      	{
      		echo "failed";
      	}
     

      }
  }
?>