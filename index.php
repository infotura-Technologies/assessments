<!DOCTYPE html>
<html>
<head>
<title>Assessment 1</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
    .list-inline-item {
        padding: 10px;
    }
    .list-inline-item a {
        text-decoration: none;
        padding: 10px;
    }
    .list-inline-item:hover, .list-inline-item.active {
        background-color: #007bff;
        border-radius: 10px;
    }
    .list-inline-item:hover a, .list-inline-item.active a {
        color: #fff;
    }
</style>
</head>
<body>

<?php
$input = $msg = '';
if($_POST) {
if(strlen($_POST['str']) > 0) {
if(strlen($_POST['str']) <= 100000) {
if(preg_match('/^[a-z()]+$/', $_POST['str'])) {
$input = $_POST['str'];
$str = str_split($input);
$stack = [];
for($i = 0; $i<count($str); $i++){
if($str[$i]==='(')
array_push($stack, $i);
else if($str[$i]===')'){
if(count($stack))
array_pop($stack);
else
$str[$i]='';
}
}
//print_r($str);
//print_r($stack);
foreach($stack as $i) 
$str[$i] = '';
$output = join('', $str);
} else {
$msg = 'String contain either "(", ")", or lowercase English letter.';
}
} else {
$msg = 'String contain maximum 100000 characters.';
}
} else {
$msg = 'String contain minimum 1 character.';
}
}
?>
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
    <ul class="list-inline mt-5">
        <li class="list-inline-item active"><a href="index.php">Assessment 1</a></li>
        <li class="list-inline-item"><a href="assessment_2.php">Assessment 2</a></li>
    </ul>
</div>
</div>
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h4 class="text-center mt-5 mb-4">Minimum Remove to Make Valid Parentheses</h4>
<?php
if($msg) {
    echo '<p class="text-center" style="color:#f00">'.$msg.'</p>';
}
?>
<form action="" method="post">
<div class="form-group">
    <label>Sample String</label>
    <input type="text" class="form-control" name="str" placeholder="Sample String" value="<?php echo isset($_POST['str']) ? $_POST['str'] : ''; ?>" />
</div>
<div class="text-right">
<button type="submit" class="btn btn-primary ">Submit</button>
</div>
</form>
<?php 
if($input) {
echo '<h5>Answer:</h5>';
echo '<p class="font-weight-bold">Input: '.$input.'</p>';
echo '<p class="font-weight-bold">Output: '.$output.'</p>';
}
?>
</div>
</div>
</div>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>