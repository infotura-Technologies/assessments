<!DOCTYPE html>
<html>
<head>
<title>Assessment 2</title>
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
$m = $n = $prices = $msg = '';
$positive_arr = $negative_arr = [];
$output = $flag = 0;
if($_POST) {
if($_POST['m'] && $_POST['n'] && $_POST['prices']) {
if(is_numeric($_POST['m'])) {
if(is_numeric($_POST['n'])) {
if($_POST['m'] > 0 && $_POST['m'] <= $_POST['n']) {
if($_POST['n'] <= 100) {
$m = $_POST['m'];
$n = $_POST['n'];
$prices = $_POST['prices'];
$z = explode(' ', $prices);
if(count($z) == $n) {
foreach($z as $num) {
    if(is_numeric($num)) {
        if($num >= -1000 && $num <= 1000) {
            if($num > 0)
                $positive_arr[] = $num;
            else
                $negative_arr[] = $num;
        } else {
            $flag = 2;
            break;
        }
    } else {
        $flag = 1;
        break;
    }
}
if($flag == 1) {
    $msg = 'Items price must be numeric.';
} else if($flag == 2) {
    $msg = 'Items price must be >= -1000 and <= 1000.';
} else {
if(count($negative_arr) > 0) {
    sort($negative_arr);
    for($i=0; $i<$m; $i++) {
        if(isset($negative_arr[$i]))
            $output += abs($negative_arr[$i]);
    }
}
}
} else {
    $msg = 'No of prices must be equal to no of items for sale.';
}
} else {
    $msg = 'No of items for sale must be <= 100.';
}
} else {
    $msg = 'Max no of items must be >= 1 and <= no of items for sale.';
}
} else {
    $msg = 'No of items for sale must be an integer.';
}
} else {
    $msg = 'Max no of items must be an integer.';
}
} else {
    $msg = 'All fields are mandatory.';
}
}
?>
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
    <ul class="list-inline mt-5">
        <li class="list-inline-item"><a href="index.php">Assessment 1</a></li>
        <li class="list-inline-item active"><a href="assessment_2.php">Assessment 2</a></li>
    </ul>
</div>
</div>
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h4 class="text-center mt-4 mb-4">Huge Sale</h4>
<?php
if($msg) {
    echo '<p class="text-center" style="color:#f00">'.$msg.'</p>';
}
?>
<form action="" method="post">
<div class="form-group">
    <label>Maximum no of items can carry (M)</label>
    <input type="text" class="form-control" name="m" placeholder="Maximum no of items can carry (M)" value="<?php echo isset($_POST['m']) ? $_POST['m'] : ''; ?>" />
</div>
<div class="form-group">
    <label>No of items for sale (N)</label>
    <input type="text" class="form-control" name="n" placeholder="No of items for sale (N)" value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>" />
</div>
<div class="form-group">
    <label>Prices of the available items separated by space</label>
    <input type="text" class="form-control" name="prices" placeholder="Prices of the available items separated by space" value="<?php echo isset($_POST['prices']) ? $_POST['prices'] : ''; ?>" />
</div>
<div class="text-right">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
<?php 
if($msg == '' && ($m && $n && $prices)) {
echo '<h5>Answer:</h5>';
echo '<p class="font-weight-bold">M: '.$m.'</p>';
echo '<p class="font-weight-bold">N: '.$n.'</p>';
echo '<p class="font-weight-bold">Prices: '.$prices.'</p>';
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