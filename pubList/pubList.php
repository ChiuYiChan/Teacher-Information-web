<?php
//SESSION_START();
session_start();
if(isset($_SESSION['userID'])){
    include("db_conn.inc.php");
    include('../fun_inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php htmlHead_b()?>
    <title>Document</title>
    <style>
    body {
        height: 100%;
        background-color: #1C1C1C;
        color: #33A6B8;
    }

    .pub_center {
        margin-top: 70px;
        margin-bottom: 200px;
    }

    .cp {
        display: none;
    }

    .cardBorder {
        border-width: 3px;
        border-style: solid;
        border-color: #535953;
        padding: 5px;
    }

    input {
        margin-bottom: 20px;
    }

    select {
        margin-bottom: 20px;
    }


    footer {
        background-color: #8493A6;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
    }
    </style>
</head>

<body>
    <?php  navBar_b();?>

    <div class="pub_center">
        <div class="d-flex align-items-start" id="myTab">
            <div class="nav flex-column me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="journal-tab" href="#journal" role="tab" aria-controls="journal"
                    aria-selected="true">Journal</a>
                <a class="nav-link" id="conf-tab" href="#conference" role="tab" aria-controls="conference"
                    aria-selected="false">Conference</a>
                <a class="nav-link" id="addNew-tab" href="#addNew_j" role="tab" aria-controls="addNew"
                    aria-selected="false">Add Journal</a>
                <a class="nav-link" id="addNew-tab" href="#addNew_c" role="tab" aria-controls="addNew"
                    aria-selected="false">Add Conference</a>
                <a class="nav-link" id="addNew-tab" href="#addNew_a" role="tab" aria-controls="addNew"
                    aria-selected="false">Add Author</a>
            </div>
            <div class="container">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="journal" role="tabpanel" aria-labelledby="journal-tab">
                        <div class="mt-4">
                            <button onclick="location.href='../pdfCreate.php'">PDF</button>
                            <?php
                                $sql="SELECT * FROM `Journal`";
                                $result=mysqli_query($link,$sql);
                                $i=0;
                                while($row=mysqli_fetch_assoc($result)){
                                    if( $i%3==0){ echo"<div class='row'>"; }
                                    echo "
                                    <div class='cardBorder text-center col-xs-12 col-sm-6 col-md-4'>
                                        <h5>$row[title]</h5>
                                        <form action='list_journal.php' method='post'>
                                            <input type='hidden' name='getType' value='$row[id]'/>
                                            <input type='submit' class='btn btn-secondary' value='Look More'/>
                                        </form>
                                    </div>
                                    ";
                                    if( $i%3==2){ echo"</div>"; }
                                    $i++;
                                }
                                if($i%3==1){
                                    echo"</div>";
                                }
                                mysqli_free_result($result);
                                ?>
                        </div>
                    </div>
                    <!-- coference show arear -->
                    <div class="tab-pane fade" id="conference" role="tabpanel" aria-labelledby="conf-tab">
                        <div class="mt-4">
                            <?php
                                $sql="SELECT * FROM `Conference`";
                                $result=mysqli_query($link,$sql);
                                $i=0;
                                while($row=mysqli_fetch_assoc($result)){
                                    if( $i%3==0){ echo"<div class='row'>"; }
                                    echo "
                                    <div class='cardBorder text-center col-xs-12 col-sm-6 col-md-4'>
                                        <h5>$row[title]</h5>
                                        <form action='list_conf.php' method='post'>
                                            <input type='hidden' name='getType' value='$row[id]'/>
                                            <input type='submit' class='btn btn-secondary' value='Look More'/>
                                        </form>
                                    </div>
                                    ";
                                    if( $i%3==2){ echo"</div>"; }
                                    $i++;
                                }
                                if($i%3==1){
                                    echo"</div>";
                                }
                                mysqli_free_result($result);
                                ?>
                        </div>
                    </div>
                    <!-- add new Journal arear -->
                    <div class="tab-pane fade" id="addNew_j" role="tabpanel" aria-labelledby="addNew-tab">
                        <form action="addJour.php" method="post">
                            <div class='row'>
                                <div class="form-group col-sm-5">
                                    <label for="pub_title">Title</label>
                                    <input class="form-control" type="text" id="pub_title" name="pub_title" required="required">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="pub_year">Year</label>
                                    <input class="form-control" type="number" min="1980" max="2022" id="pub_year" name="pub_year" required="required">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_name">Name</label>
                                    <select class="form-control form-control-md" id="pub_name" name="pub_name">
                                        <?php
                                        $sql="SELECT * FROM `Journal`";
                                        //echo "$sql";
                                        $result=mysqli_query($link,$sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo"<option value=".$row['id'].">".$row['title']."</option>";
                                        }
                                        mysqli_free_result($result);
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-1">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#model_j" data-whatever="@mdo"><i class="fas fa-pen"></i></button>
                                </div>
                            </div>
                            <input type='hidden' name='pubType' value='0'>
                            <div class='row'>
                                <div class="form-group col-sm-4">
                                    <label for="pub_volum">Volumn</label>
                                    <input class="form-control" type="text" id="pub_volum" name="pub_volum">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_issue">Issue</label>
                                    <input class="form-control" type="text" id="pub_issue" name="pub_issue">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_p">Page</label>
                                    <input class="form-control" type="text" id="pub_p" name="pub_p">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="author_num">Menber</label>
                                        <input class="form-control" type="number" id="author_num" name="author_num"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-secondary" onclick="addFields()"><i
                                                class="fas fa-user-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="container">

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info"><i
                                        class="fas fa-clipboard-check"></i>Submit</button>
                            </div>
                        </form>

                        <div class="modal fade" id="model_j" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add new type of journal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="addType_j.php" method="post">
                                            <div class="form-group">
                                                <label for="pub_p">Title</label>
                                                <input class="form-control" type="text" id="title" name="title" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="pub_p">Country</label>
                                                <input class="form-control" type="text" id="country" name="counrty">
                                            </div>
                                            <div class="row text-center">
                                                <div class="form-group form-check col-6">
                                                    <input type="checkbox" class="form-check-input" id="isSCI"
                                                        name="isSCI" value="1">
                                                    <label class="form-check-label" for="isSCI">SCI</label>
                                                </div>
                                                <div class="form-group form-check col-6">
                                                    <input type="checkbox" class="form-check-input" id="isEI"
                                                        name="isEI" value="1">
                                                    <label class="form-check-label" for="isEI">EEEI</label>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-clipboard-check"></i>Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new Conference arear -->
                    <div class="tab-pane fade" id="addNew_c" role="tabpanel" aria-labelledby="conf-tab">
                        <form action="addJour.php" method="post">
                            <div class='row'>
                                <div class="form-group col-sm-5">
                                    <label for="pub_title">Title</label>
                                    <input class="form-control" type="text" id="pub_title" name="pub_title" required="required">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="pub_year">Year</label>
                                    <input class="form-control" type="number" min="1980" max="2022" id="pub_year" name="pub_year">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_name">Name</label>
                                    <select class="form-control form-control-md" id="pub_name" name="pub_name">
                                        <?php
                                        $sql="SELECT * FROM `Conference`";
                                        //echo "$sql";
                                        $result=mysqli_query($link,$sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo"<option value=".$row['id'].">".$row['title']."</option>";
                                        }
                                        mysqli_free_result($result);
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-1">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#model_c" data-whatever="@mdo"><i class="fas fa-pen"></i></button>
                                </div>
                            </div>
                            <input type='hidden' name='pubType' value='1'>
                            <div class='row'>
                                <div class="form-group col-sm-4">
                                    <label for="pub_volum">Volumn</label>
                                    <input class="form-control" type="text" id="pub_volum" name="pub_volum">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_issue">Issue</label>
                                    <input class="form-control" type="text" id="pub_issue" name="pub_issue">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="pub_p">Page</label>
                                    <input class="form-control" type="text" id="pub_p" name="pub_p">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="author_num">Menber</label>
                                        <input class="form-control" type="number" id="author_num1" name="author_num"
                                            value="">
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-secondary" onclick="addFields1()"><i
                                                class="fas fa-user-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="container1">

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info"><i
                                        class="fas fa-clipboard-check"></i>Submit</button>
                            </div>
                        </form>
                        <div class="modal fade" id="model_c" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add new type of conference</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="addType_c.php" method="post">
                                            <div class="form-group">
                                                <label for="pub_p">Title</label>
                                                <input class="form-control" type="text" id="title" name="title" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label for="pub_p">Conference Name</label>
                                                <input class="form-control" type="text" id="confName" name="confName" required="required">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="pub_p">Country</label>
                                                    <input class="form-control" type="text" id="country" name="country">
                                                </div>
                                                <div class="col-6">
                                                    <label for="pub_p">City</label>
                                                    <input class="form-control" type="text" id="city" name="city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="pub_p">Start Date</label>
                                                    <input class="form-control" type="number" id="dateStart" name="dateStart" required="required">
                                                </div>
                                                <div class="col-6">
                                                    <label for="pub_p">End Date</label>
                                                    <input class="form-control" type="number" id="dateEnd" name="dateEnd">
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="form-group form-check col-6">
                                                    <label for="pub_p">Venu</label>
                                                    <input class="form-control" type="text" id="venu" name="venu">
                                                </div>
                                                <div class="form-group form-check col-6">
                                                    <input type="checkbox" class="form-check-input" id="isEI"
                                                        name="isEI" value="1">
                                                    <label class="form-check-label" for="isEI">EEEI</label>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-clipboard-check"></i>Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new Author arear -->
                    <div class="tab-pane fade" id="addNew_a" role="tabpanel" aria-labelledby="conf-tab">
                        <div class="container">
                            <div class="container mt-4">
                                <div class="form-group">
                                    <!-- name="add_author" id="add_author" -->
                                    <form action='addAuthor.php' method='post'>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamic_field">
                                                <tr>
                                                    <td>
                                                        <!-- <input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /> -->
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label for="name_F">First name</label>
                                                                <input class="form-control" type="text" id="name_F"
                                                                    name="fname[]">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="name_L">Last name</label>
                                                                <input class="form-control" type="text" id="name_L"
                                                                    name="lname[]">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><button type="button" name="add" id="add"
                                                            class="btn btn-success"><i
                                                                class="fas fa-user-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-clipboard-check"></i>Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <p>Footer</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    function myFunction() {
        document.location.href = "http://210.70.80.21/~k107021027/logout.php";
    }
    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
    triggerTabList.forEach(function(triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function(event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })

    function addFields() {
        // Number of inputs to create

        // Number of inputs to create
        var number = document.getElementById("author_num").value;
        // Container <div> where dynamic content will be placed
        var container = document.getElementById("container");
        // Clear previous contents of the container
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i = 0; i < number; i++) {
            // Append a node with a random text
            container.appendChild(document.createTextNode("Author " + (i + 1)));
            // Create an <input> element, set its type and name attributes
            var select = document.createElement("select");
            select.id = "pubAuthor_" + i;
            select.name = "pubAuthor_" + i;
            select.className = "form-control col-sm-4";
            container.appendChild(select);
            //add option
            <?php
                $sql="SELECT * FROM `Author`";
                //echo "$sql";
                $result=mysqli_query($link,$sql);
                while($row=mysqli_fetch_assoc($result)){
            ?>
            var option = document.createElement("option");
            option.value = <?php echo"$row[id]";?>;
            option.text = "<?php echo"$row[last_name] $row[first_name]";?>";
            select.appendChild(option);
            <?php
                }
                mysqli_free_result($result);
            ?>
        }
    }

    function addFields1() {
        // Number of inputs to create

        // Number of inputs to create
        var number = document.getElementById("author_num1").value;
        // Container <div> where dynamic content will be placed
        var container = document.getElementById("container1");
        // Clear previous contents of the container
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i = 0; i < number; i++) {
            // Append a node with a random text
            container.appendChild(document.createTextNode("Author " + (i + 1)));
            // Create an <input> element, set its type and name attributes
            var select = document.createElement("select");
            select.id = "pubAuthor_" + i;
            select.name = "pubAuthor_" + i;
            select.className = "form-control col-sm-4";
            container.appendChild(select);
            //add option
            <?php
                $sql="SELECT * FROM `Author`";
                //echo "$sql";
                $result=mysqli_query($link,$sql);
                while($row=mysqli_fetch_assoc($result)){
            ?>
            var option = document.createElement("option");
            option.value = <?php echo"$row[id]";?>;
            option.text = "<?php echo"$row[last_name] $row[first_name]";?>";
            select.appendChild(option);
            <?php
                }
                mysqli_free_result($result);
            ?>
        }
    }

    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append("<tr id='row" + i + "'>\
                <td>\
                <div class='row'><div class='col-6'>\
                <input class='form-control' type='text' id='name_F' name='fname[]' placeholder='First Name'>\
                </div>\
                <div class='col-6'>\
                <input class='form-control' type='text' id='name_L' name='lname[]' placeholder='Last Name'>\
                </div>\
                </div>\
                </td>\
                <td><button type='button' name='remove' id='" +
                i + "' class='btn btn-danger btn_remove'>X</button></td></tr>");
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
    </script>

</body>

</html>
<?php
}else{
    echo "<h1>You have no permission !</h1>";
}
?>