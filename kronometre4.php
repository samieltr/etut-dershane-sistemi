<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
 <style>
       .col-lg-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 100%;
}
        #box-body {
            position: relative;
            width: 640px;
            height: 360px;
			  font-size: 100%;
  font-family: "Share Tech Mono", monospace;
  display: flex;
   align-items: center;
        }

        #timer-container {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            color: #fff;
            font-size: 20px;
        }
    </style>
<body class="skin-dark">

    <div class="main-wrapper">

<?php include 'inc/sidebar.php';?>
     

        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3 class="title">Ana Sayfa <span>/ Kronometre</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Kronometre</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
            
                        
                          									<style>
									.stopwatch {
									
  text-align: center;
  border: 1px solid fuchsia;
  padding: 21px;
  margin-top: 200000px;
  box-shadow: 0 0 10px rgb(128, 0, 128);
  position: relative;
  background-color: rgba(0, 0, 0, 0.5);
  &:after {

  }
}

.time {
  font-size: 3em;
  color: cyan;
  text-shadow: 0 0 10px rgb(0, 128, 128);
  margin-bottom: 0.5em;
}

button {
  cursor: pointer;
  border: 1px solid cyan;
  background: 0;
  color: cyan;
  padding: 0.5em 1em;
  text-transform: uppercase;
  margin: 0 0.5em;
  transition: all 0.3s;
  &.clear {
    color: orange;
    border: 1px solid orange;
    position: relative;
    &:after {
      content: "";
      height: 1px;
      width: 200px;
      position: absolute;
      background: orange;
      top: -1rem;
      left: calc(50% - 100px);
      box-shadow: 0 0 5px orange;
    }
    &:hover {
      background: rgba(255, 28, 128, 0.5);
      box-shadow: 0 0 10px rgba(255, 28, 128, 0.5);
    }
  }
  &:hover {
    background: rgba(0, 128, 128, 0.5);
    box-shadow: 0 0 10px rgba(0, 128, 128, 0.5);
  }
}

.laps {
  color: orange;
  text-shadow: 0 0 5px rgba(255, 128, 128, 1);
  margin: 2rem 0 2rem 0;
  padding: 0;
  background-color: rgba(0, 0, 0, 0.5);
  li {
    list-style-type: decimal;
    font-size: 1.2em;
  }
}
.container {
  position: relative;
}

.videolar {
padding: 10px;
  flex: 1;
  position: relative;
  width: 100%;
  height: 100%; /* ya da istediğiniz yükseklik değeri */
}

.stopwatch {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
   flex: 1;
  margin: 10px;
}
.lapsBox
{
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
   flex: 1;
  margin: 10px;
}

									</style>
									<center>
<a href="kronometre.php" class="button button-outline button-secondary">1.Stil</a>
<a href="kronometre2.php" class="button button-outline button-secondary">2.Stil</a>		
<a href="kronometre3.php" class="button button-outline button-secondary">3.Stil</a>
<a href="kronometre4.php" class="button button-outline button-secondary">4.Stil</a>			<center>	
  <div class="videolar">
    <iframe width="100%" height="800" src="https://www.youtube-nocookie.com/embed/lLmFehmW_KQ?controls=0&mute=1&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; mute; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <div class="stopwatch">
      <div class="time">00:00:00:00</div>
      <button class="start">Başlat</button>
      <button class="pause">Durdur</button>
      <button class="reset">Sıfırla</button>
      <button class="lap">Tur</button>
    </div>
	 <div class="lapsBox">
  <ul class="laps">

  </ul>
  <button class="clear">Turları Temizle</button>
</div>
  </div>
<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/751456812&color=%23312f2f&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/knightvibes" title="ᴋɴɪɢʜᴛ ᴠɪʙᴇꜱ" target="_blank" style="color: #cccccc; text-decoration: none;">ᴋɴɪɢʜᴛ ᴠɪʙᴇꜱ</a> · <a href="https://soundcloud.com/knightvibes/sets/calm-study-lofi-hiphop-beats" title="🌿😌 Lofi HipHop Chill Instrumental Beats to relax/sleep/study to" target="_blank" style="color: #cccccc; text-decoration: none;">🌿😌 Lofi HipHop Chill Instrumental Beats to relax/sleep/study to</a></div>
</p>
                            
					
                       
                 
             
                <!--Basic Tab End-->
						
                        </div>
                    </div>
                </div>
                <!--Fullcalendar End-->

               
            </div>

        </div><!-- Content Body End -->

     <?php include 'inc/footer.php';?>

    </div>

    <!-- JS
