

function changeselect(values,page,sub){

    var valued=$(values).val();
    $(sub).html('<option >انتظر من فضلك</option>');
    $.ajax({
				type: "POST",
				url: _root_+"ajax/"+page,
				data : "v="+valued,
				success: function(response){
					$(sub).html(response);
					$(sub).selectpicker('refresh');
				}
			});


					return false;
}

$(document).ready(function(){
   
 $("#pricemazad").submit(function(){
 $("#alertmazad").show();
    $.ajax({
				type: "POST",
				url: _root_+"cars/index/addmazad/",
				data : $("#pricemazad").serialize(),
				success: function(response){
                    if(response==1){
                        $("#pricemazad").hide();
                        $("#alertmazad").removeClass('alert-info');
                        $("#alertmazad").addClass('alert-success');
                        $("#alertmazad").text('تم الاضافة بنجاح');
                        
                    }else{
                        $("#alertmazad").addClass('alert-info');
                        $("#alertmazad").removeClass('alert-success');
                        $("#alertmazad").html(response);
                    }
					
				}
			});
   
    return false;
});

					
   
});

 $(document).on('hidden.bs.modal', function (e) {
        var target = $(e.target);
        target.removeData('bs.modal')
        .find(".clearable-content").html('');
    });




$(document).on("click", "#mazss", function(event){
 
    $("#alertacceptmazad").show();
    $.ajax({
				type: "POST",
				url: _root_+"cars/index/accept/",
				data : $("#submitacceptmazad").serialize(),
				success: function(response){
                    if(response==1){
                        $("#submitacceptmazad").hide();
                        $("#alertacceptmazad").removeClass('alert-info');
                        $("#alertacceptmazad").addClass('alert-success');
                        $("#alertacceptmazad").text('تم الارسال للعضو');
                        
                    }else{
                        $("#alertacceptmazad").addClass('alert-info');
                        $("#alertacceptmazad").removeClass('alert-success');
                        $("#alertacceptmazad").html(response);
                    }
					
				}
			});
   
    return false;
});


     
         $(document).ready(function() {
$("#get_price").click(function(){
//alert("xzcasx");
    var id = $("#priceval").val();
    $.post(_root_+"ajax/getprice",{id:id}, function(data){
        $("#price_val").html(data);
        });
    return false;
    });
	
	  });