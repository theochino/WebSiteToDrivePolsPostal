<?php 
	//date_default_timezone_set('America/New_York'); 
		
	require_once $_SERVER["DOCUMENT_ROOT"] . "/../libs/db/db_twitter.php";
	
	$r = new Twitter();
	$result = $r->SeeAllTwitterUsers();
	//print "<PRE>" . print_r($result, 1) . "</PRE>";

?>


<H1>Twitter of Interest</H1>

 
<P>
<TABLE BORDER=1>
	<TR>
		<TH>Twitter_ID</TH>
		<TH>Twitter_TweetID</TH>
		<TH>Twitter_UserID</TH>
	</TR>

<?php

		if (! empty ($result)) {
			foreach ($result as $var) {
				if (! empty ($var)) {
?>
	
	<TR>
		<TD><?= $var["Twitter_ID"] ?></TD>
		<TD><?= $var["Twitter_TweetID"] ?></TD>
		<TD><A HREF="https://twitter.com/<?= $var["Twitter_UserID"] ?>" TARGET="NEW"><?= $var["Twitter_UserID"]; ?></A></TD>
	</TR>
		
					
<?php				
				}
			}
		}
?>

</TABLE>

</P>