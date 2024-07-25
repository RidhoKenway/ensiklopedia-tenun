<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:./login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="./../../dist/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="./../../dist/output.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./../../dist/plugins/dropify/dropify.min.css">
</head>
<body>
    <!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64 dark:bg-neutral-800 dark:border-neutral-700">
  <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">
    <div class="me-5 lg:me-0 lg:hidden">
      <!-- Logo -->
      <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="../templates/admin/index.html" aria-label="Preline">
        ENSIKLOPEDIA TENUN
      </a>
      <!-- End Logo -->
    </div>

    <div class="w-full flex items-center justify-end me-auto sm:gap-x-3 sm:order-3">
      <div class="flex flex-row items-center justify-end gap-2">

        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
          <button id="hs-dropdown-with-header" type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
            <img class="inline-block size-[38px] rounded-full ring-2 ring-white dark:ring-neutral-800" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
          </button>

          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 dark:bg-neutral-900 dark:border dark:border-neutral-700" aria-labelledby="hs-dropdown-with-header">
            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-neutral-800">
              <p class="text-sm text-gray-500 dark:text-neutral-400">Signed in as</p>
              <p class="text-sm font-medium text-gray-800 dark:text-neutral-300"><?= $_SESSION['nama'] ?></p>
            </div>
            <div class="mt-2 py-2 first:pt-0 last:pb-0">
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300" href="#">
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Profil
              </a>
              <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300" href="./../../process/logout.php">
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                Logout
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Breadcrumb -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
  <div class="flex justify-between items-center py-2">
    <!-- Breadcrumb -->
    <ol class="ms-3 flex items-center whitespace-nowrap">
      <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
        Dashboard
      </li>
    </ol>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <button type="button" class="py-2 px-3 flex justify-center items-center gap-x-1.5 text-xs rounded-lg border border-gray-200 text-gray-500 hover:text-gray-600 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200" data-hs-overlay="#application-sidebar" aria-controls="application-sidebar" aria-label="Sidebar">
      <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13"/></svg>
      <span class="sr-only">Sidebar</span>
    </button>
    <!-- End Sidebar -->
  </div>
</div>
<!-- End Breadcrumb -->

<!-- Sidebar -->
<div id="application-sidebar" class="hs-overlay [--auto-close:lg]
  hs-overlay-open:translate-x-0
  -translate-x-full transition-all duration-300 transform
  w-[260px]
  hidden
  fixed inset-y-0 start-0 z-[60]
  bg-white border-e border-gray-200
  lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
  dark:bg-neutral-800 dark:border-neutral-700
 ">
  <div class="px-8 pt-4">
    <!-- Logo -->
    <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="../templates/admin/index.html" aria-label="Preline">
    ENSIKLOPEDIA TENUN
    </a>
    <!-- End Logo -->
  </div>

  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
      <li>
        <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300" href="./../home.php">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-700 dark:text-white" href="./index.php">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
            Informasi
        </a>
        </li>
    </ul>
  </nav>
</div>
<!-- End Sidebar -->

