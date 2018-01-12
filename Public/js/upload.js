



function UploatImages(nameImg,load,imgEnd,inputnew,mainImgClass='',mainImgWidth=0,mainImgHeight=0,imgThumbId=''){
	var num=0;
		var input = document.getElementById(nameImg);

        var $imgThumb = 0;
        if(imgThumbId != ''){
            $imgThumb = $('#'+imgThumbId);
        }
		formdata = false;
		if (window.FormData) {
			formdata = new FormData();	
		}
        // add the gif to the span
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
				$(load).html(''); // remove the gif from the span
					if(res.error==1){
                        var imgStr = "<img ";
                        if(mainImgClass != '') imgStr += "class='"+mainImgClass+"' ";
                        if(mainImgWidth == 0) imgStr += "width='300' ";
                        else imgStr += "width='"+mainImgWidth+"' ";
                        if(mainImgHeight == 0) imgStr += "height='300' ";
                        else imgStr += "height='"+mainImgHeight+"' ";
                        if(mainImgClass != '') imgStr += "class='"+mainImgClass+"' ";
                        imgStr += " align='center' src='"+_root_+"Public/uploads/"+res.name+"' />";
                        imgStr += "<input type='hidden' name='"+inputnew+"' value='"+res.name+"' />";
						$(imgEnd).append("<a onclick='return imagesdlet(this);' class='' href='#'>"+imgStr+"</a>");
                        if($imgThumb != 0){
                            $imgThumb.attr('data-thumb',_root_+'Public/uploads/thumb/thumb_'+res.name);
                        }
				
					}else{
						$(load).html("<ul>"+res.error+"</ul>");
					}
				}
			});
		}
return false;
	}
	
function openBrowseDialog(browseDialogId){
    $('#'+browseDialogId).click();
}

function imagesdlet(t){
			var p=confirm("هل انت متاكد من هذا الامر");
				if(p==true){
					t.remove();
				}
					
					return false;
}	