<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $middleName = htmlspecialchars($_POST['middlename']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $phoneNumber = htmlspecialchars($_POST['phonenumber']);
    $address = htmlspecialchars($_POST['address']);
    $city_Town = htmlspecialchars($_POST['city_town']);
    $state = htmlspecialchars($_POST['state']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $gender = htmlspecialchars($_POST['gender']);
    
    $directory = 'uploads/';
    if (!is_dir($directory)){
        mkdir($directory, 0777, true);
    }
    if (isset($_FILES['profile'])) {
        $profileImage = $_FILES['profile']['name'];
        $profileImageTemp = $_FILES['profile']['tmp_name'];
        $targetFilePath = $directory . basename($profileImage);
        move_uploaded_file($profileImageTemp, $targetFilePath);
    } else {
        $profileImage = null;
    }
    
    $sql = "INSERT INTO `personal_info`(`firstname`, `lastname`, `middlename`, `email`, `phonenumber`, `address`, `city_town`, `state`, `nationality`, `gender`, `profile`) VALUES ('$firstName','$lastName','$middleName','$email','$phoneNumber','$address','$city_Town','$state','$nationality','$gender','$profileImage')";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: page2.php");
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
      <form method="POST" class="container" enctype="multipart/form-data">
        <header class="brand-header rounded-4">
            <!-- <div class="container">
                <img src="./IMAGES/logo.png" alt="Company Logo" class="logo">
            </div> -->
            <h2 class="text-white text-center">RESUME GENERATOR</h2>
        </header>
        <div class="profile-card p-5 mb-5" id="page1">
            <h2 class="section-title mb-4">
                <i class="fa-solid fa-id-badge"></i>
                Personal Details
            </h2>
            <div class="row g-4">
                <div class="detail-card">
                        <div class="row gap-3">
                            <div class="image col-lg-2 col-md-12 col-12">
                                <label for="profileImage" class="mb-1 p-0 m-0 text-secondary">Upload Profile Image
                                    <div class="profile-image-wrapper" id="profileImageWrapper">
                                        <input type="file" name="profile" id="profileImage" class="form-control d-none" accept="image/*">
                                        <img id="profileImagePreview" class="d-none" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;" alt="Profile Preview">
                                        <div class="profile-image-placeholder">
                                            <i class="fa-solid fa-camera"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                                <div class="col-lg col-md col">
                                    <div class="name d-flex flex-column gap-1">
                                        <div class="col-lg col-md col-sm">
                                            <label for="firstName" class="text-secondary">First Name</label>
                                            <input type="text" name="firstname" id="firstName" class="form-control">
                                        </div>
                                        <div class="col-lg col-md col-sm">
                                            <label for="lastName" class="text-secondary">Last Name</label>
                                            <input type="text" name="lastname" id="lastName" class="form-control">
                                        </div>
                                        <div class="col-lg col-md col-sm">
                                            <label for="middleName" class="text-secondary">Middle Name</label>
                                            <input type="text" name="middlename" id="middleName" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row my-1">
                            <div class="col-lg-6 col-md-6 col-sm">
                                <label for="email" class="text-secondary">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-lg col-md-6 col-sm">
                                <label for="email" class="text-secondary">Role</label>
                                <input type="text" name="role" id="role" class="form-control">
                            </div>
                            <div class="col-lg col-md-6 col-sm">
                                <label for="phoneNumber" class="text-secondary">Phone Number</label>
                                <input type="tel" name="phonenumber" id="phoneNumber" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-7 col-md">
                                <label for="address" class="text-secondary">Address</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label for="cityTown" class="text-secondary">City/Town</label>
                                <input type="text" name="city_town" id="cityTown" class="form-control">
                            </div>
                            <div class="col-lg col-md-6">
                                <label for="state" class="text-secondary">State</label>
                                <input type="text" name="state" id="state" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6 col-md-6 col-sm">
                                <label for="Nationality" class="text-secondary">Nationality</label>
                                <input type="text" name="nationality" id="Nationality" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm">
                                <label for="Gender" class="text-secondary">Gender</label>
                                    <select class="form-select" id="Gender" name="gender" aria-label="Select Gender">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" name="submit" class="nav-button">
                        Next Page
                        <i class="fa-solid fa-arrow-right ms-2 pt-1"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>