<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $objectives = htmlspecialchars($_POST['objectives']);
    $skills = htmlspecialchars($_POST['skills']);
    $language = htmlspecialchars($_POST['language']);
    $degree = htmlspecialchars($_POST['degree']);
    $institution = htmlspecialchars($_POST['institution']);
    $edu_start_date = htmlspecialchars($_POST['edu_start_date']);
    echo $edu_start_date;
    $edu_end_date = htmlspecialchars($_POST['edu_end_date']);
    $edu_city = htmlspecialchars($_POST['edu_city']);
    $edu_country = htmlspecialchars($_POST['edu_country']);
    $job_title = htmlspecialchars($_POST['job_title']);
    $company = htmlspecialchars($_POST['company']);
    $exp_start_date = htmlspecialchars($_POST['exp_start_date']);
    $exp_end_date = htmlspecialchars($_POST['exp_end_date']);
    $exp_city = htmlspecialchars($_POST['exp_city']);
    $exp_country = htmlspecialchars($_POST['exp_country']);
    $exp_responsibility = htmlspecialchars($_POST['exp_responsibility']);
    $achievements = htmlspecialchars($_POST['achievements']);

    
    $sql = "INSERT INTO `additional_information`(`objectives`, `skills`, `language`, `degree`, `institution`, `edu_start_date`, `edu_end_date`, `edu_city`, `edu_country`, `job_title`, `company`, `exp_start_date`, `exp_end_date`, `exp_city`, `exp_country`, `exp_responsibility`, `achievements`) VALUES ('$objectives','$skills','$language','$degree','$institution','$edu_start_date','$edu_end_date','$edu_city','$edu_country','$job_title','$company','$exp_start_date','$exp_end_date','$exp_city','$exp_country','$exp_responsibility', '$achievements')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: resume1.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e3cc93d180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
       <header class="brand-header rounded-4">
        <!-- <div class="container">
            <img src="./IMAGES/logo.png" alt="Company Logo" class="logo">
        </div> -->
        <h2 class="text-white text-center">RESUME GENERATOR</h2>
        </header>
        <form class="profile-card p-4 mb-5" id="page2" method="POST">
            <h2 class="section-title mb-4">
                <i class="fas fa-info-circle"></i>
                Additional Information
            </h2>
            <div class="row">
                <div class="col-12">
                            <div class="detail-card">
                                    <div class="row my-1 gap-3">
                                        <div class="col-lg-12 col-md-6 col-sm">
                                            <label for="objective" class="text-secondary">Objective</label>
                                                <textarea class="form-control" name="objectives" rows="4" placeholder="Enter any additional information here..."></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm">
                                            <label for="skills" class="text-secondary">skills(separate with comma) </label>
                                            <input type="text" name="skills" id="skills" class="form-control">
                                        </div>
                                        <div class="col-lg col-md-6 col-sm">
                                            <label for="language" class="text-secondary">language(separate with comma) </label>
                                            <input type="text" name="language" id="language" class="form-control">
                                        </div>
                                    </div>
                                    <h2 class="section-title mb-1 mt-3">
                                        <i class="fas fa-graduation-cap"></i>
                                        Education
                                    </h2>
                                    <div class="row gap-3">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="degree" class="text-secondary">Degree</label>
                                            <input type="text" name="degree" id="degree" class="form-control">
                                        </div>
                                        <div class="col-lg col-md col-sm">
                                            <label for="institution" class="text-secondary">Institution</label>
                                            <input type="text" id="institution" name="institution" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row gap-3 my-1">
                                        <div class="col-lg-6 col-md-6 col-sm">
                                            <label for="start-date" class="text-secondary">Start Date</label>
                                            <input type="month" id="start-date" name="edu_start_date" class="form-control">
                                        </div>
                                        <div class="col-lg col-md-6 col-sm">
                                            <label for="end-date" class="text-secondary">End Date</label>
                                            <input type="month" id="end-date" name="edu_end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row gap-3">
                                            <div class="col-lg-6 col-md-6 col-sm">
                                                <label for="city" class="text-secondary">City</label>
                                                <input type="text" id="city" name="edu_city" class="form-control">
                                            </div>
                                            <div class="col-lg col-md-6 col-sm">
                                                <label for="country" class="text-secondary">Country</label>
                                                <input type="text" id="country" name="edu_country" class="form-control">
                                            </div>
                                    </div>
                                    <h2 class="section-title mb-1 mt-3">
                                        <i class="fas fa-briefcase"></i>
                                        Professional Experience
                                    </h2>
                                            <div class="row my-1 gap-3">
                                                <div class="col-lg-6 col-md-6 col-sm">
                                                    <label for="job-title" class="text-secondary">Job Title</label>
                                                    <input type="text" id="job-title" name="job_title" class="form-control">
                                                </div>
                                                <div class="col-lg col-md-6 col-sm">
                                                    <label for="company" class="text-secondary">Company</label>
                                                    <input type="text" id="company" name="company" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row gap-3 my-1">
                                                <div class="col-lg-6 col-md-6 col-sm">
                                                    <label for="job-start-date" class="text-secondary">Start Date</label>
                                                    <input type="month" id="job-start-date" name="exp_start_date" class="form-control">
                                                </div>
                                                <div class="col-lg col-md-6 col-sm">
                                                    <label for="job-end-date" class="text-secondary">End Date</label>
                                                    <input type="month" id="job-end-date" name="exp_end_date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row gap-3">
                                                <div class="col-lg-6 col-md-6 col-sm">
                                                    <label for="job-city" class="text-secondary">City</label>
                                                    <input type="text" id="job-city" name="exp_city" class="form-control">
                                                </div>
                                                <div class="col-lg col-md-6 col-sm">
                                                    <label for="job-country" class="text-secondary">Country</label>
                                                    <input type="text" id="job-country" name="exp_country" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row my-1 gap-3">
                                                <div class="col-lg-6 col-md-6 col">
                                                    <label for="responsibilities" class="text-secondary">Responsibilities</label>
                                                    <textarea id="responsibilities" class="form-control" rows="3" name="exp_responsibility" placeholder="Describe your responsibilities and achievements..."></textarea>
                                                </div>
                                                    <div class="col-lg col-md-6 col">
                                                        <label for="achievements" class="text-secondary">Achievements</label>
                                                        <textarea id="achievements" class="form-control" rows="3" name="achievements" placeholder="List your achievements..."></textarea>
                                                    </div>
                                            </div>
                                </div>
                            </div>
                </div>
                <div class="col-12 d-flex justify-content-between gap-4">
                    <a href="index.php" class="nav-button">
                        <i class="fas fa-arrow-left me-2 pt-1"></i>
                        Previous
                    </a>
                    <button class="btn nav-button" type="submit" name="submit">
                        Submit
                        <i class="fas fa-check ms-2 pt-1"></i>
                    </button>
                </div>
            </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>