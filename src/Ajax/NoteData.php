<?php

    namespace Todo\Ajax;
    require_once __DIR__ ."/../../vendor/autoload.php";
    use Todo\Controllers\NoteController;
    use Todo\Models\NoteModel;

    if(isset($_GET["Method"]) && $_GET["Method"] == "get"){
        $controller = new NoteController();
        $data = $controller->get();
        echo json_encode($data);
    }
    else if(isset($_POST["Method"]) && $_POST["Method"] == "post"){
        $note = new NoteModel(0,$_POST['Title'],"Active");
        $controller = new NoteController();
        $data = $controller->post($note);
    }
    elseif(isset($_POST["Method"]) && $_POST["Method"] == "put"){
        $note = new NoteModel($_POST['Id'],$_POST['Title'],"");
        $controller = new NoteController();
        $data = $controller->put($note);
    }
    elseif(isset($_POST["Method"]) && $_POST["Method"] == "putstatus"){
        $note = new NoteModel($_POST['Id'],"",$_POST['Status']);
        $controller = new NoteController();
        $data = $controller->putStatus($note);
    }
    elseif(isset($_POST["Method"]) && $_POST["Method"] == "delete"){
        $controller = new NoteController();
        $data = $controller->delete($_POST['Id']);
    }
    elseif(isset($_POST["Method"]) && $_POST["Method"] == "deletecompleted"){
        $controller = new NoteController();
        $data = $controller->deleteByStatus("Completed");
    }