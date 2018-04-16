var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
// var timer;

function openPage(url) {

	// if (timer != null) {
	// 	clearTimeout(timer);
	// }

	if (url.indexOf("?") == -1) {
		url = url + "?";
	}

	var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
	$("#mainContent").load(encodedUrl);
	$("body").scrollTop(0);
	// put the url into address bar (JavaScript 'history' object) so that
	// even visit via AJAX the url still changes.
	// Browser's 'go back' feature to be added...
	history.pushState(null, null, url);
}

function createPlaylist() {
	var popup = prompt("Please enter the name of your playlist:");

	if (popup != null) {

		// using AJAX call to MySQL
		$.post("includes/handlers/ajax/createPlaylist.php", { name: popup, username: userLoggedIn })
		.done(function(error) {

			if (error) {
				alert(error);
				return;
			}

			// execute when AJAX returns
			openPage("yourMusic.php");
		});

	}
}

function deletePlaylist(playlistId) {
	var prompt = confirm("Are you sure to delete this playlist?");

	if (prompt) {
		$.post("includes/handlers/ajax/deletePlaylist.php", { playlistId: playlistId })
				.done(function(error) {

					if (error) {
						alert(error);
						return;
					}

					// execute when AJAX returns
					openPage("yourMusic.php");
				});
	}
}


function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60); // rounds down
	var seconds = time - minutes * 60;

	var extraZero = (seconds < 10) ? "0" : "";

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;
	$(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;
	$(".volumeBar .progress").css("width", volume + "%");
}

function playFirstSong() {
	setTrack(tempPlaylist[0], tempPlaylist, true);
}

function Audio() {
	// 'this' refered to the object the event was called on, the 'audio' object
	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.audio.addEventListener("ended", function() {
		nextSong();
	});

	this.audio.addEventListener("canplay", function() {	// <audio> element has 'canplay' event
		var duration = formatTime(this.duration);
		$(".progressTime.remaining").text(duration);
	});

	this.audio.addEventListener("timeupdate", function() {
		if (this.duration) {
			updateTimeProgressBar(this);
		}
	});

	this.audio.addEventListener("volumechange", function() {
		updateVolumeProgressBar(this);
	});

	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track.path;
	}

	this.play = function() {
		this.audio.play();
	}

	this.pause = function() {
		this.audio.pause();
	}

	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}

}