<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">



  <title>HockeyPlex Employee</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <!-- referencing an external style sheet. -->
<script src="https://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
<link href="https://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet"></link>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="main.css">
   <link rel="stylesheet" href="https://alloyui.com/pagination/css/basic.css" />


<style>
 @media(max-width:424px) {
    .w3-bar {
    background-color: #00303f;
    color: white;
    font-size: 14px;

}

.w3-container {
    background-color: #766151;
    height: 675px;
    overflow: auto;



}

.w3-display-container mySlides {
    height: 300px;
}

.containertext {
    color: white;
    text-align: left;
}

w3-bar-item{
  width:100%;
}
}


</style>

<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
</head>

<body>

  <!-- This allows the navbar to stay positioned at the top of the screen on scroll -->
<nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="197">
 <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <a class="navbar-brand" href="#">HockeyPlex</a>
  </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home<span class="glyphicon glyphicon-home pull-left"></span></button></a></li>
        <li><a href="schedulepage.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="proshop.php" style="">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servcust.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
        <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
        <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
      </ul>




    <!-- This is a dropdown menu that contains the settings for our site. Add additional information here later -->
        <ul class="nav navbar-nav navbar-right">

    <!--End of setting dropdown menu -->

         <ul class="nav navbar-nav navbar-right">



            <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li  data-toggle="modal"> <a href="logout.php">Logout<span class="glyphicon glyphicon-user pull-left"></span></a></li>
              <?php }else{ ?>
              <li  data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
              <?php } ?>
            <!-- End Trigger-->

           <!-- Username display -->
       <?php
       $username= $_SESSION['login'];
      $customer = check_login_type($username);
      $admin = check_admin($username);
       if(isset($_SESSION['loggedin'])){
          if ($customer)
          {
          echo "<li><a href='customerpage.php'>" .$_SESSION['login']. "</a> </li>";
          } else {
            if($admin)
            {
          echo "<li><a href='managerpage.php'>" .$_SESSION['login']. "</a> </li>";
           } else {
          echo "<li><a href='employeepage.php'>" .$_SESSION['login']. "</a> </li>";
           }
           } }else{ ?>
          <li  data-toggle="modal" data-target=""> <a href="main.php">Create Account<span class="glyphicon glyphicon-book pull-left"></span></a></li>
           <?php } ?>

      <!--End of username display -->

      </ul>
    </div>
  </div>
</nav>



<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
</div>






<div class="w3-content w3-display-container" style="max-width:100%;" >

  <img class="mySlides" src="./img/513607201.jpg" style="background-size:cover; width:100%; height:300px ">

  <img class="mySlides" src="./img/standrew_spot.jpg" style="background-size:contain; width:100%; height:300px ">
  <img class="mySlides" src="./img/maxresdefault.jpg" style="background-size:contain; width:100%; height:300px  ">
  <img class="mySlides" src="./img/shea-rink.jpg" style="background-size:contain; width:100%; height:300px ">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

</div>



<br>

