<style>

#frmCheckEmail {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script>
    function checkAvailability() {
      // (A1) GET SEARCH TERM
      var data = new FormData();
      data.append("emailAddress", document.getElementById("emailAddress").value);
      
      // (A2) AJAX - USE HTTP:// NOT FILE://
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "check_availability.php");
      xhr.onload = function(){
		  			// do something to response
					document.getElementById("email-availability-status").innerHTML= this.response;
					document.getElementById("loaderIcon").style.display='none';
      };
      xhr.send(data);
      return false;
    }

</script>



<div id="frmCheckEmail">
  <label>Check Email:</label>
  <input name="emailAddress" type="text" id="emailAddress" onkeyup="checkAvailability()"><span id="email-availability-status"></span>    
</div>
<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>