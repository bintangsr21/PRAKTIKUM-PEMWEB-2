<style>
/* Background Overlay untuk kedalaman visual */
body {
    background: radial-gradient(circle at top left, #0d2d1f, #07130d);
    min-height: 100vh;
}

/* Section Utama dengan Glassmorphism */
.profile-section {
    background: rgba(15, 31, 23, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: 30px;
    padding: 45px;
    color: white;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

/* Dekorasi cahaya di pojok kartu */
.profile-section::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(34, 197, 94, 0.05) 0%, transparent 70%);
    pointer-events: none;
}

.profile-section:hover {
    transform: translateY(-8px);
    border-color: rgba(34, 197, 94, 0.4);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6), 0 0 20px rgba(34, 197, 94, 0.1);
}

/* Frame Foto Profil */
.profile-image {
    width: 100%;
    max-height: 350px;
    object-fit: cover;
    border-radius: 25px;
    border: 2px solid rgba(34, 197, 94, 0.3);
    transition: all 0.5s ease;
    filter: grayscale(20%);
}

.profile-section:hover .profile-image {
    filter: grayscale(0%);
    transform: scale(1.02);
    border-color: #22c55e;
    box-shadow: 0 0 25px rgba(34, 197, 94, 0.2);
}

/* Header Text */
.profile-name {
    font-family: 'Poppins', sans-serif;
    font-size: clamp(28px, 5vw, 42px);
    font-weight: 800;
    background: linear-gradient(to right, #ffffff, #86efac);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 8px;
}

.profile-role {
    color: #4ade80;
    font-size: 20px;
    font-weight: 500;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
}

.profile-role::after {
    content: "";
    height: 2px;
    width: 50px;
    background: #22c55e;
    display: inline-block;
    margin-left: 15px;
}

/* Deskripsi */
.profile-text {
    color: #94a3b8;
    line-height: 1.8;
    font-size: 17px;
    text-align: justify;
}

/* Badge Skill / Interest */
.custom-badge {
    padding: 12px 20px;
    border-radius: 15px;
    font-size: 13px;
    margin-right: 10px;
    margin-bottom: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    display: inline-block;
    color: #f0fdf4 !important;
}

.custom-badge:hover {
    transform: translateY(-5px);
    background: #22c55e !important;
    box-shadow: 0 10px 20px rgba(22, 163, 74, 0.3);
}

</style>

<div class="container py-5">
    <div class="profile-section">
        <div class="row align-items-center g-5">
            
            <div class="col-md-4">
                <div class="position-relative">
                    <img src="img/home.jpeg" class="img-fluid profile-image shadow-lg" alt="Profile Picture">
                    <!-- Aksen elemen desain mengambang -->
                    <div class="position-absolute bottom-0 end-0 p-3 bg-success rounded-4 m-3 shadow-lg d-none d-md-block" style="opacity: 0.9;">
                        <i class="bi bi-code-slash text-white fs-4"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h2 class="profile-name">
                    Muhammad Bintang Siregar
                </h2>

                <p class="profile-role">
                    Informatics Student
                </p>

                <p class="profile-text">
                    Saya adalah seorang pengembang yang memiliki gairah tinggi dalam dunia 
                    <strong>Backend Development</strong> dan <strong>Cyber Security</strong>. 
                    Fokus utama saya saat ini adalah membangun arsitektur server yang aman dan efisien 
                    menggunakan PHP. Saya percaya bahwa teknologi terbaik adalah teknologi yang 
                    mampu memberikan solusi nyata dengan antarmuka yang bersih dan performa yang optimal.
                </p>

                <div class="mt-4 pt-2">
                    <span class="badge custom-badge" style="background: rgba(21, 128, 61, 0.3);">
                        <i class="bi bi-terminal me-2"></i> Web Developer
                    </span>

                    <span class="badge custom-badge" style="background: rgba(22, 163, 74, 0.3);">
                        <i class="bi bi-database me-2"></i> Backend Developer
                    </span>

                    <span class="badge custom-badge" style="background: rgba(20, 83, 45, 0.3);">
                        <i class="bi bi-shield-lock me-2"></i> Cyber Security
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>