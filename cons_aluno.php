<?php

include('protect.php');
include('conexão.php');
include('home.php');

function geraTabela($rs_query, $headers)
   {
      $s = "<table class='tabela' cellspacing='5' cellpadding='1'<br>";
	  $s .= "<tr class='titulo'<br>";
	  foreach ($headers as $header)	  {
		  $s .=  "<th class='titulocelula'>$header</th<br>";
	  }
 
	  $s .= "</tr>";		  
	  while ($row = mysqli_fetch_object($rs_query)){
		  $s .= "<tr  class='linha'<br>";
		  foreach ($row as $data){
			  $s .=  "<td  class='linhacelula'>$data</td<br>";
		  }		  
		  $s .= "</tr>";		  		  
	  }
 
	  $s .= "</table>";	  
 
	  echo $s;
   }

   $nome = $_POST['valor'];
   $email = $_POST['valor'];
   $mat = $_POST['valor'];
   $curso = $_POST['valor'];
   $idade = $_POST['valor'];

   switch ($_POST['filtro']) {
   	case 0:
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;
   	
   	case 1:
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO AND alunos.nomes LIKE '%$nome%' ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;
   	case 2:
   		
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO AND alunos.email LIKE '%$email%' ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;
   	case 3:
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO AND alunos.id = $mat ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;
   	case 4:
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO AND curso.nome LIKE '%$curso%' ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;
   	case 5:
   		$rs = "SELECT alunos.nomes, alunos.id, alunos.idade, alunos.email, curso.nome
    FROM alunos, curso, aluno_curso WHERE alunos.id = aluno_curso.ID_ALUNO AND curso.id = aluno_curso.ID_CURSO AND alunos.idade = $idade ORDER BY alunos.id";


    $rs_query = $mysqli->query($rs);


	$headers = array('Nome', 'Matrícula', 'Idade', 'E-mail', 'Nome do curso');
   		break;

   }

    

		geraTabela($rs_query, $headers);


?>