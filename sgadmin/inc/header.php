<!-- Begin of #header -->
    <div id="header-surround"><header id="header">
    	
    	<!-- Place your logo here -->
		<img src="img/logo.png" alt="Grape" class="logo" width="200">
		
		<!-- Divider between info-button and the toolbar-icons -->
		<div class="divider-header divider-vertical"></div>
		
		<!-- Info-Button -->
		<a href="javascript:void(0);" onclick="$('#info-dialog').dialog({ modal: true });"><span class="btn-info"></span></a>
		
			<!-- Modal Box Content -->
			<div id="info-dialog" title="SG-Sistemleri" style="display: none;">
				<p>SG Bilişim Yazılım Sistemlerine hoşgeldiniz. Bu sistemde
				öğrencilerinizi ekleyebilir,ders programı atayabilirsiniz.</p>
				<p>Deneme sınavı sonuçları gibi not girişleri yapabilirsiniz.
				Sistemin güncellenmesi için önerilerde bulunmayı unutmayın. 
			<br>oneri@sg-bilisim.com</p><br>oneri@sgbilisim.com.tr
			</div> <!--! end of #info-dialog -->
		
		<!-- Begin from Toolbox -->
		<ul class="toolbox-header">
			<!-- First entry -->
			<li>
				<a rel="tooltip" title="Create a User" class="toolbox-action" href="javascript:void(0);"><span class="i-24-user-business"></span></a>
				<div class="toolbox-content">
					
					<!-- Box -->
					<div class="block-border">
						<div class="block-header small">
							<h1>Create a User</h1>
						</div>
						<form id="create-user-form" class="block-content form" action="" method="post">
							<div class="_100">
								<p><label for="username">Username</label><input id="username" name="username" class="required" type="text" value="" /></p>
							</div>
							<div class="_50">
								<p class="no-top-margin"><label for="firstname">Firstname</label><input id="firstname" name="firstname" class="required" type="text" value="" /></p>
							</div>
							<div class="_50">
								<p class="no-top-margin"><label for="lastname">Lastname</label><input id="lastname" name="lastname" class="required" type="text" value="" /></p>
							</div>
							<div class="clear"></div>
							
							<!-- Buttons with actionbar  -->
							<div class="block-actions">
								<ul class="actions-left">
									<li><a class="close-toolbox button red" id="reset" href="javascript:void(0);">Cancel</a></li>
								</ul>
								<ul class="actions-right">
									<li><input type="submit" class="button" value="Create the User"></li>
								</ul>
							</div> <!--! end of #block-actions -->
						</form>
					</div> <!--! end of box -->
					
				</div>
			</li> <!--! end of first entry -->
			
			<!-- Second entry -->
			<li>
				<a rel="tooltip" title="Write a Message" class="toolbox-action" href="javascript:void(0);"><span class="i-24-inbox-document"></span></a>
				<div class="toolbox-content">
					
					<!-- Box -->
					<div class="block-border">
						<div class="block-header small">
							<h1>Write a Message</h1>
						</div>
						<form id="write-message-form" class="block-content form" action="" method="post">							
							<p class="inline-mini-label">
								<label for="recipient">Recipient</label>
								<input type="text" name="recipient" class="required">
							</p>
							<p class="inline-mini-label">
								<label for="subject">Subject</label>
								<input type="text" name="subject">
							</p>
							<div class="_100">
								<p class="no-top-margin"><label for="message">Message</label><textarea id="message" name="message" class="required" rows="5" cols="40"></textarea></p>
							</div>
							
							<div class="clear"></div>
							
							<!-- Buttons with actionbar  -->
							<div class="block-actions">
								<ul class="actions-left">
									<li><a class="close-toolbox button red" id="reset2" href="javascript:void(0);">Cancel</a></li>
								</ul>
								<ul class="actions-right">
									<li><input type="submit" class="button" value="Send Message"></li>
								</ul>
							</div> <!--! end of #block-actions -->
						</form>
					</div> <!--! end of box -->
					
				</div>
			</li> <!--! end of second entry -->
			
			<!-- Third entry -->
			<li>
				<a rel="tooltip" title="Create a Folder" class="toolbox-action" href="javascript:void(0);"><span class="i-24-folder-horizontal-open"></span></a>
				<div class="toolbox-content">
					
					<!-- Box -->
					<div class="block-border">
						<div class="block-header small">
							<h1>Create a Folder</h1>
						</div>
						<form id="create-folder-form" class="block-content form" action="" method="post">
							<p class="inline-mini-label">
								<label for="folder-name">Name</label>
								<input type="text" name="folder-name" class="required">
							</p>
							
							<!-- Buttons with actionbar  -->
							<div class="block-actions">
								<ul class="actions-left">
									<li><a class="close-toolbox button red" id="reset3" href="javascript:void(0);">Cancel</a></li>
								</ul>
								<ul class="actions-right">
									<li><input type="submit" class="button" value="Create Folder"></li>
								</ul>
							</div> <!--! end of #block-actions -->
						</form>
					</div> <!--! end of box -->
					
				</div>
			</li> <!--! end of third entry -->
		</ul>
		
		<!-- Begin of #user-info -->
		<div id="user-info">
			<p>
				<span class="messages">Merhaba,  <a href="javascript:void(0);"><?php echo $user_name; ?></a> ( <a href="javascript:void(0);"><img src="img/icons/packs/fugue/16x16/mail.png" alt="Messages"> 3 new messages</a> )</span>
				<a href="profile.php" class="button">Profili Düzenle</a> <a href="logout.php" class="button red">Çıkış</a>
			</p>
		</div> <!--! end of #user-info -->
		
    </header></div> <!--! end of #header -->