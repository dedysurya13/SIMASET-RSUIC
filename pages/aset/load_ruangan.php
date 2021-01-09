<?php
include "../../conf/conn.php";

if(isset($_POST['kode_unit'])){

    $stmt = $conn->prepare("SELECT * FROM aset_ruangan WHERE kode_unit=".$_POST['kode_unit']);
    $stmt->execute();
    $ruangans=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ruangans);
}

function loadUnit(){

    $stmt = $conn->prepare("SELECT * FROM aset_unit");
    $stmt->execute();
    $units = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $units;
    
}


/*
$ruanganQuery = $conn->query("SELECT * FROM aset_ruangan WHERE kode_unit='UN2012260001' ORDER BY nama_ruangan ASC");
$json=[];
while($row=$ruanganQuery->fetch(PDO::FETCH_ASSOC)){
    $json[$row['kode_ruangan']]=$row['nama_ruangan'];
}
echo json_decode($json);
*/


/*
?><select><?php
$kode_unit=$_POST['kode_unit'];
if($kode_unit!=''){
    $unitQuery = $conn->query("SELECT * FROM aset_ruangan WHERE kode_unit='$kode_unit' ORDER BY nama_ruangan ASC");
    while ($row = $unitQuery->fetch(PDO::FETCH_ASSOC)){
?>
    <option value="<?php echo $row['kode_ruangan'];?>"><?php echo $row['nama_ruangan'];?></option>
<?php
    }
}
?></select><?php
*/


/* GAGAL
include "/../../conf/conn.php";

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "
  SELECT * FROM aset_unit ORDER BY nama_unit ASC
  ";
  $statement = $conn->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["kode_unit"],
    'name'  => $row["nama_unit"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "
  SELECT * FROM aset_ruangan ORDER BY nama_ruangan ASC
  ";
  $statement = $conn->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["kode_ruangan"],
    'name'  => $row["nama_ruangan"]
   );
  }
  echo json_encode($output);
 }
}
*/
?>