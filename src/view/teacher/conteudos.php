<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/conteudos.html");

if (isset($_GET["action"]) && $_GET["action"] == "criar conteudo") {
  
  $html = file_get_contents("src/view/teacher_templates/criar_conteudo.html");
  $html = str_replace("{modulos}", $data["modulos"], $html);
  $html = str_replace("{cursos}", $data["cursos"], $html);
  
} else {
  
  $html = str_replace("{cursos}", $data, $html);
}

$header = file_get_contents("src/view/teacher_templates/header.html");
$html = str_replace("{header}",$header,$html);

if ( $_SESSION["usuario"]["usu_id_foto"] != null ) {

  $html = str_replace("{img_perfil}",'<img src="'.$_SESSION["usuario"]["arq_caminho"].'"/>',$html);
  $html = str_replace("{style_perfil}","profile",$html);
} else {
  
  $html = str_replace("{img_perfil}",'<i class="fa-solid fa-user"></i>',$html);
  $html = str_replace("{style_perfil}","bg-secondary profile",$html);
}

$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
