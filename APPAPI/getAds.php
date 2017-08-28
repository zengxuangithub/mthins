<?php
	header("Content-Type: text/json;charset=utf-8");
	$mysqli=new mysqli("112.74.45.198","root","chairman521","mthins");
 
 	if($mysqli->connect_error)
	{
		$result=array('error-'=>'1','info'=>'database failed'.$mysqli->connect_error);
		echo json_encode($result);
		exit;
	}
	else
	{
		

        $sql="select * from ads ;";
                

		mysqli_query($mysqli, "set names utf8");
		//编码设置必须在执行查询前

		$sqlresult=$mysqli->query($sql);
		
		
		if($sqlresult)
		{
			
			$goodsList=array();
			
			while($row=mysqli_fetch_assoc($sqlresult))
			{
			 $title=$row["title"];
			 $price=$row["price"];
			 $ad_pic=$row["ad_pic"];
			 $taobao_price=$row["taobao_price"];
			 $quan_num=$row["quan_num"];
			 $url=$row["url"];
			 $goods_type=$row["goods_type"];
			 $pic_url=$row["pic_url"];
			 $goods=array("title"=>$title,"price"=>$price,"taobao_price"=>$taobao_price,"quan_num"=>$quan_num,"url"=>$url,"goods_type"=>$goods_type,"ad_pic"=>$ad_pic,"pic_url"=>$pic_url);
			 $goodsList[]=$goods;
			}
			
			$goodsArray=array("error"=>"0","goods"=>$goodsList);
			echo (json_encode($goodsArray));

			
			
		}
		else
		{
			echo"错误";
		}
		
		
		
		
	}
	
	mysqli_close($mysqli);
	
?>