<style>
  .prioridad-alta {
  background-color: cyan;
  }



  .prioridad-baja {
  background-color: darkorange;
  padding: .5em;
  }
</style>

<?php
echo "<form>";
echo "<input name='afegir'>";
echo "<select name='proritat'>";
echo "<option value='alta'>Alta</option>";
echo "<option value='baixa'>Baixa</option>";
echo "</select>";
echo "<input type='submit' value='afegir'>";
echo "</form>";
 
$db = new mysqli("localhost", "bryan", "Sf08081983", "webtasks");
 
//query tie
if (!empty($_GET['afegir'])) {
   $stmt = $db->prepare("INSERT INTO taula_web VALUES(?,?)");
   $stmt->bind_param("ss", $_GET['afegir'], $_GET['clase']);
   $stmt->execute();
}
 
//Eliminar
if (!empty($_GET['eliminar'])) {
   $stmt = $db->prepare("DELETE FROM taula_web WHERE descripcio = ?");
   $stmt->bind_param("s", $_GET['eliminar']);
   $stmt->execute();
}
 
foreach ($db->query("SELECT * FROM taula_web") as $fila) {
 
   echo "<li>
           <p class='${fila['prioritat']}'>
               ${fila['descripcio']}
               <a href='?eliminar=${fila['descripcio']}'>
                   <img src='basura.jpg'>
               </a>
           </p>   
       </li> ";
      
  
}
 
?>

}