<div class="container-fluid">




  <?php
  $username= $_SESSION['login'];
   $customer = check_login_type($username);
    if ($customer)
    {?>
    <div class="w3-bar">
    <button class="w3-bar-item w3-button tablink w3-black" onclick="videotab(event,'Highlights')">Highlights</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Training')"> Skills Training</button>
    </div>
    <?php } else { ?>
    <div class="w3-bar">
    <button class="w3-bar-item w3-button tablink w3-black" onclick="videotab(event,'Highlights')">Highlights</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Training')"> Skills Training</button>
     <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Learning')">Employee Training</button>
    </div>
    <?php } ?>



  <div id="Highlights" class="w3-container w3-display-container videos">
    <div style="margin-top:50px; width:100%;">
	    <input  type="text" id="HighlightsInput" name="videoname" onkeyup="Highlights()" placeholder="Search for names..">
	  </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <table id="HighlightTable">
     <thead>
      <tr class="header">
        <th style="width:40%;">Name</th>
        <th style="width:60%;">Description</th>
      </tr>
     </thead>
  <tbody>
    <tr>
      <td>
        <h3 class="containertext">Break Aways</h3>
        <div class="fluidMedia">
          <iframe  height="300px" width="45%"src="https://www.youtube.com/embed/Zf1Xc5da2cs"  frameborder="1" allowfullscreen></iframe>
        </div>
      </td>

      <td>
        <p>Overtime: The NHL Official YouTube channel is the home of the best hockey highlights, features, interviews and vintage videos.
        Check out the goals, saves, hits, bloopers and classic moments. Watch some playlists. Relive the action of your favorite NHL teams and players.</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Best Games</h3>
        <div class="fluidMedia">
         <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/4--iEOftLZ4" frameborder="1" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Best Ever:  Los Angeles Kings Win The 2014 Stanley Cup - Alec Martinez Double Overtime Goal Martinez wins the Stanley Cup for Kings in 2OT 2013 Chicago Blackhawks - Two Goals In 17 Seconds To Win The Stanley Cup Blackhawks strike twice in 17 seconds 6/24/13 Last 2 Minutes Of Game. Game #6 SCF.
        Chicago 3 Boston 2. Chicago Wins The Stanley Cup. 6/24/13 dave bolland brian bickell goal stanley cup finals Tom Wilson Hit on Brayden Schenn (12/17/13) Tom Wilson Hit/Charging on Brayden Schenn.
        Philadelphia Flyers vs Washington Capitals. NHL Hockey (12/17/13) 14 Minutes of Pissed Off Goalies Lundqvist makes a twirling blocker save New York Rangers goalie Henrik Lundqvist makes an acrobatic blocker save as he knocks out a puck headed for the net to keep the Canadiens off the board.
        Granlund dives to score OT winner in mid-air Top 10 - Hockey Coaches Gone Wild Top 10 - NHL Goalie Saves  Top 10 NHL Non-Goalie Saves (HD) Top 10 Unlikely Hockey Moments Of All-Time</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Golie Goals</h3>
        <div class=" fluidMedia">
          <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/K8rt8gYAQls" frameborder="1" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Best Goals: Watch the amazing shots from top noch goalies.
        They will skate down the ice and show their amazing talent with great capturable shots.</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Best Dangles | Snipes | Passes</h3>
        <div class="fluidMedia">
         <iframe  height="300" width="45%" src="https://www.youtube.com/embed/0otLHeiYeDA" frameborder="1" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Dangles/Snipes/Passes:Taylor Hall - Columbus Blue Jackets
          Jordan Eberle - Calgary Flames
          Kyle Wellwood - Edmonton Oilers
          Ryan Nuget-Hopkins - Nashville Predators
          Claude Giroux - Washington Capitals
          Jonathan Toews - Colorado Avalanche
          Evgeni Malkin - New Jersey Devils
          Zach Parise - Chicago Blackhawks
          Thomas Vanek - Washington Capitals
          Dave Bolland - Nashville Predators
          Evgeni Malkin - Tampa Bay Lightning
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">History Goalie Saves</h3>
        <div class="fluidMedia">
         <iframe  height="300px" width="50%" src="https://www.youtube.com/embed/plna4yeuPLQ" frameborder="1" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Saved Shots:these are pure reflexes that the players have honed by practicing for years and years and it sure looks unbelievable.</p>
      </td>
    </tr>
     <tr>
      <td>
        <h3 class="containertext">Hockey Hits</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/v9EtLGwrJ58" frameborder="1" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Biggest Hits: Watch players get destroyed by one another</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Game Highlights</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/1h2ZaktT3tI" frameborder="1" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>College Game: Watch the highlights from the game between Notre Dame vs. Boston College.
        See the teams battling it out on the Ice.</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Pavel Datsyuk</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/dXT2m6sgbIM" frameborder="1" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Game Highlights: also known as The Magic Man[1] is a Russian professional ice hockey player and captain for SKA Saint Petersburg of the Kontinental Hockey League (KHL).
        From 2001 to 2016, he played for the Detroit Red Wings of the National Hockey League (NHL).</p>
      </td>
    </tr>
     <tr>
      <td>
        <h3 class="containertext">Celebrations</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/vTNNntrU9dA" frameborder="1" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Best Celebrations: Some of the best celebrations around the National Hockey League.</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Fear In Hockey</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/nngFtLXextE" frameborder="0" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Feared Players: Who are some of the most feared players in today's NHL? Today, we take a look at a few!</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Hardest Hits</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/lr4rG6fJiuU" frameborder="0" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Biggest Hits: 10 hardest hits in the nhl</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Golie Slashes</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/gYGrQ7JdnK4" frameborder="0" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Golies Cheap Hits: The 5 Dirtiest Goalie slashes of all time!</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Best Suspensions</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/zzyCWViee-A" frameborder="0" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Dirtiest suspensions: We've seen some pretty reckless plays in NHL history, here are the ones which garnered the biggest suspensions.</p>
      </td>
    </tr>
    <tr>
      <td>
        <h3 class="containertext">Creative Moves</h3>
        <div class="fluidMedia">
         <iframe height="300px" width="50%" src="https://www.youtube.com/embed/0GC34H2GDY8" frameborder="0" gesture="media" allowfullscreen></iframe>
        </div>
      </td>
      <td>
        <p>Shootout Moves: The Top 10 on SportsCenter of the most creative moves during shootout.</p>
      </td>
    </tr>
  </tbody>
