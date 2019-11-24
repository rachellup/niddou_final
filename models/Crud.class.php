<?php


interface Crud{
    function selectAll();
    function select (int $id);
    function insert();
}
