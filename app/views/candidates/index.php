<div class="main-box">
    <h3>Candidates</h3>
    <hr>
    <p>
    <?php 
    if($this->currentUser==='admin')
	{
	?>
        <a href="<?=self::ROOT?>/candidates/create">Добавити кандидата</a>
        <hr>
        <br>
        <ul class="list-group my-list list-group-flush">
        <?php
            foreach($candidates as $key => $value)
            {
        ?>
        <div>
            
            </div>
            <h5 class="list-group-item d-flex justify-content-md-between align-items-center" >
                <?=$value['name']?>
                <div >
                <a href="<?=self::ROOT?>/candidates/delete/<?=$value['id']?>" class="delete-item badge bg-dark rounded-pill">
                <span class="badge bg-dark rounded-pill">X</span></a>
                <a href="<?=self::ROOT?>/candidates/update/<?=$value['id']?>" class=" badge bg-dark rounded-pill">edit</a>
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