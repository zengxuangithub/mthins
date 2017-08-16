$(function()
{
	$("#file").change(function()
	{
		var objUrl = getObjectURL(this.files[0]);
		if(objUrl)
		{
			$("#img").attr("src",objUrl);
			$("#img").css("height","200px");
			$("#img").css("width","200px");
		}
        
		//alert('文件改变了');
	}
	);
	
	
	
	function getObjectURL(file)
	{
		var url=null;
		if(window.createObjectURL!=undefined)
		{
			url=window.createObjectURL(file);
		}
		else if(window.URL!=undefined)
		{
			url=window.URL.createObjectURL(file);
			
		}
		else if(window.webkitURL!=undefined)
		{
			url=	window.webkitURL.createObjectURL(file);
		}
		return url;
	}
	
}
)
