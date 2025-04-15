const profileImageInput = document.getElementById('profileImage');
const profileImageWrapper = document.getElementById('profileImageWrapper');
const profileImagePreview = document.getElementById('profileImagePreview');
const profileImagePlaceholder = profileImageWrapper.querySelector('.profile-image-placeholder');

profileImageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profileImagePreview.src = e.target.result;
            profileImagePreview.classList.remove('d-none');
            profileImagePlaceholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    } else {
        profileImagePreview.classList.add('d-none');
        profileImagePlaceholder.style.display = 'flex';
    }
});