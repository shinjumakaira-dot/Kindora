<h3>File Manager</h3>

<form action="upload_file.php" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Pilih File</label>

        <input
            type="file"
            name="file"
            class="form-control"
            required>

    </div>

    <button type="submit" class="btn btn-primary">
        Upload File
    </button>

</form>

<hr>

<h4>Daftar File</h4>

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>Nama File</th>

            <th width="150">Download</th>

        </tr>

    </thead>

    <tbody>

    <?php

    $folder = "files/";

    if(is_dir($folder))
    {
        $data = scandir($folder);

        foreach($data as $file)
        {
            if($file != "." && $file != "..")
            {
                ?>

                <tr>

                    <td><?php echo $file; ?></td>

                    <td>

                        <a
                            href="files/<?php echo $file; ?>"
                            download
                            class="btn btn-success btn-sm">

                            Download

                        </a>

                    </td>

                </tr>

                <?php
            }
        }
    }

    ?>

    </tbody>

</table>