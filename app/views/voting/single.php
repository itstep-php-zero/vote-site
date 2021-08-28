<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
	    					<h1 class="mb-3"><?=$vote['title']?></h1>
		            <p><?=$vote['description']?></p>
		         
		             <br>

						
					<?php 
						if($this->currentUser==='Гість')
						{
					?>
						<h4>To vote please sign in</h4>
					<?
					}
					elseif($voted === 'false')
					{
					?>

						<h4 style="color:red;">You have already voted!</h4>

					<?php 
					}
					elseif(count($candidates)===0)
					{
					?>
					<h3>There are no candidates yet</h3>
					<?php 
					}
					else
					{
					?>
					<div class="my-form">
					<form action="#"   method="post">
						<!-- -->
							<?php foreach($candidates as $key => $value)
							{
							?>	
									
								<div class="form-check">
								<input id=<?=$value['id']?> type="radio" name='candidate' class="form-check-input" value="<?=$value['id'].'/'.$vote['id']?>">
								<label class="form-check-label" for=<?=$value['id']?>>
									<?=$value['name']?>
								</label>		
								</div>
							<?php }?>
						<div class="panel-footer">
							<br>
						<input name="submit" type="submit" class="btn btn-dark btn-md" value="Vote">
						</div>
                    	<!-- -->
					<?php }?>
		            </form>
		        </div>
                    </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>

