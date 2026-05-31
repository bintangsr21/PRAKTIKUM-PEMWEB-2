<style>
/* Container Carousel dengan Border Glow */
#headerCarousel {
    border-radius: 30px;
    overflow: hidden;
    border: 1px solid rgba(34, 197, 94, 0.2);
    box-shadow: 0 15px 45px rgba(0,0,0,0.4);
    position: relative;
}

/* Gambar dengan Overlay Gradasi */
#headerCarousel .carousel-item {
    position: relative;
}

#headerCarousel .carousel-item::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 70%;
    background: linear-gradient(to top, rgba(7, 26, 18, 0.9) 0%, transparent 100%);
}

#headerCarousel .carousel-item img {
    height: 400px;
    object-fit: cover;
    transition: transform 1.2s cubic-bezier(0.15, 0.83, 0.66, 1);
}

#headerCarousel:hover .carousel-item img {
    transform: scale(1.08);
}

/* Caption dengan Efek Glassmorphism */
#headerCarousel .carousel-caption {
    bottom: 50px;
    padding: 25px;
    background: rgba(11, 31, 23, 0.4);
    backdrop-filter: blur(8px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    max-width: 80%;
    left: 10%;
    z-index: 2;
    animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

#headerCarousel h5 {
    font-family: 'Poppins', sans-serif;
    font-size: 42px;
    font-weight: 800;
    color: #4ade80;
    letter-spacing: 2px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

#headerCarousel p {
    font-size: 19px;
    color: #ecfdf5;
    font-weight: 300;
    letter-spacing: 1px;
}

/* Navigasi Bulat Custom */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(34, 197, 94, 0.2);
    backdrop-filter: blur(4px);
    border-radius: 50%;
    padding: 22px;
    border: 1px solid rgba(34, 197, 94, 0.3);
    transition: 0.3s;
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: #22c55e;
    transform: scale(1.1);
}

/* Indikator Slim */
.carousel-indicators {
    bottom: 20px;
}

.carousel-indicators button {
    width: 30px !important;
    height: 4px !important;
    border-radius: 2px !important;
    background-color: #22c55e !important;
    opacity: 0.3;
}

.carousel-indicators button.active {
    opacity: 1;
    width: 50px !important;
}
</style>

<div id="headerCarousel" class="carousel slide mb-4 shadow-lg" data-bs-ride="carousel">
    <!-- Indikator -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button>
    </div>

    <!-- Slide Item -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/31.jpg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption">
                <h5>M B G</h5>
                <p><i class="bi bi-stars me-2"></i>Simpel • Efektif • Efisien</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="img/77.jpg" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption">
                <h5>Welcome</h5>
                <p><i class="bi bi-door-open me-2"></i>Selamat Datang di Website Saya</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="img/54.jpg" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption">
                <h5>Explore</h5>
                <p><i class="bi bi-compass me-2"></i>Jelajahi Informasi Tentang Saya</p>
            </div>
        </div>
    </div>

    <!-- Kontrol Navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>