============================================ -->

     <?php include 'inc/jscript.php';?>

<script>
(function() {
  const BTN_START = document.querySelector(".start");
  const BTN_PAUSE = document.querySelector(".pause");
  const BTN_RESET = document.querySelector(".reset");
  const BTN_LAP = document.querySelector(".lap");
  const LIST_LAPS = document.querySelector(".laps");
  const BTN_CLEAR = document.querySelector(".clear");
  const TIME_DISPLAY = document.querySelector(".time");

  let ms, s, m, h;

  BTN_START.addEventListener("click", e => {
    e.preventDefault();
    if (SETTINGS.playing === false) {
      SETTINGS.playing = true;
      SETTINGS.timerId = window.requestAnimationFrame(startTimer);
    }

    //Resuming play
    if (SETTINGS.progress !== 0) {
      SETTINGS.start = performance.now() - SETTINGS.progress;
    }
  });

  BTN_PAUSE.addEventListener("click", pauseTimer);
  BTN_RESET.addEventListener("click", resetTimer);
  BTN_LAP.addEventListener("click", recordLap);
  BTN_CLEAR.addEventListener("click", e => {
    e.preventDefault();
    removeChildren(LIST_LAPS);
    SETTINGS.laps = [];
    updateLaps();
  });

  const SETTINGS = {
    start: 0,
    progress: 0,
    currentTime: "",
    playing: false,
    timerId: null,
    laps: [],
    get milliseconds() {
      return Math.trunc(this.progress);
    }
  };

  updateLaps();

  function startTimer(timestamp) {
    if (!SETTINGS.start) SETTINGS.start = timestamp;
    SETTINGS.progress = timestamp - SETTINGS.start;
    SETTINGS.timerId = window.requestAnimationFrame(startTimer);
    TIME_DISPLAY.textContent = getDisplay();
  }

  function pauseTimer() {
    SETTINGS.playing = false;
    window.cancelAnimationFrame(SETTINGS.timerId);
  }

  function resetTimer() {
    // Increment SETTINGS.start with new delay time
    SETTINGS.start += SETTINGS.progress;
    SETTINGS.progress = 0.01;
    TIME_DISPLAY.textContent = "00:00:00:00";
  }

  function recordLap() {
    if (SETTINGS.playing === true) {
      SETTINGS.laps.push(SETTINGS.currentTime);
      updateLaps();
    }
  }

  function updateLaps() {
    removeChildren(LIST_LAPS);
    let fragment = document.createDocumentFragment();
    SETTINGS.laps.forEach(e => {
      createEl({ tag: "li", content: e, parent: fragment, addToParent: 1 });
    });
    LIST_LAPS.appendChild(fragment);
    BTN_CLEAR.style.display = SETTINGS.laps.length > 0 ? "block" : "none";
  }

  function getDisplay() {
    ms = Math.trunc((SETTINGS.milliseconds / 10) % 100);
    s = Math.trunc(SETTINGS.milliseconds / 1000)
      .toString()
      .padStart(2, "0");
    h = parseInt(s / 3600);
    s = s % 3600; // Purge extracted
    m = Math.trunc(s / 60)
      .toString()
      .padStart(2, "0");
    s = s % 60; // Purge extracted

    SETTINGS.currentTime = `${formatTime(h)}:${formatTime(m)}:${formatTime(
      s
    )}:${formatTime(ms)}`;
    return SETTINGS.currentTime;
  }

  function formatTime(time) {
    return time.toString().padStart(2, "0");
  }

  function createEl({ parent, tag, content, classes, addToParent } = {}) {
    let el = document.createElement(tag);
    if (content) {
      let txt = document.createTextNode(content);
      el.appendChild(txt);
    }
    if (classes) {
      el.setAttribute("class", classes);
    }
    if (addToParent) {
      parent.appendChild(el);
    }
    return el;
  }

  function removeChildren(el) {
    while (el.firstChild) {
      el.removeChild(el.firstChild);
    }
  }
})();

</script>


</body>

</html>