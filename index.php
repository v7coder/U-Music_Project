<?php
if(session_status()==PHP_SESSION_NONE)
{
  session_start();
}
$showDownload = "";
$conn = mysqli_connect("localhost", "root", "", "test");
if (isset($_SESSION['LOGGEDunmIN'])) {
  $userEMAIL = $_SESSION['LOGGEDunmIN'];
  $res = mysqli_query($conn, "SELECT * FROM `umusic` WHERE `email`='$userEMAIL';");
  $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
if (!isset($res)) {
  $showDownload = "hidden";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>U music web-player</title>
	<link rel="icon" type="icon/logo" href="logos.png">
  <link rel="stylesheet" type="text/css" href="carous.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"><!-- 
  <script type="text/javascript">
    var oldwdth = screen.width;
    var boundry = 930;
    var flag = false;
    while(false){
      if (screen.width<boundry){
        console.log("Into Width less boundry");
        flag = true;
      }
      if (screen.width>boundry && flag) {
        if(myfun()==1){myfun()};
        console.log("Into Width gret boundry and flag");
        flag = false;
      }
    }
  </script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>

<!--   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 
	<link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="home.css">

  <link rel="stylesheet" type="text/css" href="owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="owl.theme.green.css">

  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="owl.carousel.min.js"></script>
  <style type="text/css">
    .play a{
  text-decoration: none;
  color: #000;
}
  </style>
</head> 



<body>

    <div class="sidebar">
      <div class="logo">
        <a href="#">
          <img src="images/logos/logos.png" alt="Logo" />
        </a>
        <h2>U Music</h2>
      </div>

      <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="fa fa-home"></span>
              <span id="H">Home</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="fa fa-search" onclick="mybtn()"></span>
             <a href="#spotify-playlists"> <span id="H" onclick="mybtn()">Search</span></a>
            <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()"></a>
          </li><br>
          <hr><br>
          <li>
            <a href="#">
              <span class="fa fas fa-book"></span>
              <span id="H">Your Library</span>
            </a>
          </li>
        </ul>
      </div>

    <!--   <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="fa fas fa-plus-square"></span>
              <span id="H">Create Playlist</span>
            </a>
          </li>
        </ul>
      </div> -->
    </div>

    <div class="main-container">
      <div class="topbar" >
        <div class="prev-next-buttons">
        <h4>
       <span class="fa fas fa-user">&nbsp;</span>&nbsp;&nbsp;<?php echo (isset($res)) ? $res[0]['name'] : "Not Logged In!"; ?>
        </h4>
        </div>

        <button id="hamer" onclick="myfun()">
          <span class ="fa fa-hamburger" ></span>
        </button>

        <div class="navbar" id="navbar">
          <ul>
            <li>
              <a href="New folder/index.html">Premium</a>
            </li>
            <li>
              <a href="Support.php">Support</a>
            </li>
            <li class="divider" id="divide">|</li>
            <li>
              <a href="register.php">Sign Up</a>
            </li>
            <a href="login.php">
                <button type="button" id="btn"><?php echo (isset($res)) ? "Logout" : "Log In"; ?></button>
            </a>
          </ul>
        </div>
      <!--  <button onclick="myfun()" id="box">
           <span class="fa fa-hamburger"></span>
       </button> -->
      </div>
      <br><br><br>

      <!--  -------------------------->
     <div class="corousel" class="item">
      <div class="umusic-corousel" style="width: 100%;height: 100%;">
        <div class="spotify-playlists" class="umusic-corousel-images">
          <p><code>wrapAround: true</code></p>
          <div class="gallery js-flickity" data-flickity-options='{ "autoPlay": 1200,
            "wrapAround": true}'  >
            <img src="images/5.jpeg" class="gallery-cell">
            <img src="images/1.jpeg" class="gallery-cell">
            <img src="images/2.jpeg" class="gallery-cell">
            <img src="images/3.jpeg" class="gallery-cell">
          </div>
         </div>
      </div>
     </div>





     
      <!-- ------------------------------ -->
      <div class="spotify-playlists" id="spotify-playlists">
        <h2>U-music Category</h2>
        <div class="list" >

          <div class="item">
             <a href="#">
               <img src="images/catergory/marathi.jpg" alt="image/jpeg" />
            </a>
            <div class="play">
              <a href="songs/marathi/index.html" target="_blank">
              <span class="fa fa-play">
              </span>
            </a>
            </div>
            <h4>Marathi Songs...</h4>
            <p>Today's Top Marathi Songs....</p>
          </div>

          <div class="item">
            <a href="#">
            <img src="images/catergory/download.png" alt="image/jpeg" />
            </a>
           <div class="play">
              <a href="songs\punjabi\index.html" target="_blank"><span class="fa fa-play"></span></a>
            </div>
            <h4>Panjabi Songs..</h4>
            <p>Today's Top panjabi Songs..</p>
          </div>

          <div class="item">
           <a href="demo/index.html">
               <img src="images/catergory/bollywood.webp" alt="image/jpeg" />
            </a>
             <div class="play">
              <a href="songs\top bollywood\index.html" target="_blank"><span class="fa fa-play"></span></a>
            </div>
            <h4>Bollywood Top Hits</h4>
            <p>The biggest hit songs Cover:...</p>
          </div>

          <div class="item">
            <a href="demo/index.html">
              <img src="images/catergory/tollywood.jpg" alt="image/jpeg" />
            </a>
           <div class="play">
              <a href="songs\famous tollywood\index.html" target="_blank"><span class="fa fa-play"></span></a>
            </div>
            <h4>Tollywood Songs</h4>
            <p>Rock Legends & epic songs ...</p>
          </div>

          <div class="item">
             <a href="demo/index.html">
               <img src="images/catergory/images.jpg" alt="image/jpeg" />
            </a>
           <div class="play">
              <a href="songs\Bhakti songs\index.html" target="_blank"><span class="fa fa-play"></span></a>
            </div>
            <h4>Bhakti Songs</h4>
            <p>Traditional Bhakti Songs.....</p>
          </div>

          <div class="item">
            <a href="demo/index.html">
               <img src="images/catergory/hollywood.webp" alt="image/jpeg" />
            </a>
             <div class="play">
              <a href="songs\Hollywood\index.html" target="_blank"><span class="fa fa-play"></span></a>
            </div>
            <h4>Top Hollywood</h4>
            <p>Today's top Hollywood songs...</p>
          </div>

          <div class="item">
            <a href="demo/index.html">
               <img src="images/catergory/screen.jpg" alt="image/jpeg" />
            </a>
            <div class="play">
             <a href="songs\top bollywood\index.html" target="_blank"><span class="fa fa-play"></span></a> 
            </div>
            <h4>Mega Hit Mix</h4>
            <p>90s top hit songs...</p>
          </div>
       
      </div>
    </div>


<!-- -----------------------classic songs---------------- -->
      <div class="spotify-playlists">
        <h2>Classic</h2>
        <div class="list">
          <div class="item">
            <a href="">
               <img src="images/bollywood/tanhaji.jpg" alt="image/jpeg" />
            </a>
            <div class="play">
              <span onclick="playthis(0);" ondblclick="pauseSong()" class="fa fa-play"></span>
                  <a href="https://pagalnew.com/download128/1818">
                <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                  <span class="fa fa-download">
                 </a>
               </span>
            </div>    
            </div>
            <h4>Tanaji Unsung Warrior</h4>
            <p>Relax and indulge with beautiful piano pieces</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

          <div class="item">
           <a href="">
               <img src="images\motivational\tochina.jpg" alt="image/jpeg" />
            </a>
            <div class="play">
              <span onclick="playthis(1);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="https://www.pagalworld.us/db/file.php?list=3939&kbps=128">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Chak Lein De </h4>
            <p>Chak Lein De Mp3 Song Download...</p>
            <div class="yt">
              <a href="https://youtu.be/kd-6aw99DpA" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

          <div class="item">
            <img src="images/bollywood/jaihind.jpg" />
            <div class="play">
              <span onclick="playthis(2);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="https://pagalnew.com/download128/19168">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Jaihind ki seena </h4>
            <p>Shershaah - Jaihind ki seena</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

          <div class="item">
            <img src="images\devotional\devashree.jpg" />
            <div class="play">
              <span onclick="playthis(3);" ondblclick="pauseSong()" class="fa fa-play">
              </span><a href="https://pagalnew.com/download128/5717">
              <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
               <span class="fa fa-download"></a></span>
              </div>
            </div>
            <h4>Chikni-Chameli Agneepath</h4>
            <p>The perfect study beats, twenty four...</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

          <div class="item">
            <img src="images\devotional\shiva.jpg" />
           <div class="play">
              <span onclick="playthis(4);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="https://pwdown.info/11126/01%20Bolo%20Har%20Har%20Har%20-%20Shivaay%20(Badshah)%20190Kbps.mp3">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Bolo Har Har Har</h4>
            <p>Dedicated to all the programmers out there.</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>
          
          <div class="item">
            <img src="images\Kes.jpg" />
            <div class="play">
              <span onclick="playthis(5);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Kesariya - Bramhastra </h4>
            <p>Uptempo instrumental hip hop beats.</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

          <div class="item">
            <img src="images/bollywood/bhuj.jpg" />
           <div class="play">
              <span onclick="playthis(6);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="https://pagalnew.com/download128/19027">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Bhai Bhai - Bhuj</h4>
            <p>Calm before the storm music.</p>
             <div class="yt">
              <a href="https://youtu.be/3qKi29UR2g4" target="_blank">
              <i class="fab fa-youtube fa-2x" onclick="youtube()" id="yt"  style="color: red;"></i>
            </a>
            </div>
          </div>

        </div>
      </div>
<!-- ---------------------------- -->
      <div class="spotify-playlists">
        <h2>Mood</h2>
        <div class="list">
          <div class="item">
            <img src="images\travel\tamasha.jpg" />
           <div class="play">
              <span onclick="playthis(7);" ondblclick="pauseSong()" class="fa fa-play"></span>
          <a href="https://pagalfree.com/download/128-Agar%20Tum%20Saath%20Ho%20-%20Tamasha%20128%20Kbps.mp3">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Agar Tum Saath Ho</h4>
            <p>Get happy with today's dose of feel-good...</p>
          </div>

          <div class="item">
            <img src="images\travel\zindagi.jpg" />
           <div class="play">
              <span onclick="playthis(7);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Dark & Stormy</h4>
            <p>Beautifully dark, dramatic tracks.</p>
          </div>

          <div class="item">
            <img src="images\travel\dilchahtahai.jpg" />
           <div class="play">
              <span onclick="playthis(9);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Feel Good Piano</h4>
            <p>Happy vibes for an upbeat morning.</p>
          </div>

          <div class="item">
            <img src="images\cover\download1 (2).jpg" />
           <div class="play">
              <span onclick="playthis(4);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Feelin' Myself</h4>
            <p>The hip-hop playlist that's a whole mood...</p>
          </div>

          <div class="item">
            <img src="images/motivational\sanju.jpg" />
           <div class="play">
              <span onclick="playthis(10);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Chill Tracks</h4>
            <p>Softer kinda dance</p>
          </div>

          <div class="item">
            <img src="images\marathi\laibhari.jpg" />
           <div class="play">
              <span onclick="playthis(11);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Mauli Mauli</h4>
            <p>The best indie rock vibes - classic and...</p>
          </div>

          <div class="item">
            <img src="images\pop\despacito.jpg" />
           <div class="play">
              <span onclick="playthis(12);" ondblclick="pauseSong()" class="fa fa-play"></span>
                <a href="">
                  <div class="play" <?php echo $showDownload;?> style="margin: 0 60px 0 0;">
                 <span class="fa fa-download">
                 </a>
               </span>
              </div>
            </div>
            <h4>Despacito-hollywood</h4>
            <p>idk.</p>
          </div>
        </div>
      </div>
    <!-- -------------------------------------footer------------------------------------ -->

    
    
<!-- -------------------------------------------- -->
      <div class="preview">
        <div class="text">
            <h1 style="color: #000010;">heloo</h1>
        </div>

      <div id='player' class="player">
            <div class="audio-container" id="audio-container">
                <div class="audio-info">
                    <h4 id="title">Melody</h4>
                    <div class="progress-container" id="progress-container">
                        <div class="progress" id="progress"></div>
                    </div>
                </div>
                <audio src="music/BAROOD_WARGI.mp3" id="audio"></audio>
                <div class="img-container" style="display: none;">
                    <img src="" id="cover">
                </div>
              <div class="navigation" id="dd" style="display:flex;position: fixed;align-content: center;
                margin-top: 6px;
                ">
                    <button id="prev" class="action-btn" style="width: 8px;background: none;">
                        <i class="fas fa-random"></i>
                    </button>
                    <button id="prev" class="action-btn" style="width: 8px;background: none;">
                        <i class="fas fa-backward"></i>
                    </button>
                    <button id="play" class="action-btn action-btn-big" style="width: 10px;background: none;font-size: 22px;">
                        <i class="fas fa-play"></i>
                    </button>
                    <button id="next" class="action-btn" style="width: 8px;background: none;">
                        <i class="fas fa-forward"></i>
                    </button>

                    <button id="prev" class="action-btn" style="width: 8px;background: none;font-size: 16px;">
                        <i class="fas fa-sync">  </i>
                    </button>

                </div>        
            </div>
        </div>
      </div>
    </div>
  
<!-- --------------------------footerr -->


<footer class="footer-distributed">

      <div class="footer-left">

        <h3>U<span>Music</span></h3>

        <p class="footer-links">
          <a href="#" class="link-1">Home</a>
          
          <a href="#">About</a>
          
          <a href="#">Faq</a>
          
          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name" style="color: #ffffff">umusic © 2023</p>
      </div>

      <div class="footer-center">

        <div>
          <i style="background: black"><img src="Icons/google-maps.png" width="30"></i>
          <p><span>Nashik</span> Maharashtra, india </p>
        </div>

        <div>
          <i style="background: black"><img src="Icons/telephone.png" width="30"></i>
          <p>+91-7499049617</p>
        </div>

        <div>
          <i style="background: black"><img src="Icons/gmail.png" width="30"></i>
          <p><a href="mailto:support@company.com">support@umusic.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          <b>U music </b>is a digital music, podcast, and video service that gives you access to songs and other content from creators all over the world. Basic functions such as playing music are totally free.
        </p>

        <div class="footer-icons">
          <a href=""><img src="Icons\facebook.png" width="40"></a>&nbsp;
          <a href=""><img src="Icons\twitter.png" width="40"></a>&nbsp;
          
          <a href=""><img src="Icons\instagram.png" width="40"></a>&nbsp;
          <a href=""><img src="Icons\linkedin.png" width="40"></a>
          <!-- <a href="#"><i class="fas fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a> -->

        </div>

      </div>

    </footer>
<br>
<br>



<!-- -------------------------------- -->
<script type="text/javascript">
  $(document).ready(function(){
   $('.owl-carousel').owlCarousel({
    item:5
  })
})
</script>
<script src="home.js" type="text/javascript"></script>
<script src="search.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
<script type="text/javascript">
      var a;
        function myfun()
        {
             if(a==1)
             {
                  document.getElementById("navbar").style.margin="0";
                   document.getElementById("btn").style.display="block";
                  return a=0;
             }
             else
             {
                   document.getElementById("navbar").style.margin="-190px 0 0 0";
                    document.getElementById("btn").style.display="none";
                  
                  return a=1;
             }
        }
    </script>

<script type="text/javascript">
      var a;
      function mybtn()
      {
        if (a==1) {
             document.getElementById("find").style.display="block";
             return a=0;
        }
        else
        {
           document.getElementById("find").style.display="none";
            return a=1;
        }
      }

</script>
  </body>
</html>