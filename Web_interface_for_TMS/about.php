<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | Transport & Management System</title>
<style>

body {
  margin: 0;
  font-family: "Poppins", sans-serif;
  background-color: #f5f6fa;
  color: #333;
  line-height: 1.6;
}


header {
  background-color: #007bff;
  color: #fff;
  padding: 20px 0;
  text-align: center;
}
header h1 {
  margin: 0;
  font-size: 2rem;
  letter-spacing: 1px;
}


.about-section {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 60px 10%;
  background: #fff;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
  border-radius: 10px;
  margin: 40px auto;
  max-width: 1100px;
}


.about-image {
  flex: 1 1 350px;
  text-align: center;
}
.about-image img {
  width: 90%;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}


.about-content {
  flex: 1 1 400px;
  padding: 20px;
}
.about-content h2 {
  color: #007bff;
  font-size: 1.8rem;
  margin-bottom: 15px;
}
.about-content p {
  font-size: 1rem;
  margin-bottom: 15px;
}
.about-content .highlight {
  color: #007bff;
  font-weight: bold;
}


.team-section {
  background-color: #007bff;
  color: white;
  text-align: center;
  padding: 50px 20px;
}
.team-section h2 {
  font-size: 1.8rem;
  margin-bottom: 30px;
}
.team-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}
.team-member {
  background: #fff;
  color: #333;
  border-radius: 12px;
  padding: 20px;
  width: 250px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  transition: transform 0.3s ease;
}
.team-member:hover {
  transform: translateY(-5px);
}
.team-member img {
  width: 100%;
  border-radius: 10px;
}
.team-member h3 {
  margin-top: 15px;
  color: #007bff;
}
.team-member p {
  font-size: 0.9rem;
  color: #555;
}


footer {
  background: #007bff;
  color: #fff;
  text-align: center;
  padding: 20px 0;
  margin-top: 40px;
  font-size: 0.9rem;
}
</style>
</head>
<body>


<header>
  <h1>About Us</h1>
</header>


<section class="about-section">
  <div class="about-image">
    <img src="images/Bus.jpg" alt="Transportation Image">
  </div>
  <div class="about-content">
    <h2>Transportation Management System</h2>
    <p>
      Welcome to <span class="highlight">TMS</span> — your trusted platform for smart and efficient transportation management.
    </p>
    <p>
      Our system helps transportation companies, fleet owners, and drivers to manage routes, deliveries, and schedules in a more organized way.
    </p>
    <p>
      We focus on <span class="highlight">real-time tracking</span>, <span class="highlight">cost optimization</span>, and <span class="highlight">data-driven decisions</span> to keep your business moving forward smoothly.
    </p>
  </div>
</section>


<section class="team-section">
  <h2>Meet Our Team</h2>
  <div class="team-cards">
    <div class="team-member">
      <img src="images/img2.jpg" alt="Team Member ">
      <h3>Akram Mal</h3>
      <p>  <br> Whatsapp: 0093777133219 <br> Email: akrammal315@gmail.com</p>
    </div>
    <div class="team-member">
      <img src="images/img1.jpg" alt="Team Member">
      <h3>Irshad Ahamd</h3>
      <p><br> Whatsapp: 0093780459906 <br> Email: arshad@gmail.com</p>
    </div>
    <div class="team-member">
      <img src="images/nimg1.jpg" alt="Team Member">
      <h3>Rafi Tahiri</h3>
      <p> <br> Whatsapp: 0093789483524 <br> Email: rafi@gmail.com</p>
    </div>
  </div>
</section>


<footer>
  &copy; 2025 TransManage System. All Rights Reserved.
</footer>

</body>
</html>


</body>
</html>