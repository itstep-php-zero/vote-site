<div class="main-box">
    <h3>delete Candidate</h3>

    

        <ul class="list-group my-list list-group-flush">
        <?php
            foreach($candidates as $key => $value)
            {
        ?>
            <a href="<?=self::ROOT?>/candidates/delete_confirmed/<?=$value['id']?>" class="delete-item list-group-item d-flex justify-content-md-between align-items-center">
                <?=$value['name']?>
                <span class="badge bg-dark rounded-pill">X</span>
            </a>

        <?php
            }
        ?>
        </ul>
    </div>

</div>