</table>
</div>


    <div id="Training" class="w3-container w3-display-container videos" style="display:none">
    <div style="margin-top:50px; width:100%;">
	<input  type="text" id="SkillInput" onkeyup="Training()" placeholder="Search for names..">
	</div>


<table id="SkillsTable">
 <thead>
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:60%;">Country</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td>
      <h2 class="containertext">Agility</h2>

      <div class="fluidMedia">
        <iframe src="https://www.youtube.com/embed/bUV18ftJXeY?list=PLyp8LF-3yz5AuhDDIbWrg3bhRexI3lGMX" frameborder="1" allowfullscreen></iframe>
      </div>

    </td>
    <td>Agility:Player skates around the circle always facing the line in the corner constantly exchanging passes.  When the player going around the circle gets to the top of the circle, he does a 360 around the tire, keeps the puck on his forehand, underhandles and shoots to score.
    Works on: agility skating, passing, receiving, give and go's, shooting, scoring</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Balance</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/mrLiOX6nIhM" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Skating: Balance and Agility, Edge Control, Starting And Stopping</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Quick Edge</h2>
      <div class=" fluidMedia">
        <iframe  src="https://www.youtube.com/embed/MPrerhyHllA" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Routines: This week's feature is Mountain High Hockey. This is a quick edge work routine that you can perform before practice.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Double Quickness</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/2XsQxGJ3Zw4" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quickness: PK Subban of the Montreal Canadiens  posts a hockey drill to his website www.pksubban.com monthly.
    This month's drill features a skating skill drill for defensemen.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Quick Feet</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/sWGRnPnj858" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick: Improve on your skating skills from learning these different drills.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skating Drill</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/_dIos9cGHZo" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Power Skating: Simple and effective hockey skating drill to work on transitioning from forwards to backwards and vice versa.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Hockey Drills</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/RrgSn7L8fGE" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Progression Hockey Drills: 6 technical progressions off a very simple weave skating hockey drill.
    Use our complete season of practice plans and add creative progressions like these to even the simplest hockey drills.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Hockey Drills</h2>
      <div class="fluidMedia">
        <iframe src="https://www.youtube.com/embed/85GCr8YXYSw" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Camp Drills: July 13, 2011.  Clips from Washington Capitals development camp morning drills.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Evgeni Malkin's</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/orU7Gm05nzQ" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Unique Training: Evgeni Malkin continues his summer workouts while training in Russia.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skating</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/Y-JiEENlPlI" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick Feet Cross Over: Hockey drills from Hockey Canada's DrillHub.</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Derek Popke</h2>
      <div class="fluidMedia">
      <iframe src="https://www.youtube.com/embed/LPK6xq2kto0" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Underrated Skating Skill:Thanks to Derek Popke, Kevin Bieksa, and Ben Chiarot for inviting me out to their pre-season skate.
    In this video Derek Popke shares a quick tip for improving skating with 3 drills to improve the outside edge. </td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Improving Acceleration</h2>
      <div class="fluidMedia">
     <iframe src="https://www.youtube.com/embed/p9_cuf4pt6g" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Hockey Acceleration: In this video we give you a number of tips to improve your skating and acceleration.
    First I talk about a few things that you might be doing wrong that could be slowing you down on the ice, then I give you some great skating drills to help improve skating speed</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Improving Acceleration</h2>
      <div class="fluidMedia">
     <iframe src="https://www.youtube.com/embed/p9_cuf4pt6g" frameborder="0" gesture="media" allowfullscreen></iframe>
      </div>
    </td>
    <td>Hockey Acceleration: In this video we give you a number of tips to improve your skating and acceleration.
    First I talk about a few things that you might be doing wrong that could be slowing you down on the ice, then I give you some great skating drills to help improve skating speed</td>
  </tr>
 </tbody>
