

    function UploatImages(nameImg,load,imgEnd,inputnew){
	var num=0;
		var input = document.getElementById(nameImg);
		formdata = false;
		if (window.FormData) {
			formdata = new FormData();	
		}
 		$(load).append("<center><img src='"+_root_+"Public/img/loading.gif'  /></center>");
	
 		var i = 0, len = input.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = input.files[i];
	
			if (!!file.type.match(/image.*/)) {
				
				if (formdata) {
					formdata.append("images", file);
				}
			}	
		}
	
		if (formdata) {
		var num=num+1;
			$.ajax({
				url: _root_+"ajax/upload",
				type: "POST",
				data: formdata,
                dataType: "json",
				processData: false,
				contentType: false,
				success: function (res) {
				$(load).html('');
					if(res.error==1){
						$(imgEnd).append("<a onclick='return imagesdlet(this);' class='' href='#'><img  width='150' height='100' align='right' src='"+_root_+"Public/uploads/thumb/thumb_"+res.name+"' /><input type='hidden' name='"+inputnew+"' value='"+res.name+"' /></a>");
				
					}else{
						$(load).html("<ul>"+res.error+"</ul>");
					}
				}
			});
		}
return false;
	}
	

function imagesdlet(t){
			var p=confirm("هل انت متاكد من هذا الامر");
				if(p==true){
					t.remove();
				}
					
					return false;
}	