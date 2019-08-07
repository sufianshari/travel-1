$(function(){
	$('#countryInput').on('change',function(){
		var data=$(this).val();
		$.ajax({
			url:'ajax/cabinet',
			data:'id='+data,
			method:'post',
			success: function(data){
				$('#myData').html(data);
			},
			error: function(msq){
				console.log(msq)
			}
		});
	});
});