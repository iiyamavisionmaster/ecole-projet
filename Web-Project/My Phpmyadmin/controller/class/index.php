<?php

require "Connection.php";
require "SelectModel.php";
require "CreateDBModel.php";
require "ShowDatabaseModel.php";
require "ShowTablesModel.php";
require "ShowColumnTableModel.php";
require "DeleteModel.php";
require "DeleteDB.php";
require "AlterTable.php";

$test = new Connection();
$test->connect();
$requete = new AlterTable();
$requete->setPDO($test->getDB());
$requete->addColumn("Test", "test", "caca", "int");
