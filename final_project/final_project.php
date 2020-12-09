<?php

$characters = file_get_contents('characters.json');
$json_a = json_decode($characters, true);

function formInputs ($character_data) {
    $form = "";
    foreach($character_data as $key => $character) {
        $checkbox = isset($_GET["$key"])? "checked": '';
        $form .= "
                <li class='form__item'>

                    <label for='$key'>{$character['first_name']} {$character['last_name']}</label>

                    <input id='$key' type='checkbox' name='$key' $checkbox >
                </li>
        ";
    }
    return $form;
}

function characterList($character_data) {
    $character_list = "";
    foreach($character_data as $key => $character) {
        if ( isset($_GET["$key"]) ) {
            $character_list .= "
                    <th class='characters__itemContainer'>
                        <div class='characters__item'>
                
                        <img src='{$character['image_url']}' alt='$key' class='characters__image'>
                
                            <div class='characters__info'>

                                <h3 class='characters__name'>{$character['first_name']} {$character['last_name']}</h3>

                                <div class='characters__age characters__attribute'>
                                    <b>Age:</b> {$character['age']}
                                </div>
                                
                ";
                        if ( array_key_exists('occupation', $character )) {
                            $character_list .= "<div class='characters__occupation characters__attribute'>
                                    <b>Occupation:</b>  {$character['occupation']}
                                </div>
                            ";
                        }
                        
                        if ( array_key_exists('voiced_by', $character)) {
                            $character_list .= "<div class='characters__voicedBy characters__attribute'>
                                    <b>Voiced by:</b> {$character['voiced_by']}
                                </div>
                            ";
                        }

                        $character_list .= "
                                
                            </div>
                    
                        </div>
                    </th>
                
                ";
        }
    }
    return $character_list;
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpsons Archives</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    body{
        background-image:linear-gradient(white,ghostwhite,pink);
        margin-left:60px;
    }
    ul{
        list-style:none;
    }
    .characters__item{
        padding:0px 50px 50px 70px;
        
    }
    .form__card{
        text-align:center;
        border:0.7px solid black;
        margin-right:350px;
        margin-left:350px;
        padding-top:10px;
    }
    </style>
</head>
<body>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
            
                <div class="form__container layout-container">
                    <div class="form__row layout-row">
                        <div class="form__itemsContainer">

                            <div class="form__imageContainer">
                                <img src="images/logo.jpeg" alt="Simpsons" class="form__image">
                            </div>

                            <div class="form__card">

                                <h3 class="form__heading">
                                    Select Characters to show
                                </h3>

                                <form method="get">
                                    <ul class="form__items">
                                        <?= formInputs($json_a); ?>
                                    </ul>

                                    <input class="form__button" type="submit" value="Show Characters">

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="characters__container layout-container">
                    <div class="characters__row layout-row">
                        <table class="characters__items">
                            <?= characterList($json_a); ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>
</html>