<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload Manager</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container" >
    	<div class="drag-area">Drag files here to upload</div>
        <div class="bar"><span class="progress-bar"><span class="progress-status">20%</span></span></div>
    	<div class="upload-area">
    		<fieldset>
    			<legend>upload form</legend>
    			<form action="app/upload.php" method="post" enctype="multipart/form-data">
    				<input type="file" name="file[]" multiple>
    				<input type="submit" name="upload-btn" value="upload">
    			</form>
    		</fieldset>
    		<fieldset>
    			<legend>upload status</legend>
    			<div class="upload-status">There's No Files uploaded Yet.
    				<a href="#"> <img src="images/atm.png" alt=""><span class="anchor-content">file one </span></a>
    				<a href="#"> <img src="images/atm.png" alt=""><span class="anchor-content">file one </span></a>
    				<a href="#"> <img src="images/atm.png" alt=""><span class="anchor-content">file one </span></a>
    			</div>
    		</fieldset>
    	</div>
    </div>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>
</html>