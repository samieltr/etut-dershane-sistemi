<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
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
                        <h3 class="title">Ana Sayfa <span>/ Canlı </span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Canlı Ders Çalışma</h4>
                        </div>
                        <div class="box-body">
						<table width="100%">
						<tr>
						<td> <iframe width="100%" height="500" src="https://www.youtube-nocookie.com/embed/jfKfPfyJRdk?controls=0&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </td>
			  <td>
			   <iframe allowfullscreen="" frameborder="0" width="100%" height="500" src="https://www.youtube.com/live_chat?v=jfKfPfyJRdk&embed_domain=etut.sg-bilisim.com" width="480"></iframe>
             
			  </td>
			  <td></td>
			  <td></td>
			  <td></td>
						</tr>
						</table>
                                <!--Basic Tab Start-->
              
				
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