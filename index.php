<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Community Seite</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
  body {
    font-family: 'Montserrat', sans-serif;
    background: #141e30;
    background: linear-gradient(135deg, #243b55, #141e30);
    color: #eee;
    max-width: 900px;
    margin: 2rem auto;
    padding: 0 2rem 4rem;
  }
  h1 {
    color: #ffd700;
    text-align: center;
    margin-bottom: 1rem;
  }
  section {
    background: rgba(255, 215, 0, 0.1);
    margin-bottom: 2rem;
    padding: 1rem 1.5rem;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
  }
  .news-item, .video-item {
    background: #1a2a3a;
    margin-bottom: 1rem;
    padding: 1rem;
    border-radius: 10px;
  }
  .news-item h3, .video-item h3 {
    margin: 0 0 0.5rem 0;
    color: #ffd700;
  }
  .news-item small {
    color: #ccc;
  }
  iframe {
    width: 100%;
    max-width: 560px;
    height: 315px;
    border-radius: 12px;
  }
  footer {
    text-align: center;
    margin-top: 3rem;
    font-family: 'Montserrat', sans-serif;
  }
  footer a {
    color: #ffd700;
    text-decoration: none;
    font-weight: bold;
  }
  footer a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<h1>Willkommen in der Community!</h1>

<section id="newsSection">
  <h2>News</h2>
  <div id="newsList">
    <p>Lade News...</p>
  </div>
</section>

<section id="videoSection">
  <h2>Videos</h2>
  <div id="videoList">
    <p>Lade Videos...</p>
  </div>
</section>

<footer>
  <a href="admin.html">Admin-Bereich (Login)</a>
</footer>

<script>
  // LocalStorage Keys
  const STORAGE_NEWS_KEY = "community_news";
  const STORAGE_VIDEOS_KEY = "community_videos";

  const newsList = document.getElementById("newsList");
  const videoList = document.getElementById("videoList");

  function renderNews() {
    const news = JSON.parse(localStorage.getItem(STORAGE_NEWS_KEY)) || [];
    newsList.innerHTML = "";
    const visibleNews = news.filter(item => item.visible);
    if(visibleNews.length === 0) {
      newsList.innerHTML = "<p>Keine News verfügbar.</p>";
      return;
    }
    visibleNews.forEach(item => {
      const div = document.createElement('div');
      div.classList.add('news-item');
      div.innerHTML = `
        <h3>${item.title}</h3>
        <small>Datum: ${new Date(item.date).toLocaleDateString('de-DE')}</small>
        <p>${item.content}</p>
      `;
      newsList.appendChild(div);
    });
  }

  function renderVideos() {
    const videos = JSON.parse(localStorage.getItem(STORAGE_VIDEOS_KEY)) || [];
    videoList.innerHTML = "";
    const visibleVideos = videos.filter(item => item.visible);
    if(visibleVideos.length === 0) {
      videoList.innerHTML = "<p>Keine Videos verfügbar.</p>";
      return;
    }
    visibleVideos.forEach(item => {
      const div = document.createElement('div');
      div.classList.add('video-item');
      const videoUrl = `https://www.youtube.com/embed/${item.videoId}`;
      div.innerHTML = `
        <h3>${item.title}</h3>
        <iframe src="${videoUrl}" frameborder="0" allowfullscreen title="${item.title}"></iframe>
      `;
      videoList.appendChild(div);
    });
  }

  // Beim Laden Seite rendern
  window.onload = () => {
    renderNews();
    renderVideos();
  }
</script>

</body>
</html>
