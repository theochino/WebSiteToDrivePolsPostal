<?php 
	//date_default_timezone_set('America/New_York'); 
		
	require_once $_SERVER["DOCUMENT_ROOT"] . "/../libs/db/db_twitter.php";
	
	$r = new Twitter();
	
	if ( ! empty ($_POST)) {
		
		foreach ($_POST["TwitterPurpose"] as $index => $var) {
			if ( ! empty($var)) {
								
				if (substr($var, 0, 1) === '@') {	$newvar = substr($var, 1);
				} else { $newvar = $var;	}
				
				// Chekc if the entry exist in the Twitter list
				$result = $r->CheckTwitter($newvar);
				
				if ( $result["Twitter_ID"] > 0 ) {
					$IDToAdd = $result["Twitter_ID"];
				} else {
					
					// I need to add to Twitter too.
					$IDToAdd = $r->AddTwitterUsername($newvar);
					$IDToAdd = $IDToAdd["Twitter_ID"];
				}
				
				$r->UpdatePurpose($index, $IDToAdd);
		
				
				
			}
		}
		
	}
	
	
	//print "<PRE>" . print_r($_POST, 1) . "</PRE>";
	
	$result = $r->SeeAllTwitterPurposes();
	//print "<PRE>" . print_r($result, 1) . "</PRE>";

?>

<H1>Twitter of Interest</H1>
<FORM ACTION="" METHOD="POST">

<P>
<TABLE BORDER=1>
	<TR>
		<TH>Purpose</TH>
		<TH>Reason</TH>
		<TH>UserID</TH>
		<TH>&nbsp;</TH>
	</TR>

<?php

		if (! empty ($result)) {
			foreach ($result as $var) {
				if (! empty ($var)) {
?>
	
	<TR>
		<TD><?= $var["TwitterGroup_Reason"] ?></TD>
		<TD><A HREF="https://www.google.com/search?q=<?= $var["TwitterPurpose_Reason"] ?> twitter" TARGET=QUERY><?= $var["TwitterPurpose_Reason"] ?></TD>
		<TD>
			<?php if ( empty ($var["Twitter_UserID"] )) { ?>
				<INPUT TYPE="TEXT" NAME="TwitterPurpose[<?= $var["TwitterPurpose_ID"] ?>]">
			<?php } else { ?>
				<A HREF="https://twitter.com/<?= $var["Twitter_UserID"] ?>" TARGET="NEW" SIZE=20><?= $var["Twitter_UserID"]; ?></A>
			<?php } ?>
		</TD>
		<TD><INPUT TYPE="SUBMIT" VALUE="Save Twitter"></TD>
	</TR>
		
					
<?php				
				}
			}
		}
?>

</TABLE>

</P>
</FORM>