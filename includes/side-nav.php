<!-- START SIDE NAVIGATION -->
<div class="container" x-data="{ rightSide: false, leftSide: false }">
  <div class="left-side" :class="{'active' : leftSide}">
    <div class="left-side-button" @click="leftSide = !leftSide">
      <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      <svg stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
  <path d="M19 12H5M12 19l-7-7 7-7"/>
</svg>
    </div>
    <div class="side-wrapper">
      <div class="logo">
        <a href="index.php">
          <img src="img/recru-it-logo-blanco.png" alt="">
        </a>
      </div>
      <div class="side-menu">
        <a href="index.php">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            <path d="M9 22V12h6v10" />
          </svg>
          Candidates
        </a>
        <a href="#">
          <svg stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
          </svg>
          Processes
        </a>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
            <circle cx="12" cy="10" r="3" /></svg>
          Scheduled Interviews
        </a>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
            <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" />
          </svg>
          Files
        </a>
      </div>
    </div>
    <div class="side-wrapper">
      <div class="side-title">BEST CANDIDATES</div>
        <div class="best-candidates">
        <div class="user">
          <img src="https://pbs.twimg.com/profile_images/1102351320567164931/ZCkJgJIH.png" alt="" class="user-img">
          <div class="username">Lisandro Matos
            <div class="position">Developer</div>
          </div>
        </div>
        <div class="user">
          <img src="https://pbs.twimg.com/profile_images/1153966095444992000/1lpIyHaQ.jpg" alt="" class="user-img">
          <div class="username">Gvozden Boskovsky
            <div class="position">Designer</div>
          </div>
        </div>
        <div class="user">
          <img src="https://images.unsplash.com/photo-1565464027194-7957a2295fb7?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=3500&amp;q=80" alt="" class="user-img">
          <div class="username">Hnek Fortuin
            <div class="position">Account Manager</div>
          </div>
        </div>
        <div class="user">
          <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1400&amp;q=80" alt="" class="user-img">
          <div class="username">Lubomir Dvorak
            <div class="position">Project Manager</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END SIDE NAVIGATION -->