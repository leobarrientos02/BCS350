<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style>
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>


<script>
    function search() {
      // (A1) GET SEARCH TERM
      var data = new FormData();
      data.append("search_term", document.getElementById("search_term").value);
      
      // (A2) AJAX - USE HTTP:// NOT FILE://
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "backend-search.php");
      xhr.onload = function(){
		  			// do something to response
					document.getElementById("result").innerHTML= this.response;
      };
      xhr.send(data);
      return false;
    }

</script>


</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Name to search..." id="search_term" name="search_term" onkeyup="search()"/>
        <div class="result" id="result"></div>
    </div>
</body>
</html>