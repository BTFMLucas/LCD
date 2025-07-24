const videoDisplay = document.getElementById("videoDisplay");
const filterButtons = document.getElementById("filterButtons");

function loadVideos(page = "all") {
  let videos = JSON.parse(localStorage.getItem("videos")) || [];
  videoDisplay.innerHTML = "";

  let filteredVideos = page === "all" ? videos : videos.filter(v => v.page === page);

  filteredVideos.forEach(video => {
    if(video.visible) {
      const videoId = getYouTubeID(video.url);
      if(videoId){
        const iframe = document.createElement("iframe");
        iframe.width = "320";
        iframe.height = "180";
        iframe.src = `https://www.youtube.com/embed/${videoId}`;
        iframe.frameBorder = "0";
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;

        const container = document.createElement("div");
        container.className = "video-item";
        container.innerHTML = `<h3>${video.title}</h3>`;
        container.appendChild(iframe);
        videoDisplay.appendChild(container);
      }
    }
  });
}

// Hilfsfunktion, um Video-ID aus YouTube-URL zu bekommen
function getYouTubeID(url){
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
  const match = url.match(regExp);
  return (match && match[2].length === 11) ? match[2] : null;
}

// Buttons klickbar machen
filterButtons.addEventListener("click", e => {
  if(e.target.tagName === "BUTTON") {
    // Aktiven Button hervorheben
    [...filterButtons.children].forEach(btn => btn.classList.remove("active"));
    e.target.classList.add("active");

    loadVideos(e.target.dataset.page);
  }
});

// Beim ersten Laden alle Videos anzeigen
loadVideos("all");
