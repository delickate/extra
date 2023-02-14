<style>
#noti-count {
  position:absolute;
  top:5px;
  right:-10px;
  background-color:blue;
  color:#fff;
  background-color:#e41e3f;
  padding:5px;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  width:30px;
  height:30px;
  text-align:center;
}
#noti-count div {
  margin-top:-5px;
}
</style>
<!-- ======= Header ======= -->
<header class="bg-white">
  <nav class="navbar navbar-expand-sm navbar-light" aria-label="Third navbar example">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav ms-auto me-lg-4 mb-2 mb-sm-0">
          

          <li class="nav-item dropdown pe-lg-1" style="padding-left: 20px;">
            @auth
                {{ auth()->user()->name }} ( {{ Auth::user()->getRoleNames()[0] }} )
            @else

            @endauth
          </li>

        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- End Header -->