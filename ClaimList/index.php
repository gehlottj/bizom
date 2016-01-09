<style>
select{
width:20%;
height:25px;	
text-align:center;
}
.selectDiv{
clear:both;	
align-content:center;
}

</style>	
<html>
 	<head>
 		
 		 <script type="text/javascript" src="jquery-1.11.2.min.js"></script>  

 		 <title>Claim List</title>
 		<script type="text/javascript">
 			var jsonData = new Object;
 			$(document).ready(function(){
 				$.ajax({
 					 url: "content.php", 
 					 success: function(result){
						jsonData = result;
						
						var strMainSelect = "";
						if(result['Claims'].length > 0) {
							
							strMainSelect = '<select name="lstMain" id="lstMain">';
							
							$.each(result['Claims'], function(index1, value1){
								var selectValue = value1["Claimtype"]["name"];
								var selectKey = value1["Claimtype"]["id"];
								strMainSelect += '<option value="'+selectKey+'">'+selectValue+'</option>';
							});

							strMainSelect += '</select>';

						}
						$('#div1').html(strMainSelect);
						$('#div2').html("");
						$('#div3').html("");

						$('#lstMain').on('change', function(){
							var mainSelectValue = $(this).find("option:selected").attr('value');
							var strSecondSelect = "";
//alert('jfdddgfccfgx');
							$.each(jsonData['Claims'], function(index2, value2){
								//alert('jfdddgfccfgx');
								
								var selectValue = value2["Claimtype"]["name"];
								var selectKey = value2["Claimtype"]["id"];
//alert(value2);
								if(mainSelectValue == selectKey) {
									var secondObject = new Object;

									if(value2["Claimtypedetail"].length > 0) {

										strSecondSelect = '<select name="lstSecond" id="lstSecond">';

										$.each(value2["Claimtypedetail"], function(index3, value3){
											var labelToDisplay = value3["Claimfield"]["label"];
											var idToSet = value3["Claimfield"]["id"];
											strSecondSelect += '<option value="'+idToSet+'">'+labelToDisplay+'</option>';
										});

										strSecondSelect += '</select>';
									}
								}
							});
							$('#div2').html(strSecondSelect);
							$('#div3').html("");
							
							$('#lstSecond').on('change', function(){
								var secondSelectValue = $(this).find("option:selected").attr('value');
								var strThirdSelect = "";
								var mainSelectValue = $('#lstMain').find("option:selected").attr('value');
								$.each(jsonData['Claims'], function(index1, value1){
									var claimId = value1["Claimtype"]["id"];
									$.each(value1["Claimtypedetail"], function(index2, value2){
										var claimfieldId = value2["Claimfield"]["id"];
										/*alert(mainSelectValue);
										alert(claimId);
										alert(secondSelectValue);
										alert(claimfieldId);*/
										if(mainSelectValue == claimId && secondSelectValue == claimfieldId) {
											var claimTypeDetail = new Object;
											
											if(value2["Claimfield"]["Claimfieldoption"].length > 0) {
												
											//alert("dsfdsf");
									
												strThirdSelect = '<select name="lstthird" id="lstthird">';
		
												$.each(value2["Claimfield"]["Claimfieldoption"], function(index3, value3){
													var labelToDisplay = value3["name"];
													var idToSet = value3["id"];
													//alert('sdfdsfsd');
													strThirdSelect += '<option value="'+idToSet+'">'+labelToDisplay+'</option>';
												});
		
												strThirdSelect += '</select>';//alert(strThirdSelect);
											}
											//alert(strThirdSelect);
										}
									});
									//alert(strThirdSelect);
									$('#div3').html(strThirdSelect);
								});
								
							});
							
						});
					}
				});

 			});

 		</script>
	</head>
	<body>
  
<div class="dropdown" align="center">
  <div class="dropdown-content">
		<div id="div1" class="selectDiv">
			
		</div>

		<div id="div2" class="selectDiv">
			
		</div>

		<div id="div3" class="selectDiv">
			
		</div>
</div>
</div>
	</body>
</html>
