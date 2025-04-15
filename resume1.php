<?php
include 'connect.php';

$select_personal_info = 'SELECT * FROM `personal_info`';
$select_additional_info = 'SELECT * FROM `additional_information`';

$query1 = mysqli_query($conn, $select_personal_info);
$query2 = mysqli_query($conn, $select_additional_info);


if ($query1 && $query2) {
    $personal_info = mysqli_fetch_assoc($query1);
    $additional_info = mysqli_fetch_assoc($query2);
} else {
    echo "Error: " . mysqli_error($conn);  
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="resume1.css">
    <script src="https://kit.fontawesome.com/e3cc93d180.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="resume-card">
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="mb-1"><?php echo $personal_info['lastname'] . ' ' . $personal_info['firstname'] .' '. $personal_info['middlename']; ?></h1>
                    <h4 class=""><?php echo $additional_info['job_title']; ?></h4>
                </div>
                <div class="brand-header">
                    <div class="container">
                        <img src="uploads/<?php echo $personal_info['profile'] ?>" alt="Profile Picture" class="logo">
                    </div>
                </div>
            </div>
            <div class="contact-info">
                <h4 class="border-bottom text-light">Contact Information</h4>
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-6 col-6">
                    <ul class="list-unstyled">
                    <li><i class="fas fa-envelope me-2"></i> <?php echo $personal_info['email']; ?></li>
                    <li><i class="fas fa-phone me-2"></i><?php echo $personal_info['phonenumber']; ?> </li>
                    <li><i class="fas fa-map-marker-alt me-2"></i><?php echo $personal_info['address'] .', '. $personal_info['city_town']; ?> </li>
                    </ul>
                </div>
                <div class="col-md col">
                    <ul class="list-unstyled">
                    <li><i class="fas fa-map me-2"></i><?php echo $personal_info['state'];?> </li>
                    <li><i class="fas fa-globe me-2"></i><?php echo $personal_info['nationality']; ?></li>
                    <li><i class="fas fa-user me-2"></i> <?php echo $personal_info['gender'] ?></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        
        <div class="p-4">
            <p class="lead"><?php echo $additional_info['objectives']; ?></p>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="">
                        <h4 class="section-title">Education</h4>
                        <div class="">
                            <small class="text-secondary m-0 p-0"><?php echo $additional_info['edu_start_date'].' - '. $additional_info['edu_end_date'] ;?></small>
                            <h6 class="m-0 p-0"><?php echo $additional_info['institution']?></h6>
                            <p class="text-secondary "><?php echo $additional_info['edu_city'].', '. $additional_info['edu_country'];?></p>
                        </div>
                    </div>
                    <h4 class="section-title">Skills</h4>
                    <p><?php echo $additional_info['skills']?></p>
                    <h4 class="section-title mt-4">Professional Experience</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="">
                                <small class="text-secondary"><?php echo $additional_info['exp_start_date'].' - '. $additional_info['exp_end_date'] ;?></small>
                                <h5 class="m-0 p-0"><?php echo $additional_info['company']; ?></h5>
                                <p class="text-secondary m-0 p-0"><?php echo $additional_info['edu_city'] .', '. $additional_info['edu_country']; ?></p>
                                <h6 class="m-0 p-0"><?php echo $additional_info['job_title'].' ('.$additional_info['exp_responsibility'].')';?></h6>
                            </div>
                        </div>
                    </div>
                        <!-- <div class="col-6">
                            <div class="">
                                <small class="text-secondary">06/2024 - 12/2024</small>
                                <h5 class="m-0 p-0">BuggyBillions</h5>
                                <p class="text-secondary m-0 p-0">Ogbomoso, Nigeria</p>
                                <h6 class="m-0 p-0">FullStack Developer</h6>
                            </div>
                        </div> -->
                        <div class="">
                            <h4 class="section-title">Achievements</h4>
                                <i class="fas fa-award me-1"></i>
                                <!-- Student of the Month -->
                                <?php echo $additional_info['achievements']; ?>
                        </div>
                        <div class="">
                            <h4 class="section-title mt-3">Languages</h4>
                            <p><i class="fas fa-language me-2"></i><?php echo $additional_info['language']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4 download-btn d-flex justify-content-center align-items-center gap-2">
        <button id="downloadBtn" onclick="generatePDF()" class="btn btn-download btn-lg d-flex align-items-center justify-content-center gap-2 p-3">
            <i class="fas fa-download"></i> Download Resume
        </button>
    </div>
    <script>
        const downloadBtn = document.getElementById('downloadBtn'); 

        document.addEventListener("click", ()=>{
            print();
        })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>