<?php
require("functions.php");
$data = read_json_file("data/employe.json");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $theLine = $data[$id - 1];
    $mora='m';
}
else{
    $theLine=$data[0];
    $thelineKhawi=array();
    foreach ($theLine as $key => $value) {
            $thelineKhawi[$key]='';}
    $theLine=$thelineKhawi;
    $mora='a';    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit / Add Employee</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit / Add Employee</h2>
    <form action="" method="post">
        <?php foreach ($theLine as $key => $value) : ?>
            <div class="form-group">
                <label for="<?php echo $key; ?>"><?php echo ucfirst(str_replace("_", " ", $key)); ?></label>
                <input type="text" class="form-control" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($theLine as $key => $value){
        $theLine[$key]=$_POST[$key];
    }
    if ($mora=='m') {
        $data[$id-1]=$theLine;
        $json_updated = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents("data/employe.json", $json_updated);
        echo'<script>
        window.location.href = "editer.php?id='.$id.'";</script>'; 
    }
    if ($mora=='a'){
        $data[count($data)]=$theLine;
        $newDaata=array_values($data);
        $json_updated = json_encode($newDaata,JSON_PRETTY_PRINT);
        $file_path = "data/employe.json";
        file_put_contents($file_path, $json_updated);   
    }
}
?>
<script>
</script>
</body>
</html>
