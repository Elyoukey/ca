<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo BASE_PATH;?>">Communication Animale</a>
    <ul class="navbar-nav">
        <?php if(!empty($currentUser->id)):?>
        <li class="nav-item">
            <a class="nav-link <?php echo ($request_uri[0]=='test')?'active':'';?>" href="<?php echo BASE_PATH?>/test">Passer le test</a>
        </li>
        <?php endif;?>
        <?php if($currentUser->isadmin):?>
        <li class="nav-item">
            <a class="nav-link <?php echo ($request_uri[0]=='animals')?'active':'';?>" href="<?php echo BASE_PATH?>/animals">Animaux</a>
        </li>
        <?php endif;?>
    </ul>
</nav>
