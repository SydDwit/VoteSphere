<?php

session_start();
if (!isset($_SESSION["userdata"])) {
  header("Location: ../");
}

$userdata = $_SESSION["userdata"];
$candidatesdata = $_SESSION["candidatesdata"];

if ($_SESSION['userdata']['status'] == 0) {
  $status = '<b style="color:red">Not Voted</b>';
} else {
  $status = '<b style="color:green">Voted</b>';
}

///////////////////////////// Vote Tally Graph /////////////////////////////
// Include your database connection file here

if ($_SESSION['candidatesdata']) {
  for ($i = 0; $i < count($candidatesdata); $i++) {
    $candidatesnames[] = $candidatesdata[$i]['name'];
    $votes[] = $candidatesdata[$i]['votes'];
  }

  echo "<script>";
  echo "var candidateNames = " . json_encode($candidatesnames) . ";";
  echo "var candidateVotes = " . json_encode($votes) . ";";
  echo "</script>";
} else {
  echo "No candidates found.";
}

?>

<html>

<head>
  <title>VOTE SPHERE</title>
  <link rel="stylesheet" href="../css/stylesheet_dashboard.css" />


<body>

  <div id="headerSection">
    <a href="../"><button id="backbtn">Back</button></a>
    <a href="logout.php"><button id="logoutbtn">Logout</button></a>
    <h1 style="color:white";>VOTE SPHERE</h1>
    <hr />
  </div>
  <div id="container">
    <div id="Profile" class="section-box">
      <h2>VOTER</h2>
      <center><img src="../uploads/<?php echo $userdata['photo']; ?>" height="100" width="100" /><br><br></center>
      <b>Name:</b>
      <?php echo $userdata['name'] ?> <br><br>
      <b>Email:</b>
      <?php echo $userdata['email'] ?> <br><br>
      <b>DOB:</b>
      <?php echo $userdata['dob'] ?> <br><br>
      <b>Status:</b>
      <?php echo $status ?> <br><br>
    </div>

    <div id="Candidates" class="section-box">
      <h2>CANDIDATES</h2>
      <?php
      if ($_SESSION['candidatesdata']) {
        for ($i = 0; $i < count($candidatesdata); $i++) {
          ?>
          <div class="candidate-box">
            <img style="float:right" src="../uploads/<?php echo $candidatesdata[$i]['photo']; ?>" height="100"
              width="100" /><br><br>
            <b>Candidate Name: </b>
            <?php echo $candidatesdata[$i]['name'] ?> <br><br>
            <!-- <b>Votes: </b>
            <?php echo $candidatesdata[$i]['votes'] ?> <br><br>
            <form action="../api/vote.php" method="post"> -->
              <input type="hidden" name="cvotes" value="<?php echo $candidatesdata[$i]['votes'] ?>">
              <input type="hidden" name="cid" value="<?php echo $candidatesdata[$i]['id'] ?>">
              <?php
              if ($_SESSION['userdata']['status'] == 0) {
                ?>
                <input type="submit" name="votebtn" value="Vote" id="votebtn">
                <?php
              } else {
                ?>
                <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                <?php
              }
              ?>

            </form>
          </div>
          <?php
        }
      } else {
        echo "No candidates found.";
      }

      ?>
  <!--    <button id="toggleGraphBtn">Toggle Graph</button>
    </div>
  </div>

  <div id="VoteTallyGraph" class="graph-container">
    <center>
      <h2>VOTES TALLY</h2>
    </center>
    <canvas id="voteChart"></canvas>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.getElementById('toggleGraphBtn').addEventListener('click', function () {
      var graphContainer = document.getElementById('VoteTallyGraph');

      if (graphContainer.style.display === 'none' || graphContainer.style.display === '') {
        // Graph is hidden, show it
        graphContainer.style.display = 'block';

        // Add your code to load or reload the graph here if needed
        loadGraph();
      } else {
        // Graph is visible, hide it
        graphContainer.style.display = 'none';
      }
    });



    function loadGraph() {



      var voteData = {
        labels: candidateNames,
        datasets: [{
          label: 'Votes',
          data: candidateVotes,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      };

      // Calculate the dynamic height based on the number of candidates
      var graphHeight = 300 + (candidateNames.length * 30); // Adjust the multiplier as needed

      // Set the height of the graph container
      document.getElementById('VoteTallyGraph').style.height = graphHeight + 'px';

      var ctx = document.getElementById('voteChart').getContext('2d');
      var voteChart = new Chart(ctx, {
        type: 'bar',
        data: voteData,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    };
  -->
  </script>




</body>
</head>
</html>