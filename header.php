<!DOCTYPE html>
<html>
<head>
	<title>
		Time Table Builder
	</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Optional theme -->
      <script src="jquery-3.1.1.min.js"></script>

      <script src="bootstrap-checkbox.min.js"></script>
    <script src="script.js"></script>

	   
	<script>
$(document).ready(function(){
  $("#breakConstraint").hide();
	$(".input-1").change(function () {
      var checked=$("#"+this.id).is(":checked");
       alert(this.id);
       var getval=$("#"+this.id).val();
       alert(getval);
     if(getval="0"){
           
       $("#"+this.id).attr("checked");
	 	
     }else if(getval="1"){

        
       $("#"+this.id).removeAttr("checked");
     }
       
       if(checked){

          if(this.id=="check6"){
                  alert("wferwet");
             $("#breakConstraint").show();
            // $("#check6").hide();
           
          }else{
 alert("wferwetxfdsx");
             $("#breakConstraint").hide();
           //  $("#check6").show();

          }
           $("#"+this.id).val("1");
          
          
       }else{
         $("#breakConstraint").hide();
          $("#"+this.id).val("0");

       }
      
});
    });
	</script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="styletwo.css">
	<style>
	.container-fluid {
   background-color: #95ce96;
}
	</style>
		
	<!-- Latest compiled and minified JavaScript -->
</head>
