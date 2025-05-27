<?php
session_start();

// if (!isset($_SESSION["adminData"])) {
//     header("Location: login.php");
// }

// Include your database connection file

include("../api/connect.php");


// Fetch candidates data for management
$candidatesQuery = mysqli_query($connect, "SELECT * FROM user WHERE role = 3");
$candidatesData = mysqli_fetch_all($candidatesQuery, MYSQLI_ASSOC);


?>

<html>
<head>
    <title>Manage Candidates</title>
    <link rel="stylesheet" href="../css/stylesheet_dashboard.css" />
</head>
<body>

    <div id="headerSection">
        <a href="admin_dashboard.php"><button id="backbtn">Back to Dashboard</button></a>
        <a href="../routes/logout.php"><button id="logoutbtn">Logout</button></a>
        <h1 style="color:white";>Manage Candidates</h1>
    </div>

    <div id="container">
        <div id="Candidates" class="section-box">
            <h2>CANDIDATES</h2>
            <?php
            if ($candidatesData) {
                foreach ($candidatesData as $candidate) {
                    ?>
                    <div class="candidate-box">
                        <img src="../uploads/<?php echo $candidate['photo']; ?>" height="100" width="100" /><br><br>
                        <b>Candidate Name: </b><?php echo $candidate['name'] ?> <br><br>
                        <b>Email: </b><?php echo $candidate['email'] ?> <br><br>
                        <b>Votes: </b>
            <?php echo $candidate['votes'] ?> <br><br>
                        <form action="delete_candidate.php" method="post">
                            <input type="hidden" name="candidate_id" value="<?php echo $candidate['id']; ?>">
                            <input type="submit" name="delete_btn" value="Delete Candidate">
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "No candidates found.";
            }
            ?>
        </div>
    </div>

         <button id="toggleGraphBtn">Toggle Graph</button>

  <div id="VoteTallyGraph" class="graph-container">
    <center>
      <h2>VOTES TALLY</h2>
    </center>
    <canvas id="voteChart"></canvas>
  </div>



<!-- <div>

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
 
  </script>
</div> -->

</body>
</html>