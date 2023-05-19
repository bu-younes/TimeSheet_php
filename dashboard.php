<?php 
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    .navbar {
      background-color: #333;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }

    .navbar-title {
      font-size: 20px;
      font-weight: bold;
    }

    .navbar-logout-btn {
      background-color: #f44336;
      color: #fff;
      border: none;
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="date"],
    select,
    textarea {
      width: 100%;
      margin-bottom: 10px;
    }

    select {
      width: 100%;
    }

    .time-select {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .time-select select {
      width: 48%;
    }

    button {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="navbar-title">PROJECT MANAGEMENT TOOL</div>
    <div>
      <img src="Tech_Mahindra-Logo.png" alt="Tech Mahindra Icon" height="30" width="30">
      <a href="<?php echo "logout.php"; ?>"><input type="button" name="logout" value="Logout"></a>
    </div>
  </div>

  <form>
    <label for="date">Date for Logs:</label>
    <input type="date" id="date" name="date" required>

    <label for="tower">Tower:</label>
    <select id="tower" name="tower" required>
      <option value="">--Select--</option>
      <option value="AD">AD</option>
      <option value="MS">MS</option>
    </select>

    <label for="stream">Stream:</label>
    <select id="stream" name="stream" required>
      <option value="">--Select--</option>
      <option value="agile">Agile</option>
      <option value="waterfall">Waterfall</option>
      <option value="specialProjects">SpecialProjects</option>
      <option value="coreServices">Core Services</option>
      <option value="ops">Ops</option>
      <option value="l3">L3</option>
      <option value="demand">Demand</option>
      <option value="itesa">ITESA</option>
      <option value="">Trainee</option>
    </select>

    <label for="project">Project Name:</label>
    <select id="project" name="project" required>
      <option value="">--Select--</option>
      <option value="activeCustomer">Active Customer</option>
      <option value="agileB2B">Agile B2B</option>
      <option value="traineeProgram">Trainee Program</option>
    </select>

    <div class="time-select">
      <label for="start-time-hour">Start Time:</label>
      <select id="start-time-hour" name="start-time-hour" required>
        <option value="">Hour</option>
        <option value="0">00</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
      </select>

      <label for="start-time-minute">&nbsp;</label>
      <select id="start-time-minute" name="start-time-minute" required>
        <option value="">Minute</option>
        <option value="0">00</option>
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
      </select>
    </div>

    <div class="time-select">
      <label for="end-time-hour">End Time:</label>
      <select id="end-time-hour" name="end-time-hour" required>
<option value="">Hour</option>
<option value="0">00</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
    </select>
<label for="end-time-minute">&nbsp;</label>
  <select id="end-time-minute" name="end-time-minute" required>
    <option value="">Minute</option>
    <option value="0">00</option>
    <option value="15">15</option>
    <option value="30">30</option>
    <option value="45">45</option>
  </select>
</div>

<label for="task">Task Name:</label>
<select id="task" name="task" required>
  <option value="">--Select--</option>
  <option value="admTeamSupport">ADM Team Support</option>
  <option value="analysis">Analysis</option>
  <option value="cabMeeting">CAB Meeting</option>
  <option value="cmDeployment">CM Deployment</option>
  <option value="governance">Governance</option>

</select>

<label for="other-task">Other Task:</label>
<input type="text" id="other-task" name="other-task">

<label for="description">Description:</label>
<textarea id="description" name="description" required></textarea>

<button type="submit">Save</button>
<button type="reset">Clear</button>
</form>
</body>
</html>


