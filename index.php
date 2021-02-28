<?php include 'script.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>To Do List</title>
</head>

<body>
  <div class="nav-bar">
    <div class="container">
      <nav class="flex">
        <h1>TEMZY TO-DO</h1>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <section class="showcase">
    <div class="container flex">
      <div class="welcome-text">
        <h2>A To Do List For You.</h2>
        <p>
          Without some sort of external memory aid, we are guaranteed to
          forget things due to the nature of our short-term memories. The
          average person's short-term memory can only hold 7 pieces of
          information for about 30 seconds. Keeping a to-do list will allow
          you to effortlessly keep track of everything that you need to do.
        </p>
        <a class="get-started" href="#start">Create Now</a>
      </div>
      <div class="show-image">
        <img src="images/task.png" alt="task pic" />
      </div>
    </div>
  </section>

  <div class="heading">
    <h3 id="start" class="welcome-header"><span>CREATE YOUR TO-DO LIST</span></h3>
  </div>


  <form class="create-list" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="todo">New Todo list :
      <input id="todo" type="text" name="mytodo" placeholder="enter a new a todo" required pattern=".*\S+.*" autocomplete="off" />
    </label>
    <input type="submit" value="create" name="create" class="create" />
  </form>


  <div style="margin-top: 3rem">
    <div class="list-container">
      <?php echo $total;
      ?>
    </div>
  </div>

  <br /><br />

  <form class="complete-actions" action="" method="post" align="center">
    <div>
      <label for="task-number">Enter Task number:
        <input id="task-number" type="number" name="complete" style="width: 70px" />
      </label>
      <input class="complete-button" type="submit" value="Finish Task" name="completer" />
    </div>
    <div>
      <label for="task-no2">Enter Task Number:
        <input id="task-no2" type="number" name="specifier" style="width: 70px" />
      </label>
      <input class="complete-button" type="submit" value="Delete Task" name="specific_delete" />
    </div>

    <br />
    <div align="center">
      <input class="delete-all" type="submit" value="Delete All" name="delete" />
    </div>

  </form>



  <footer>
    <div class="container">
      <p>Computer science Stream 2 &copy; Copyright Group 3 2021.</p>
    </div>
  </footer>
</body>

</html>