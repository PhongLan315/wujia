<?php 
    //Connect to the database
    $mysqli = new mysqli('localhost','admin','admin_pass','db');
    if($mysqli->connect_errno!=0){
        echo $mysqli->connect_error;
        exit();
    }
    //Setting the start from, value
    $start = 0;
    //Setting the number of rows to display in a page
    $rows_per_page = 4;
    //Get the total number of rows
    $records = $mysqli->query("SELECT * FROM products");
    $nr_of_rows = $records->num_rows;
    //Calculate the total number of pages
    $pages = ceil($nr_of_rows/$rows_per_page);
    //If the user clicks on the pagination buttons we set a new starting point
    if(isset($_GET['page-nr'])){
        if(!is_numeric($_GET["page-nr"]) || ($_GET["page-nr"] <= 0) || ($_GET["page-nr"] > $pages) ){
            //here we are making sure that if the user sets the page through the url a value that is not numeric, less than 0 or greater than the number of pages from the database, we referesh the page
            header("Location:pagination.php");
        } else {
            $page = $_GET["page-nr"] - 1;
        }
        $start = $page * $rows_per_page;
    }
    $result = $mysqli->query("SELECT * FROM products LIMIT $start, $rows_per_page");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/pagination.css"/>
</head>
<?php 
    if(isset($_GET['page-nr'])){
        $id = $_GET['page-nr'];
    }else{
        $id = 1;
    }
?>
<body id="<?php echo $id ?>">
    <div class="content">
        <?php
            while($row = $result->fetch_assoc()){
                ?>
                    <p>
                        <?php echo $row["id"]?> - <?php echo $row["product_name"]?>
                    </p>
                <?php
            }
        ?>
    </div>
    <div class="page-info">
        <?php
            if(!isset($_GET['page-nr'])){
                $page = 1;
            }else{    
                $page = $_GET['page-nr'];
            }
        ?>   
        Showing <?php echo $page ?> of <?php echo $pages ?>  pages
    </div>
    <!--Displaying the page-->
    <div class="pagination">
        <!--Go to the first page-->
        <a href="?page-nr=1">First</a>
        <!--Go to the previous page-->
        <?php
            if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                if(!is_numeric($_GET["page-nr"]) || ($_GET["page-nr"] <= 0) || ($_GET["page-nr"] > $pages) ){
                    //here we are making sure that if the user sets the page through the url a value that is not numeric, less than 0 or greater than the number of pages from the database, we referesh the page
                    header("Location:pagination.php");
                } else {
                    ?>
                        <a href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">Previous</a>
                    <?php
                }
            }else{    
                ?>
                    <a>Previous</a>
                <?php
            }
        ?>
        <!--Output the page numbers-->
        <div class="page-numbers">
            <?php
                for($counter = 1; $counter <= $pages; $counter ++){
                    ?>
                       <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a> 
                    <?php
                }
            ?>
        </div>
        <!--Go to the next page-->
        <?php
            if(!isset($_GET['page-nr'])){
                ?>
                    <a href="?page-nr=2">Next</a>
                <?php
            }else{    
                if($_GET['page-nr'] >= $pages){
                ?>
                    <a>Next</a>
                <?php
                }else{
                    ?>
                        <a href="?page-nr=<?php echo $_GET['page-nr'] + 1?>">Next</a>
                    <?php
                }
            }
        ?>
        <!--Go to the last page-->
        <a href="?page-nr=<?php echo $pages ?>">Last</a>
    </div>
    <script>
        let links = document.querySelectorAll('.page-numbers > a');
        let bodyId = parseInt(document.body.id) - 1;
        links[bodyId].classList.add('active');
    </script>
</body>
</html>