</table>
</div>

<div id="Learning" class="w3-container w3-display-container videos" style="display:none">
  <div style="margin-top:50px; width:100%;">
	  <input  type="text" id="LearningInput" onkeyup="Learning()" placeholder="Search for names..">
	</div>

   <table id="LearningsTable">
 <thead>
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:60%;">Country</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #1</h2>
      <div class=" fluidMedia">
       <iframe  src="https://www.youtube.com/embed/ZaNEHE4UKxM" frameborder="1" allowfullscreen></iframe>
      </div>

    </td>
    <td>Agility</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #2</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/G5BjMvvwYbs" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Balance</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #3</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/w3qutTbxw4E" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick Edge</td>

 </tbody>
</table>
</div>
</div>

<br>

 <div id="wrapper">
		<div id="header">
		  <h2>Contact Information</h2>
		  <hr>
		</div>
		<div id="content">

    <div class="container">
      <center>
      <button id="myBtns" class="btn button7" style=" margin-right:5px;">Email</button>
		  <button onclick="location.href='aboutpage.php#comment1';" class="button button1" style="text-align:center;" action="#aboutpage.php" >Comment</button>


  </center>
		</div>

		<div id="footer">
		  <center>
      <p>We are located at 318 Meadow Brook Rd, Rochester MI 48309</p>
      <p>Phone number: (248) 370-2100</p>
      </center>
    </div>
  </div>
</div>



<!-- Trigger/Open The Modal -->





<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form name="contactform" method="post" action="send_form_email.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Submit">   <a href="http://www.freecontactform.com/email_form.php">Email Form</a>
 </td>
</tr>
</table>
</form>
      </center>
  </div>

</div>


    </div>
  </div>



<!--Login Modal -->

  <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Login</h4>
        </div>
        <div class="modal-body">

          <center>
          <form action = "checklogin.php" method="post">
                                <input type="hidden" name="User_number">
          <table>
          <tr>
          <td>Username:</td>     <td><input type="text" name="username"></td>
          </tr>
          <tr>
          <td>Password:</td>     <td><input type="password" name="passwd"></td>
          </tr>
          </table>

          </center>
        </div>
        <div class="modal-footer">
          <center>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" value="ADD RECORD">Submit</button>
          </center>
        </div>
      </div>
    </div>
  </div>





</body>
  <!-- End Login Modal -->
<script>
function videotab(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("videos");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-black", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-black";
}

function pagesearch(){
  var str = "video"
  var n = str.search("video");
  document.getElementById("demo").innerHTML = n;
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}




var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";

}

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 10000); // Change image every 2 seconds
}


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];




    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#HighlightTable tbody").rows;



    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

function findTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#LearningsTable tbody").rows;



    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

function SearchTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#SkillsTable tbody").rows;


    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

document.querySelector('#HighlightsInput').addEventListener('keyup', filterTable, false);
document.querySelector('#SkillInput').addEventListener('keyup', SearchTable, false);
document.querySelector('#LearningInput').addEventListener('keyup', findTable, false);




// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtns");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="script.js"></script>

</html>
