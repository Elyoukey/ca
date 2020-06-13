<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_PATH?>/includes/css/style.css" media="all" />
    <link rel="stylesheet" href="<?php echo BASE_PATH?>/includes/css/font-awesome.min.css">

    <script src="<?php echo BASE_PATH;?>/includes/js/generic.js" ></script>
    <?php foreach( $variables['js'] as $script):?>
        <script src="<?php echo $script;?>" ></script>
    <?php endforeach;?>
    <script>
        var BASEPATH = '<?php echo BASE_PATH;?>';
    </script>
    <title><?php echo $variables['title'];?></title>
    
    <meta property="og:title" content="<?php echo $variables['title'];?>" />
    <meta property="og:image" content="<?php echo BASE_PATH;?>/includes/images/pompom.png?r=<?php echo uniqid();?>" />

</head>
<body>
    <?php if( !empty($_SESSION['messages']) ):
        ?>
    <div class="container" onclick="this.style.display='none'">
        <div class="row">
            <div class="col-12">
                <hr/>
                <?php
                foreach($_SESSION['messages'] as $i=>$m):?>
                    <div class="alert alert-warning"><?php echo $m;?><br/></div>
                <?php endforeach;;?>
                <?php unset($_SESSION['messages']);?>
                <hr/>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div id="page-container">
        <header id="header" class="container" >
            <?php echo $variables['block_menu'];?>
        </header>

        <div id="layout-container" class="container" >
            <a class="logo" href="<?php echo BASE_PATH?>"></a>
            <div class="row">
                <?php if($nb_col>1):?>
                <div  class="col-4" >
                    <?php echo $variables['blocks_left'];?>
                </div>
                <?php endif;?>
                <div class="<?php echo ($nb_col<=1)?'col-12':'col-8'?>">
                    <?php include 'page-'.$variables['page-type'].'.tpl.php'; ?>
                </div>
            </div>
            <footer >
                <?php echo $variables['blocks_footer'];?>
            </footer>
        </div>
    </div>
</body>

</html>