<!-- Content -->
<div class="w-full lg:ps-64">
  <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
    <div class="flex justify-between gap-4">
    <h2 class="text-2xl">Informasi Baru</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form-x" action="./../../process/tambahInformasi.php" method="post" enctype="multipart/form-data">
                <div class="flex flex-col lg:flex-row items-stretch w-full gap-4">
                    <div class="flex-1 flex flex-col gap-4">
                        <label class="block">
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-semibold text-slate-600">
                                Title
                            </span>
                            <input name="title" required value="" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 px-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Post title"/>
                        </label>
                        <label class="block">
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-1 block text-sm font-semibold text-slate-600">
                                Content Description
                            </span>
                            <div class="wrapper-description">
                                <textarea id="description" name="description" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 px-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Your content.."></textarea>
                                <p class="error-msg hidden hs-error:block text-sm text-rose-600 mt-2">Please select a valid state.</p>
                                <p class="success-msg hidden hs-success:flex text-sm text-teal-600 mt-2">Looks good!</p>
                            </div>
                        </label>
                    </div>
                    <div class="w-full lg:w-64 space-y-4">
                        <label class="block">
                            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-semibold text-slate-600">
                                Feature Image
                            </span>
                            <div class="upload text-center img-thumbnail upload-container">
                                <img id="image" src="" alt="Foto" class="img-thumbnail hidden">
                                <input type="file" name="cover" required id="customFile" class="dropify custom-file-input" data-default-file="./../../dist/images/noimage.jpg" data-max-file-size="1M" />
                                <input name="temp_file" type="hidden" value="">
                            </div>
                        </label>
                        <input id="btn-submit" type="submit" name="submit" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="./../../dist/plugins/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="./../../dist/plugins/dropify/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" crossorigin src="./../../dist/assets/index-fmZGMq0W.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
     $('.dropify').dropify({
            messages: { 'default': 'Click to Upload or Drag n Drop', 'remove':  '<i class="flaticon-close-fill"></i>', 'replace': 'Upload or Drag n Drop' }
        });
    let sett = {
            htmlSupport: {
                allow: [ {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }],
                disallow: [{name: 'script'}]
            },
            protectedSource: [/<i[^>]*><\/i>/g],
            allowedContent: true,
            disallowedContent : 'script; *[on*]',
            contentsCss : "{{getCssUrl()}}",
            // plugins: ['CodeBlock'],
            toolbar: {
                items: [
                'undo', 'redo',
                '|', 'heading',
                '|', {
                    label: 'Fonts',
                    icon: 'text',
                    items: [ 'fontSize', 'fontColor', 'fontBackgroundColor' ]
                },
                '|', 'bold', 'italic', 'underline',  {
                    label: 'More basic styles',
                    icon: 'threeVerticalDots',
                    items: [ 'strikethrough', 'superscript', 'subscript' ]
                },
                '|', 'link', 'imageInsert', 'mediaEmbed', 'codeBlock','removeFormat',
                '|', 'bulletedList', 'numberedList', 'alignment',
                
                ],
                shouldNotGroupWhenFull: true
            },
            image: {
                toolbar: [
                'imageTextAlternative',
                'imageStyle:inline',
                'imageStyle:block',
                'imageStyle:side',
                'toggleImageCaption'
                ],
            },
            mediaEmbed: {
                previewsInData: true,
            },
            list: {
                options: [
                {
                    model: 'numberedList',
                    view: {
                        name: 'ol',
                        class: "hello"
                    }
                }
                ]
            },
            heading: {
                options: [
                {
                    model: 'heading1',
                    view: {
                        name: 'h1',
                        classes: 'text-3xl dark:text-gray-200'
                    },
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: {
                        name: 'h2',
                        classes: 'text-2xl dark:text-gray-200'
                    },
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: {
                        name: 'h3',
                        classes: 'text-xl dark:text-gray-200'
                    },
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: {
                        name: 'h4',
                        classes: 'text-lg dark:text-gray-200'
                    },
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'paragraph',
                    view: {
                        name:'p',
                        classes: 'text-lg text-gray-700 dark:text-gray-200'
                    },
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                ]
            }
        };
        let editor = ClassicEditor
        .create( document.querySelector( '#description' ), sett )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        });
    });
    $('body').on('submit', 'form', function(e){
        e.preventDefault();
    })
    $('body').on('click', '#btn-submit', function(e){
        e.preventDefault();
        document.getElementById('description').value = window.editor.getData();
        const form = document.getElementById("form-x");
        const formData = new FormData(form);
        axios({
            url: './../../process/tambahInformasi.php',
            method: 'post',
            data: formData,
            dataType: 'json',
        })
        .then((response)=>{
            Swal.fire({
                title: 'Success',
                text: response.data.message,
                icon: 'success',
            })
            form.reset()
            window.editor.setData('')
            form.querySelectorAll(".dropify-clear").forEach((el) => {
                el.click();
            });
        })
        .catch((error)=>{
            console.log(error);
            Swal.fire({
                title: 'Gagal',
                text: error.response.data.error,
                icon: 'error',
            })
        })
    })
</script>
</body>
</html>