<ul id="profilemenu">
	<?PHP
		// Get the Information about the Session and User. 
		function get_content () {
			global $USER, $CFG, $SESSION, $COURSE;
			$wwwroot = '';
			$signup = '';
		}

		if (empty($CFG->loginhttps)) {
			$wwwroot = $CFG->wwwroot;
		} else {
			$wwwroot = str_replace("http://", "https://", $CFG->wwwroot);
		}

		if (!isloggedin() or isguestuser()) {
			echo '<li>Not Signed In. <a href="/login/login.php">Sign In</a></li>';
		} else {
			echo '<li class="mega"><img src="'. $OUTPUT->pix_url('g/f1').'" width="26px" height="26px" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" /><a class="username" href="'.$CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id.'">'.$USER->firstname.' '.$USER->lastname.'</a>';				
		}

		if (!isloggedin() or isguestuser()) {

		} else {
			echo '	<div id="userprofile-wrapper">';

			echo '		<img src="'. $OUTPUT->pix_url('g/f1').'" width="80px" height="80px" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" />';
			echo '		<div class="userinfo">';
			echo '			<h3>'.$USER->firstname.' '.$USER->lastname.'</h3>';
			echo '			<ul>';
			echo '				<li><a href="'.$CFG->wwwroot.'/user/edit.php?id='.$USER->id.'&amp;course='.$COURSE->id.'">'.get_string('updatemyprofile').'</a></li>';
			echo '				<li><a href="'.$CFG->wwwroot.'/my">'.get_string('myhome').'</a></li>';
			echo '				<li><a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='.sesskey().'">'.get_string('logout').'</a></li>';
			echo '			</ul>';
			echo '		</div>';
			echo '	</div>';
			echo '</li>';
		}
	?>
<ul>
