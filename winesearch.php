<?php 
	include("includes/dbConnect.php"); 
	
	$regionSQL = "select * from region";
	$regionQuery = mysql_query($regionSQL) or die (mysql_error());
	$regionArray = mysql_fetch_assoc($regionQuery);

	$gVARSQL = "select variety from grape_variety";
	$gVARQuery = mysql_query($gVARSQL) or die (mysql_error());
	$gVARArray = mysql_fetch_assoc($gVARQuery);

	$yearSQL = "select DISTINCT year from wine order by year";
	$yearQuery = mysql_query($yearSQL)or die (mysql_error());
	$yearArray = mysql_fetch_assoc($yearQuery);
		
	if(isset($_POST['search'])){
		
	}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML  1.0 Strict//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Homepage</title>
<link rel="stylesheet" href="../style.css" type="text/css"/>
</head>
<body>
	<div class = "wrapper">
		<div class="heading">
			<!--<?php include("../layout/header.php"); ?>-->
		</div>
		
	<div class="body">
			<h2>Search</h2> 
			<form name="search" action="html_form_action.asp" method="get">
				Wine: <input type="text" name="wineName"/>
				Winery: <input type="text" name="wineryName"/>
				<select>
					<?php do {?>
						<option value = "<?php echo $regionArray['region_name'];?>">
							<?php echo $regionArray['region_name'];?>
						</option>
					<?php }while($regionArray = mysql_fetch_assoc($regionQuery));?>
				</select>
				
				<select>
					<?php do {?>
						<option value = "<?php echo $gVARArray['variety_id'];?>">
							<?php echo $gVARArray['grape_variety'];?>
						</option>
					<?php }while($gVARArray = mysql_fetch_assoc($gVARQuery));?>
				</select>
				<select>
					<?php do {?>
						<option value = "<?php echo $yearArray['year'];?>">
							<?php echo $yearArray['year'];?>
						</option>
					<?php }while($yearArray = mysql_fetch_assoc($yearQuery));?>
					
				</select>
				<select>
					<option value="default">MIN WINE IN STOCK</option>
				</select>
				<select>
					<option value="default">MIN WINES ORDERED</option>
				</select>
				<select>
					<option value="default">MIN COST</option>
				</select>
				<select>
					<option value="default">MAX COST</option>
				</select>
				<input type="submit" value="Search"/>
			</form>
	</div>
	
		<div class="foot">
			<!--<?php include("../layout/foot.php"); ?>-->
		</div>
</div>

	
</body>
</html> 
