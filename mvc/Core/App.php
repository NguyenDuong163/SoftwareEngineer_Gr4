<?php
class App
{
    protected $controller = "DichVuIn";
    protected $action = "show";
    protected $para = [];

    function __construct()
    {
        $arr = $this->urlProcess();

        //xu ly controller
        if (file_exists("./mvc/Controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];

            unset($arr[0]);
        }
        require_once "./mvc/Controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        //xu ly action
        if (isset($arr[1])) {
            $this->action = $arr[1];

            unset($arr[1]);
        }

        // //xu ly para
        $this->para = $arr ? array_values($arr) : [];
        // call_user_func_array([$this->controller, $this->action], $this->para);
    }


    function urlProcess()
    {
        if ($_GET["url"]) {
            $temp = filter_var(trim($_GET["url"], "/"));
            $result = explode("/", $temp);

            return $result;
        }
    }
}
