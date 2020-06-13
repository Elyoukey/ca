<?php

class mainpage{
    public $variables ;

    function __construct(){
        $this->variables = array(
            'page-type'     =>'default',
            'js'            =>array(),
            'block_menu'    =>'',
            'blocks_left'   =>'',
            'title'         =>'',
            'maincontent'   =>'',
            'blocks_footer' =>'',
            'route'         =>''

        );
    }

    function render(){
        global $currentUser;

        $variables = $this->variables;
        $nb_col = 2;
        ob_start();
        include __DIR__.'/../templates/html.tpl.php';
        return ob_get_clean();
    }

    function render_1_Column(){
        global $currentUser;

        $variables = $this->variables;
        $nb_col = 1;
        ob_start();
        include __DIR__.'/../templates/html.tpl.php';
        return ob_get_clean();
    }

}
?>