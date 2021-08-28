<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<h5>Hello <?=$this->currentUser?></h5>
					<hr>
					<li class="colorlib-active"><a href="<?=self::ROOT?>/home/index">Home</a></li>
					<li><a href="<?=self::ROOT?>/home/about">About</a></li>
					<li><a href="<?=self::ROOT?>/home/contact">Contact</a></li>
					<?php if($this->currentUser==='Гість')
					{
					?>
						<li><a href="<?=self::ROOT?>/auth/reg">Sign Up</a></li>
						<li><a href="<?=self::ROOT?>/auth/entry">Sign In</a></li>
					<?
					}
					elseif($this->currentUser==='admin')
					{
					?>						
						<li><a href="<?=self::ROOT?>/admin/index">Admin</a></li>
						<li><a href="<?=self::ROOT?>/auth/profile">Profile</a></li>
						<li><a href="<?=self::ROOT?>/auth/exit">Exit</a></li>
					<?
					}
					else
					{
					?>	
					<li><a href="<?=self::ROOT?>/auth/profile">Profile</a></li>
						<li><a href="<?=self::ROOT?>/auth/exit">Exit</a></li>
					<?php }?>
				</ul>
</nav>