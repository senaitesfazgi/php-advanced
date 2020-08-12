<?php
session_start();

function showCalcHistory(){
    if (isset($_SESSION['calc-history']) && !empty($_SESSION['calc-history'])){
        ?>
        <ul>
            <li>
                <?php foreach ($_SESSION['calc-history'] as $historyItem):?>
                <?php?>
                <?php endforeach ?>
            </li>

        </ul>
    }
}