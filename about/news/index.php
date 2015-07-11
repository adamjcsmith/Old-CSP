<?php 
	$bannerurl = '/images/backgrounds/wheel4.jpg';
	$titletext = 'Available for enquiries 9am - 7pm, Monday to Friday';
	$yshift = -200;
	$xshift = 0;
	$pagetitle = 'News';

	include '../../files/header.php'; 

	// Database connection to list news articles:
 	$dbhandle = mysql_connect("localhost", "cspprofe", "adamlancaster2013") or die("Unable to connect to MySQL");
	mysql_set_charset('utf8',$dbhandle);
	$selected = mysql_select_db("cspprofe_info",$dbhandle) or die("Could not select cspprofe_info");
	
	$newsarticles = mysql_query("SELECT * FROM news ORDER BY articledate DESC");
	$num_results = mysql_num_rows($newsarticles); 

	$newsarticleslist = mysql_query("SELECT * FROM news ORDER BY articledate DESC");
	$num_results2 = mysql_num_rows($newsarticleslist);

?>	   


		
		<div class="productdescription" style="margin-top: 0;">
					
			<?php if($num_results == 0) { print "We don't have any news at the moment! Check back soon."; } ?>
			  	
			  		<?php while($row = mysql_fetch_array($newsarticles)) {
	
						print '<a name="' .$row['articleid']. '"></a>';
						print '<h4>'; echo(date("d-m-Y", strtotime($row['articledate']))); print '</h4>';
						print '<p><span class="titletext">' .$row['articletitle']. '</span></p>';
						print '<p><span class="dimtext">' .$row['articletext']. '</span></p><br /><br />';
						print '<div class="separator"></div> <br />';
					}
	
					?>					
			
		
		</div>
		
		<div class="contactcategory">
			<div class="widthtext">
				<h3>News List</h3>
				<br />
				<?php while($row = mysql_fetch_array($newsarticleslist)) {
					
					print '<span class="mylink"><a href="#' .$row['articleid']. '">' .$row['articletitle']. '</a></span><br />';
				
					}
					
					?>
				
			</div>
		</div>
				
		<div class="clear"></div>

	<?php include '../../files/footer.php'; ?>