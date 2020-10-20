<?php
$characters = [
    'bart',
    'homer',
    'krusty',
    'lisa',
    'maggie',
    'millhouse',
    'moe',
    'ned',
    'patty'
];
?>
<ol>
    <?php for($i = 0; $i < count($characters); $i++ ) { ?>
        <li>
            <img
                src="images/<?= $characters[$i] ?>.png"
                alt=<?= ucfirst($characters[$i]) ?>
            />
            <h3><?= ucfirst($characters[$i]) ?></h3>
        </li>
    <?php } ?>
</ol>