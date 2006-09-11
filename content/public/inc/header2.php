<div id="branding">
	<div class="padding">

	<h1 id="logo"><a href="<?php echo $_link->to(); ?>"><?php echo SITE_TITLE; ?></a></h1>
	<div id="meta">
		<form id="quicksearch" method="GET" action="<?php echo $_link->to('browse'); ?>">
			<label class="hide" for="search">Search</label>
			<input type="text" id="search" class="textinput" name="search" />
			<input type="submit" class="submitinput" id="searchbutton" value="Search" />
		</form>
		<p id="login-blurb"><?php if (self::$_session->getUser()): ?>
		Logged in as <span class="user"><superuser><?php echo self::$_session->getUser()->getUserFirstName().' '.self::$_session->getUser()->getUserLastName(); ?></span>. <a href="<?php echo $_link->to('logout'); ?>">Logout</a>
		<?php else: ?><a href="<?php echo $_link->to('login'); ?>">Sign up or sign in</a>
		<?php endif; ?></p>
	</div>
<ul id="mainnav"><li><a id="nav-home" href="<?php echo $_link->to(); ?>">Home</a></li><li><a id="nav-contribute" href="<?php echo $_link->to('contribute'); ?>">Add Your Voice</a></li><li><a id="nav-browse" href="<?php echo $_link->to('browse'); ?>">Browse</a></li><li><a id="nav-myarchive" href="<?php echo $_link->to('myarchive'); ?>">MyArchive</a></li><li><a id="nav-about" href="<?php echo $_link->to('about'); ?>">About</a></li></ul>
</div>
</div>