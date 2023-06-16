<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <div class="header pd-0">
      <img src="Dreams B.png" width="130px" height="130px" />
      <h1 class="title ps-3 pt-4">DREAMS</h1>
      <h2 class="logout">Logout</h2>
    </div>
    <div class="row">
      <div class="col-4 note-items-layout">
        <div class="row">
          
          <h1 class="py-5 px-5 col-6" style="color: white">Notes</h1>
          <h4 type="button" class="col-6  py-5 my-3 add-note " style="color: white ; border-color: white;">Add Note</h4>
        </div>
        <?php 
            include('../mentee_notes_back/notes_data_op.php');       
        ?>
        <!-- <div class="row">
          <button class="note-items container px-5">
            <h5>My Goals for the Next Year</h5>
            <h6>
              <span>31/12/2022</span
              ><span class="ps-3">As the year comes to a ...</span>
            </h6>
          </button>
        </div>
        <div class="row">
          <button class="note-items container px-5">
            <h5>Reflection on the Month of June</h5>
            <h6>
              <span>21/06/2022</span
              ><span class="ps-3">It's hard to believe that ...</span>
            </h6>
          </button>
        </div> -->
      </div>
      <div class="col-8 ps-5 pt-5">
        <form action="../mentee_notes_back/authentication.php" method="POST">
        <div >
          <input class="notes-header" type="text" placeholder="Add a header" name="note_header">

        </div>
        <div class="notes-date">
          <div class="pt-4">
            <label class="ps-4 pb-2 "  for="note-date ">Date</label>
            <input class= "ms-4 mb-2 date_input" value="2023-02-02" style="float: inline-end;" type="date" id="note_date" name="note_date">
            
          </div>
        </div>
        
        <hr style="height: 2px;"/>
        <div class="notes-body">
          <div class="form-outline">
            <textarea class="form-control notes_body" name="note_desc" id="textAreaExample1" rows="10" placeholder="write a note "></textarea>
            
          </div>
          <button type="submit" class="save-btn mx-5 my-5 btn btn-primary">Save</button>
          
        </div>
      </form>
      </div>
    </div>
  </body>
  <script src="notes.js"></script>
</html>
