<?php
$isFetchRequest = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if (!$isFetchRequest) {
  header('Location: ../../pages/index.php');
  exit();
}
?>

<div class="nav-bar-overlay" id="navBarOverlay" onclick="OverlayClick()"></div>
<div class="nav-bar-container">
  <div class="nav-bar">
    <div class="logo" onclick="location.href='';"><i class="fa-brands fa-slack"></i></div>
    <div class="separator"></div>
    <div class="links">
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="contact.html">Contact</a>
    </div>
    <div class="separator"></div>
    <div class="search" id="divSearch">
      <div class="search-area">
        <input type="text" id="inputSearchStockNav" placeholder="Search" onclick="SearchClick()"
          oninput="SearchStockFromNav()" />
        <div class="icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <div class="search-panel" id="divSearchPanel">
        <div id="divNavNoSearchItems" class="no-items">
          <p>No items</p>
        </div>
        <div id="divNavSearchResults" class="search-results">
          <!-- <div class="result-card">
            <div class="image">
              <img src="../images/product/cover/1731170436041.jpg" alt="">
            </div>
            <div class="content">
              <p class="title">I'm a tit tit tit tit tit tit tit tit tit tit tit tit tit tit tit tit tit title</p>
              <p class="price">LKR 10,000</p>
            </div>
          </div>
          <hr> -->
        </div>
      </div>
    </div>
    <div class="separator"></div>
    <div class="user">
      <button class="login" onclick="location.href='auth.html?login'">Login</button>
      <button class="register" onclick="location.href='auth.html?register'">Register</button>
      <button class="user" onclick="OpenUserPanel()">
        <i class="fa-regular fa-user"></i>
      </button>
      <div class="shopping">
        <button class="bag" onclick="ToggleCart()">
          <i class="fa-solid fa-bag-shopping"></i>
        </button>
        <p id="pCartItemCount" class="count">0</p>
      </div>
      <div class="panel" id="userPanel">
        <h3>Heshan Deshapriya</h3>
        <p>heshandesh@gmail.com</p>
        <p>
          306/03/08<br />
          Urapolawatta<br />
          Urapola<br />
          Nittambuwa
        </p>
        <p>074 225 2514</p>
        <button class="logout">Logout</button>
        <button class="close" onclick="CloseUserPanel()">Close</button>
      </div>
    </div>
    <div class="separator"></div>
    <div class="theme">
      <button class="toggle" onclick="ToggleMode()">
        <i class="fa-solid fa-circle-half-stroke"></i>
      </button>
    </div>
  </div>
</div>