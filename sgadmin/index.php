<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>

<body id="top">

  <!-- Begin of #container -->
  <div id="container">
  	<?php include 'inc/header.php';?>
    
    <div class="fix-shadow-bottom-height"></div>
	
<?php include 'inc/side.php';?>

    <!-- Begin of #main -->
    <div id="main" role="main">
    	
    	<!-- Begin of titlebar/breadcrumbs -->
		<div id="title-bar">
			<ul id="breadcrumbs">
				<li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
				<li class="no-hover">Pano</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Pano</h1>
				<p>....s</p>
				
				<div class="alert info"><span class="hide">x</span><strong>Merhabalar , ilgili bu sayfa şuanda çalışmamaktadır. Daha sonraki güncellemelerde çalışacaktır.</strong></div>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
					<div class="block-content">
						<ul class="shortcut-list">
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/kedit.png">
									Write an Article
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/penguin.png">
									User Manager
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/wifi.png">
									Control Monitor
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/mailreminder.png">
									Check the Mails
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/Volume Manager.png">
									Statistics
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/terminal.png">
									Manage Console
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/knotes.png">
									Notes
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="img/icons/packs/crystal/48x48/apps/kview.png">
									Manage Images
								</a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			
			
			<div class="grid_4">
				<div class="block-border">
					<div class="block-header">
						<h1>Create a Blogpost</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" action="dashboard.html" method="post">
						<p class="inline-mini-label">
							<label for="title">Title</label>
							<input type="text" name="title" class="required">
						</p>
						<p class="inline-mini-label">
							<label for="category">Category</label>
							<select name="category" id="category">
								<option>Lorem Ipsum</option>
								<option>Consetetur Sadipscing</option>
								<option>Eirmod Tempor</option>
							</select>
						</p>
						<p class="inline-mini-label">
								<label for="post">Post</label>
								<textarea id="post" name="post" class="required" rows="5" cols="40"></textarea>
							</p>
						</p>

						<div class="clear"></div>
						
						<!-- Buttons with actionbar  -->
						<div class="block-actions">
							<ul class="actions-left">
								<li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Cancel</a></li>
							</ul>
							<ul class="actions-right">
								<li><input type="submit" class="button" value="Create Post"></li>
							</ul>
						</div> <!--! end of #block-actions -->
					</form>
				</div>
			</div>

			<div class="grid_4">
				<div class="block-border">
					<div class="block-header">
						<h1>What you should do</h1><span></span>
					</div>
					<div class="block-content">
						<ul class="block-list with-icon">
							<li class="i-16-calendar">Lorem ipsum</li>
							<li class="i-16-application">Lorem ipsum</li>
							<li class="i-16-balloon">Lorem ipsum</li>
							<li class="i-16-chart">Lorem ipsum</li>
							<li class="i-16-drive">Lorem ipsum</li>
						</ul>
					</div>
					<div class="block-content dark-bg">
						<p>Visit the <a href="list_block.html">Block List</a> page to see the other types of block lists.</p>
					</div>
				</div>
			</div>
			
			<div class="grid_4">
				<div class="block-border">
					<div class="block-header">
						<h1>Overview-List</h1><span></span>
					</div>
					<div class="block-content">
						<div class="alert info no-margin top">You have 12 new support tickets.</div>
						<ul class="overview-list">
							<li><a href="javascript:void(0);"><span>8262</span> Total Visits</a></li>
							<li><a href="javascript:void(0);"><span>521</span> Today Visits</a></li>
							<li><a href="javascript:void(0);"><span>257</span> Comments</a></li>
							<li><a href="javascript:void(0);"><span>42</span> Support Tickets</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->

 <?php include 'inc/footer.php';?>
