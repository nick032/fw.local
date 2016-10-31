<?php
namespace vendor\core\base;

class View {
    public $rout = [];
    public $view;
    public $layout;

    public function __construct($rout, $layout = '', $view = '') {
        $this->rout = $rout;
        if($layout === false){
            $this->layout = false;
        }else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars){
        if(is_array($vars)){
            extract($vars);
        }
        $file_view = APP . "/views/{$this->rout['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)) {
            require_once $file_view;
        }else {
            echo "<p>Не найден вид <b>$file_view</b></p>";
        }
        $content = ob_get_clean();

        if(false !== $this->layout){
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)) {
                require_once $file_layout;
            }else {
                echo "<p>Не найден шаблон <b>$file_layout</b></p>";
            }
        }
    }
}