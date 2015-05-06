<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

       <div class="top-welcome">
            <h2>Write a Review</h2>
        </div>

			
			<form id="search" name="search">
        <div class="form-field">
          <label>Search</label>
          <br/>
    			<input type="search" name="search_text" onkeyup="findmatch();" autocomplete="off" style="width:300px;" placeholder="Please enter the name of a person">
        </div>
			</form>
	<br>		
	<div id="result"></div>
  </div>
</div>


<script>
  function findmatch(){
  if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
      document.getElementById("result").innerHTML=xmlhttp.responseText;
      }
    }

  xmlhttp.open("GET","<?php echo base_url()?>user/search_for_careseeker?search_text="+document.search.search_text.value,true);
  xmlhttp.send();
  }

</script>