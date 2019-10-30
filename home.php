<?php
    session_start();
    if(!(isset($_SESSION['user']))){
        echo "<script>window.location='index.html'</script>";
    }
    $user = $_SESSION['user'];
    echo "<script>var user = '$user';</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15e3edaa10.js" crossorigin="anonymous"></script>
    <script src="jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <h1><i class="fas fa-code"></i> Code Pro</h1>
        <nav>
            <ul>
                <li><a class="btn" href="home.php">Home</a></li>
                <li><a class="btn" href="#">Workshops</a></li>
                <li><a class="btn" href="change_pwd/changepwd.php">Change Password</a></li>
                <li><a class="btn" href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="section">
        <!-- <img src="https://images.pexels.com/photos/574073/pexels-photo-574073.jpeg"> -->
        <div class="block">
            <h3>Doubts Section</h3>
            <p>You can reach out to us if you're facing any issue while solving any <strong>competitive programming</strong> problems by clicking below.
                <br>We'll help you soon after hearing from you.
            </p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form1">Get Help</button>

            <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Doubts Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p id="res"></p>

                    <form>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Problem Name: </label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-form-label">Problem Link :</label>
                        <input type="text" class="form-control" id="link">
                    </div>
                    <div class="form-group">
                        <label for="issue" class="col-form-label">Issues you're facing :</label>
                        <textarea class="form-control" id="issue"></textarea>
                    </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="dbt" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="block">
        <h3>Workshops</h3>
            <p>You can ping us here if you want to conduct <strong>workshops</strong> or have workshops or any other event in our college.
                <br>We would love to see your involvement and support.
            </p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form2">I Have an idea</button>

            <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Workshop / Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p id="res2"></p>

                    <form>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Event Name: </label>
                        <input type="text" class="form-control" id="ename">
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-form-label">Topic / Field :</label>
                        <input type="text" class="form-control" id="topic">
                    </div>
                    <div class="form-group">
                        <label for="issue" class="col-form-label">Help you need :</label>
                        <textarea class="form-control" id="req"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="wrk" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div id="err">
        <p>* This website is currently under construction. All links are not working properly.</p>
    </div>
    <footer>
        <p>Made with <i class="fas fa-heart"></i> by Code Club GECR.</p>
    </footer>
    

    <script src="script.js"></script>

</body>
</html>