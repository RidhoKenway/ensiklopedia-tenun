<?php
include_once './../src/c.php';

// init output
$output = '';

// lakukan query select order by untuk mengurutkan komentar baru pada tbl_komentar
$query = "SELECT * FROM testimoni WHERE parent_id IS NULL ORDER BY created_at DESC";
$stmt = $connection->prepare($query);
$stmt->execute();
$res = $stmt->get_result();

// looping data
while ($row = $res->fetch_assoc()) {
    $id = $row['id'];
    $nama = $row['nama'];
    $testimoni = $row['testimoni'];
    $created_at = date_create($row['created_at']);
    $created_at = date_format($created_at,"d F, Y");

    $output .= '
    <article id="cmtx-'.$id.'" class="y-6 text-base rounded-lg">
        <div class="flex justify-between mb-2">
            <div class="flex flex-col w-full">
                <div class="flex flex-col w-full">
                    <div class="px-4 py-2 bg-white rounded-lg mb-3 flex gap-2 w-full border border-gray-200">
                        <img class="mr-2 w-10 h-10 rounded-full" src="./../dist/images/user.png" alt="'.$nama.'">
                        <div>
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-md text-gray-900 dark:text-white font-semibold">
                                '.$nama.'
                            </p>
                            <p class="text-sm text-gray-400 dark:text-gray-600 mb-0">
                                <time class="text-sm">'.$created_at.'</time>
                            </p>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 pe-4">
                            '. $testimoni .'
                        </p>
                        <div class="flex flex-row items-center gap-3 mt-4 mb-2">
                            <button data-parent="'.$id.'" type="button" class="btn-reply flex items-center text-sm text-blue-400 hover:underline dark:text-gray-400 font-medium">
                                Reply
                            </button>
                            <div class="inline-flex items-center gap-2 text-gray-800 dark:text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h1zM4 8h12v8h-5.277L7 18.234V16H4V8z"></path><path d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"></path></svg> 
                            <span class="text-sm text-gray-400 dark:text-gray-400 font-medium">1 Balasan</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    ';

  $output .= ambil_reply($connection, $row["id"]);
  $output .= '
            </div>
        </div>
    </article>
  ';
}

// tampilkan
echo $output;


// function ambil_reply di gunakan untuk membalas komentar pengguna
function ambil_reply($connection, $parent_id = 0)
{
  $output = '';
  $query = "SELECT * FROM testimoni WHERE parent_id=?";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("s", $parent_id);
  $stmt->execute();
  $res = $stmt->get_result();
  $count = $res->num_rows;

  if ($count > 0) {
    while ($row = $res->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['nama'];
        $testimoni = $row['testimoni'];
        $created_at = date_create($row['created_at']);
        $created_at = date_format($created_at,"d F, Y");
      $output .= '
        <article id="cmtx-'.$id.'" class="ms-20 y-6 text-base">
            <div class="flex justify-between mb-2">
                <div class="flex flex-col gap-2 w-full">
                    <div class="flex gap-2 w-full">
                        <div class="px-4 py-2 bg-white rounded-lg mb-3 flex gap-2 w-full border border-gray-200">
                            <img class="mr-2 w-10 h-10 rounded-full" src="./../dist/images/user.png" alt="'.$nama.'">
                            <div>
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-md text-gray-900 dark:text-white font-semibold">
                                    '.$nama.'
                                    </p>
                                    <p class="text-sm text-gray-400 dark:text-gray-600">
                                        <time class="text-sm">'.$created_at.'</time>
                                    </p>
                                </div>
                                <p class="text-gray-500 dark:text-gray-400 pe-4">
                                '.$testimoni.'
                                </p>
                                <div class="flex flex-row items-center gap-3 mt-4 mb-2">
                                <button data-parent="'.$id.'" type="button" class="btn-reply flex items-center text-sm text-blue-400 hover:underline dark:text-gray-400 font-medium">
                                    Reply
                                </button>
                                    <div class="inline-flex items-center gap-2 text-gray-800 dark:text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h1zM4 8h12v8h-5.277L7 18.234V16H4V8z"></path><path d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"></path></svg>
                                    <span class="text-sm text-gray-400 dark:text-gray-400 font-medium">0 Balasan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cmtx-con">
        ';

        $output .= ambil_reply($connection, $row["id"]);
        $output .= '
                    </div>
                </div>
            </div>
        </article>
        ';
    }
  }

  return $output;
}