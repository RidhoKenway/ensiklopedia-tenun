<?php 
    include_once './../src/c.php';
    $sql_query = "SELECT * FROM informasi";
    $result = mysqli_query($connection, $sql_query);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ensiklopedia Tenun</title>
  <link rel="shortcut icon" href="./../dist/icons/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./../dist/output.css">
</head>

<body>
  <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-4 sticky top-0 shadow z-10">
    <nav class="w-full mx-auto px-4 sm:px-6 lg:px-8 sm:flex sm:items-center sm:justify-between" aria-label="nav">
      <div class="flex items-center justify-between">
        <a class="flex-none" href="./../index.html">
          <img src="./../dist/icons/logo.png" alt="Logo" class="w-16 h-16">
        </a>
        <div class="sm:hidden">
          <button type="button" class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-collapse="#navbar-image-1" aria-controls="navbar-image-1" aria-label="Toggle navigation">
            <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="3" x2="21" y1="6" y2="6" />
              <line x1="3" x2="21" y1="12" y2="12" />
              <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
      </div>
      <div id="navbar-image-1" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
          <a class="font-medium text-gray-600 hover:text-gray-400" href="./../index.html">Beranda</a>
          <a class="font-medium text-blue-500" href="#" aria-current="page">Informasi</a>
          <a class="font-medium text-gray-600 hover:text-gray-400" href="./../testimoni/index.php">Testimoni</a>
          <a class="font-medium text-gray-600 hover:text-gray-400" href="/ensiklopedia-tenun/admin">Login</a>
        </div>
      </div>
    </nav>
  </header>
  
  <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Informasi</h2>
    <p class="mt-1 text-gray-600">Informasi terbaru</p>
  </div>
  <!-- End Title -->
  <?php 
   if($result){
  ?>
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    while ($row = $result->fetch_assoc()) { 
      $id = $row['id'];
      $judul = $row['judul'];
      $slug = $row['slug'];
      $deskripsi = $row['deskripsi'];
      $cover = $row['cover'];
    ?>
    <!-- Card -->
    <a class="group hover:bg-gray-100 rounded-xl p-5 transition-all" href="./detail.php?slug=<?=$slug?>">
      <div class="aspect-w-16 aspect-h-10">
        <img class="w-full object-cover rounded-xl" src="./../dist/images/informasi/<?= $cover ?>" alt="Image Description">
      </div>
      <h3 class="mt-5 text-xl text-gray-800">
        <?= $judul ?>
      </h3>
      <p class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800">
        Lihat Detail
        <svg class="flex-shrink-0 size-4 transition ease-in-out group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </p>
    </a>
    <!-- End Card -->
    <?php } ?>
  </div>
  <!-- End Grid -->
  <?php } ?>
</div>
<!-- End Card Blog -->
  <!-- ========== FOOTER ========== -->
  <footer class="mt-auto w-full bg-gray-900 w-full py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <!-- Grid -->
    <div class="text-center">
      <div>
        <a class="flex-none text-xl font-semibold text-white" href="#" aria-label="Brand">ENSIKLOPEDIA TENUN</a>
      </div>
      <!-- End Col -->
      
      <div class="mt-3">
        <p class="text-gray-500">Abdul Hakam - <a class="font-semibold text-blue-600 hover:text-blue-700" href="#">1901011290</a></p>
        <p class="text-gray-500">Mahasiswa Universitas Bumigora Mataram</p>
      </div>
      
      <!-- Social Brands -->
      <div class="mt-3 space-x-2">
        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" target="_blank" href="mailto:kambgz@gmail.com">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
        </a>
        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" target="_blank" href="https://www.youtube.com/channel/UC4i_XR7dUKRJ_ZXccCe3qrA">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21.593 7.203a2.506 2.506 0 0 0-1.762-1.766C18.265 5.007 12 5 12 5s-6.264-.007-7.831.404a2.56 2.56 0 0 0-1.766 1.778c-.413 1.566-.417 4.814-.417 4.814s-.004 3.264.406 4.814c.23.857.905 1.534 1.763 1.765 1.582.43 7.83.437 7.83.437s6.265.007 7.831-.403a2.515 2.515 0 0 0 1.767-1.763c.414-1.565.417-4.812.417-4.812s.02-3.265-.407-4.831zM9.996 15.005l.005-6 5.207 3.005-5.212 2.995z"></path></svg>
        </a>
        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" target="_blank" href="https://www.instagram.com/0ca30_/">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
        </a>
      </div>
      <!-- End Social Brands -->
    </div>
    <!-- End Grid -->
  </footer>
  <!-- ========== END FOOTER ========== -->
  <div style="position:fixed;right:20px;bottom:20px;">
    <a href="https://api.whatsapp.com/send?phone=+6287758880908&amp;text=Halo saya tertarik dengan kain tenun sesek, bagaimana cara saya agar mendapatkan kain tenun sesek??">
    <!-- <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px"> -->
    <!-- <img src="TENUN/wa.png"> Whatsapp Kami</button></a> -->
    <img src="./../dist/images/wa.png" alt="" height="60px" width="60px"> Whatsapp Kami!</a>
    </div>
  <script type="module" crossorigin src="./../dist/assets/index-fmZGMq0W.js"></script>
</body>

</html>