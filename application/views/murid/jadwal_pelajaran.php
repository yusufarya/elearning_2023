<?php
$data = json_decode(json_encode($pageInfo), True);

?>

<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br> 
    <h4 class="p-3 shadow-sm rounded"><?= $data['title'] ?></h4>
    <hr class="mx-3">
    
    <div class="row mt-3">
        <?php 
            for ($i = 1; $i <= 6; $i++) { ?>
                <div class="col-md-4 my-2">
                    <div class="card">
                        <div class="card-header">
                            <h6>
                                <?= getNamaHari($i) ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($data['dataJadwal'] as $row) {
                                if (getNamaHari($i) == $row['hari']) {
                            ?>
                                    <div class="row justify-content-beetwen">
                                        <p class="col-md-6"> ⚫ <?= $row['mapel'] ?></p>
                                        <p class="col"> <?= substr($row['jam_mulai'], 0, 5) ?></p>
                                        <p class="col"> <?= substr($row['jam_selesai'], 0, 5) ?></p>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>
                </div>

            <?php }
        ?>
    </div>

</div>