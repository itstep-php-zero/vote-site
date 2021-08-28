<div class="main-box">
    <h3>Votes</h3>
    <hr>
    <p>
    <?php 
    if($this->currentUser==='admin')
	{
	?>
        <a href="<?=self::ROOT?>/votes/create">Добавити голосування</a>
        <hr>
        <br>
        <ul class="list-group my-list list-group-flush">
        <?php
            foreach($votes as $key => $value)
            {
        ?>
        <div>
            
            </div>
            <h5 class="list-group-item d-flex justify-content-md-between align-items-center" >
                <?=$value['title']?>
                <div >
                <a href="<?=self::ROOT?>/votes/delete/<?=$value['id']?>" class="delete-item badge bg-dark rounded-pill">
                <span class="badge bg-dark rounded-pill">X</span></a>
                <a href="<?=self::ROOT?>/votes/update/<?=$value['id']?>" class=" badge bg-dark rounded-pill">edit</a>
                <a href="<?=self::ROOT?>/votes/addcandidate/<?=$value['id']?>" class=" badge bg-dark rounded-pill">add candidate</a>
                <a href="<?=self::ROOT?>/votes/deletecandidate/<?=$value['id']?>" class=" badge bg-dark rounded-pill">del candidate</a>

                </div>
            </h5>
        <?php
            }
        ?>
        </ul>

	<?
	}
	?>
    </p>
</div>