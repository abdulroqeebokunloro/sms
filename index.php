<?php require_once "includes/header.php"; ?>

	<div class="home-banner section-padding text-center text-light">
		<!-- <img src="images/bg_1.jpg"> -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="display-table banner-min-height">
						<div class="display-table-cell">
							<h2>Welcome to <?php echo get_school_name(); ?></h2>
							<?php if(!is_user_logged_in()) { ?>
							<a href="login.php" class="btn btn-warning">Login</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div> 
	
	<div class="about-section section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="single-about">
						<h3>ABOUT</h3>
						<img src="assets/images/bg_3.jpg" alt="">
						<?php
						$query = "SELECT * FROM page_contents WHERE page_name='about_page'";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($result);
						$page_text = $row['page_text'];
						$first_para = substr($page_text, strpos($page_text, "<p"), strpos($page_text, "</p>")+4);
						echo $first_para;
						?>
						<a href="about.php" class="btn btn-success">Read More</a>
					</div>
				</div>

				<div class="col-md-6">
					<div class="single-about">
						<h3>Teachers</h3>
						<img src="assets/images/course-1.jpg" alt="">
						<?php
						$query = "SELECT * FROM page_contents WHERE page_name='teacher_page'";
						$result = mysqli_query($conn, $query);
						$row = mysqli_fetch_assoc($result);
						echo $row['page_text'];
						?>
						<p><a href="teachers.php" class="btn btn-success">See Teachers</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="about-section section-padding" style="background: green">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="single-about single-notice text-light">
						<h3>NOTICES</h3>
						<?php 
							$query = "SELECT * FROM notice ORDER BY id DESC LIMIT 5";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)) {
								$notice_id = $row['id'];
								$notice_title = $row['notice_title'];
								echo "<p><i class='fa fa-hand-o-right'><a href='notice.php?id=$notice_id'>$notice_title</a></i></p>";
							}
						?>
						
						<a href="notice.php" class="btn btn-success">Read More</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="single-about single-notice text-light">
						<h3>EVENTS</h3>
						<?php 
							$query = "SELECT * FROM event ORDER BY id DESC LIMIT 5";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)) {
								$event_id = $row['id'];
								$event_title = $row['event_title'];
								echo "<p><i class='fa fa-hand-o-right'><a href='event.php?id=$event_id'>$event_title</a></i></p>";
							}
						?>
						<a href="event.php" class="btn btn-success">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding section-count">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="count-circle-box">
						<div class="display-table circle-height">
							<div class="display-table-cell">
								<h3><i class="fa fa-users fa-2x"></i><br /> <span class="number"><?php echo total_teacher(); ?></span> Teachers</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="count-circle-box">
						<div class="display-table circle-height">
							<div class="display-table-cell">
								<h3><i class="fa fa-user-plus fa-2x"></i><br /> <span class="number"><?php echo total_students(); ?></span> Students</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="count-circle-box">
						<div class="display-table circle-height">
							<div class="display-table-cell">
								<h3><i class="fa fa-book fa-2x"></i><br /> <span class="number"><?php echo total_subject(); ?></span> Subjects</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once "includes/footer.php"; ?>