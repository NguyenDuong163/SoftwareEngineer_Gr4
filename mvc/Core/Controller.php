<?php
    Class Controller{
        function model($model)
        {
            require_once "./mvc/Models/".$model.".php";

            return new $model;
        }
    }
?>