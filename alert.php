<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

<?php

function showSuccess($url, $msg)
{
    echo "
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: 'สำเร็จ',
        text: '$msg',
        icon: 'success',
        confirmButtonColor: '#3b3c3d',
        confirmButtonText: 'ตกลง',
        type: 'success'
    }).then(function() {
        window.location = '$url';
    });
})
</script>
    ";
}

function showFail($url, $msg)
{
    echo "
    <script>
    $(document).ready(function() {
    Swal.fire({
        title: 'ไม่สำเร็จ',
        text: '$msg',
        icon: 'error',
        confirmButtonColor: '#3b3c3d',
        confirmButtonText: 'ตกลง',
        type: 'error'
    }).then(function() {
        window.location = '$url';
    });
})
</script>
    ";
}

function showConfirm($msg)
{
    echo "
    <script>
    $(document).ready(function() {
        Swal.fire({
            title: 'คุณแน่ใจใช่หรือไม่?',
            text: '$msg',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3b3c3d',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                    window.location.href = '?action=confirm';
                }else {
                    
            }
        });
    })
    </script>
    ";
}


?>