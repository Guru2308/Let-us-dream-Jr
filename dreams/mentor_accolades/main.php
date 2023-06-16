<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat"
    />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="header pd-0">
        <img src="Dreams B.png" width="130px" height="130px">
        <h1 class="title ps-3 pt-4">DREAMS</h1>
        <a href="#" class="logout">Logout</a>
    </div>
    
    <form action="./index.php" method="post"  onsubmit="show_alert()" enctype="multipart/form-data">
        <div class="item1">
            <label for="list">Mentee Name</label>
            
              <?php include 'get_names.php'; ?>
        </div>
        <div class="item2">
            <label class="label" for="list">Accolade type</label>
            <div class="list">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Activity">
                    <label class="form-check-label" for="inlineRadio1">Activity</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Certificate">
                    <label class="form-check-label" for="inlineRadio2">Certificate</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Acknowledgement">
                    <label class="form-check-label" for="inlineRadio2">Acknowledgement</label>
                  </div>
            </div>
        </div>

        <div class="item3">
            <label for="upload">Upload Accolade</label>
            <input name="file" class="btn1 btn-01 custom-file-input" type="file"> 
        </div>

        <div class="item4">
            <h1>Accolade Description</h1>           
            <textarea name="description" id="" cols="10" rows="10" placeholder="Enter the description here"></textarea
                required>
        </div>

        <button class="btn btn-02" name="submit">Submit</button>
    </form>
<script>
    function show_alert() {
  alert("Accolade uploaded successfully!");
}
</script>
</body>
</html>