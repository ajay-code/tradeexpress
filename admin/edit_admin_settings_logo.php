<?php
require_once("function.php");
?>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

</script>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Logo
</span>
</div>
 

<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="file" name="login_page_logo" id="image" value=""  onchange="loadFile(event)" />
</label>
<img src="../images/<?php echo get_site_settings(17);  ?>" id="output" width="160" />
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"  value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>

</div>
 
</div>
</section>