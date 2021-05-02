<style>

#frmCheckEmail {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'emailAddress='+$("#emailAddress").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

<div id="frmCheckEmail">
  <label>Check Email:</label>
  <input name="emailAddress" type="text" id="emailAddress" onkeyup="checkAvailability()"><span id="user-availability-status"></span>    
</div>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>