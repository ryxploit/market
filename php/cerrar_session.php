<?php
/**
 * Created by PhpStorm.
 * User: Carlos leon
 * Date: 13/03/2017
 * Time: 07:19 PM
 */
@session_start();
session_destroy();
header("Location: ../index.php");