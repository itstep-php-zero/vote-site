<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row d-flex">
			<div class="col-xl-8 py-5 px-md-5">
				<div class="row pt-md-4">
					<?php
								foreach($votes as $key => $val) 
								{ 
									
									echo 
									'<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<a href="'.self::ROOT.'/voting/single/'.$val['id'].'" class="img img-2" style="background-image: url('.self::RES.'/images/'.$val['photo'].');"></a>
										<div class="text text-2 pl-md-4">
							  <h3 class="mb-2"><a  href="'.self::ROOT.'/voting/single/'.$val['id'].'">'.$val['title'].'</a></h3>
							  <div class="meta-wrap">
												<p class="meta">
									  <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
									  <span><a  href="'.self::ROOT.'/voting/single/'.$val['id'].'"><i class="icon-folder-o mr-2"></i>Travel</a></span>
									  <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
								  </p>
							  </div>
							  <p class="mb-4">'.$val['short_description'].'.</p>
							  <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
							</div>
									</div>
								</div>';
							};
									// отримати від home controller всі votes і згенерувати ссилки
								// 	for ($i=1; $i<10 ; $i++) 
								// 	{ 
								// 		echo 
								// 		'<div class="col-md-12">
								// 		<div class="blog-entry ftco-animate d-md-flex">
								// 			<a href="'.self::ROOT.'/voting/single" class="img img-2" style="background-image: url('.self::RES.'/images/image_'.$i.'.jpg);"></a>
								// 			<div class="text text-2 pl-md-4">
								//   <h3 class="mb-2"><a  href="'.self::ROOT.'/voting/single">Vote for something - '.$i.'</a></h3>
								//   <div class="meta-wrap">
								// 					<p class="meta">
								//   		<span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
								//   		<span><a  href="'.self::ROOT.'/voting/single"><i class="icon-folder-o mr-2"></i>Travel</a></span>
								//   		<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
								//   	</p>
								  // </div>
								//   <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								//   <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
								// </div>
								// 		</div>
								// 	</div>';
								// 	};
								
								?>
				</div><!-- END-->
				<div class="row">
					<div class="col">
						<div class="block-27">
							<ul>
								<li><a href="#">&lt;</a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
				
				<div class="sidebar-box ftco-animate">
					<h3 class="sidebar-heading">Categories</h3>
					<ul class="categories">
						<li><a href="#">Fashion <span>(6)</span></a></li>
						<li><a href="#">Technology <span>(8)</span></a></li>
						<li><a href="#">Travel <span>(2)</span></a></li>
						<li><a href="#">Food <span>(2)</span></a></li>
						<li><a href="#">Photography <span>(7)</span></a></li>
					</ul>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3 class="sidebar-heading">Popular Articles</h3>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(<?=self::RES?>/images/image_1.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(<?=self::RES?>/images/image_2.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
					<div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(<?=self::RES?>/images/image_3.jpg);"></a>
						<div class="text">
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
							<div class="meta">
								<div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
								<div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
								<div><a href="#"><span class="icon-chat"></span> 19</a></div>
							</div>
						</div>
					</div>
				</div>

				

				

				


				<div class="sidebar-box ftco-animate">
					<h3 class="sidebar-heading">Paragraph</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
						voluptate quod mollitia delectus aut.</p>
				</div>
			</div><!-- END COL -->
		</div>
	</div>
</section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
			stroke="#F96D00" />
	</svg></div>