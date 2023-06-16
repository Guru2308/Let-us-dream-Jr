<?php
include('header.php');
include('navbar.php');
session_start();
$page_title = "Forgot password";
?>

<style>
    body {
        background-color: #f3f8f2;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: Arial, sans-serif;
    }
    .card {
        border: none;
        border-radius: 10px;
        width: 100%;
        max-width: 400px;
        padding: 20px;
        box-sizing: border-box;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .card-header {
        background-color: #1d9a6c;
        color: #fff;
        border-radius: 10px 10px 0 0;
        text-align: center;
        padding: 10px 0;
        margin-bottom: 20px;
        font-size: 18px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }
    .form-control {
        border-radius: 5px;
        font-size: 14px;
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    .btn-primary {
        background-color: #1d9a6c;
        border-color: #1d9a6c;
        width: 100%;
        font-size: 16px;
        margin-top: 10px;
        padding: 10px;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #148c5a;
        border-color: #148c5a;
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <?php
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert alert-success">
                        <h5><?=$_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']); 
                }
            ?>

            <div class="card">
                <div class="card-header">
                    <h5>Reset password</h5>
                </div>
                <div class="card-body">
                    <form action="password_reset_code.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Email Address</label>
                            <input type="email" name='email' class='form-control' placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="password_reset_link" class="btn btn-primary">Send password reset link</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
