<?php

require_once __DIR__ . "/../vendor/autoload.php";

$form = new JSRO\Form();
$form->displayAlert("inline");
$form->setAction("#");
$form->setMethod("post");

$input = new JSRO\Fields\input();
$input->setLabel("Nome");
$input->setId("nome");
$input->setName("nome");
$input->setClass("form-control");

$input2 = new JSRO\Fields\input();
$input2->setLabel("Valor");
$input2->setId("valor");
$input2->setName("valor");
$input2->setValue("R$ 0,99");
$input2->setClass("form-control");

$textarea = new JSRO\Fields\Textarea();
$textarea->setLabel("Descrição");
$textarea->setId("descricao");
$textarea->setName("descricao");
$textarea->setValue("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam volutpat fermentum mi, sit amet aliquet neque commodo et. In eu massa non lectus porta sodales. Phasellus accumsan metus odio, quis tristique ante aliquam in. Aliquam eget ipsum eros. Nunc sodales dignissim velit in pellentesque. Sed mattis euismod quam, ut ultricies magna auctor eu. Nam at rhoncus leo. Nulla ut dictum felis, a blandit lorem.");
$textarea->setClass("form-control");
$textarea->setRows(4);

$select = new \JSRO\Fields\Select();
$select->setLabel("Categoria");
$select->setId("categoria");
$select->addOption(array("value"=>"1","name"=>"Tênis de corrida"));
$select->addOption(array("value"=>"2","name"=>"Tênis de caminhada"));
$select->setClass("form-control");

$submit = new JSRO\Fields\Input();
$submit->setType("submit");
$submit->setValue("Enviar");
$submit->setClass("form-control btn btn-primary");

$form->addField($input);
$form->addField($input2);
$form->addField($textarea);
$form->addField($select);
$form->addField($submit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testes Automatizados - Refazendo tudo utilizando TDD</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">

    <div class="row">
        <h2 class="text-center">Formulário</h2>
        <div class="col-md-offset-3 col-md-6">

            <?php echo $form->render(); ?>

        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>