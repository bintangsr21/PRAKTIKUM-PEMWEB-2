<style>
/* Container Accordion */
.custom-accordion {
    max-width: 100%;
}

.custom-accordion .accordion-item {
    background: rgba(15, 31, 23, 0.7) !important;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(34, 197, 94, 0.15) !important;
    border-radius: 20px !important;
    overflow: hidden;
    margin-bottom: 18px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}

.custom-accordion .accordion-item:hover {
    border-color: rgba(34, 197, 94, 0.4);
    transform: translateX(5px);
}

/* Header & Button */
.custom-accordion .accordion-button {
    background: #112d21;
    color: #ecfdf5;
    font-weight: 600;
    padding: 20px 25px;
    border: none;
    box-shadow: none !important;
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Button Saat Terbuka (Active) */
.custom-accordion .accordion-button:not(.collapsed) {
    background: linear-gradient(90deg, #15803d, #166534);
    color: white;
    box-shadow: 0 4px 15px rgba(22, 163, 74, 0.2) !important;
}

.custom-accordion .accordion-button:hover {
    background: #1b4332;
}

/* Kustomisasi Ikon Panah */
.custom-accordion .accordion-button::after {
    filter: brightness(0) invert(1);
    transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

/* Body Content */
.custom-accordion .accordion-body {
    background: transparent;
    color: #94a3b8;
    padding: 25px;
    line-height: 1.8;
    font-size: 16px;
    border-top: 1px solid rgba(34, 197, 94, 0.1);
}

/* Styling List di dalam Body */
.accordion-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.accordion-list li {
    background: rgba(34, 197, 94, 0.1);
    color: #4ade80;
    padding: 5px 15px;
    border-radius: 10px;
    font-size: 14px;
    border: 1px solid rgba(34, 197, 94, 0.2);
}
</style>

<div class="accordion custom-accordion" id="accordionPersonal">

    <!-- HOBBY -->
    <div class="accordion-item shadow-lg">
        <h2 class="accordion-header">
            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#hobby">
                <i class="bi bi-controller fs-5 text-green"></i> 
                Hobby & Interests
            </button>
        </h2>
        <div id="hobby" class="accordion-collapse collapse show" data-bs-parent="#accordionPersonal">
            <div class="accordion-body">
                <ul class="accordion-list">
                    <li><i class="bi bi-code-slash me-1"></i> Coding</li>
                    <li><i class="bi bi-mic me-1"></i> Podcasting</li>
                    <li><i class="bi bi-airplane me-1"></i> Traveling</li>
                    <li><i class="bi bi-trophy me-1"></i> Football</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- FAVORITE FOOD -->
    <div class="accordion-item shadow-lg">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#makanan">
                <i class="bi bi-egg-fried fs-5 text-green"></i> 
                Favorite Food
            </button>
        </h2>
        <div id="makanan" class="accordion-collapse collapse" data-bs-parent="#accordionPersonal">
            <div class="accordion-body">
                <div class="d-flex flex-column gap-2">
                    <span class="text-white fw-bold">Daftar Menu Favorit:</span>
                    <p class="mb-0"><i class="bi bi-check2-circle text-success me-2"></i>Telur Gulung (Jajanan Nostalgia)</p>
                    <p class="mb-0"><i class="bi bi-check2-circle text-success me-2"></i>Bakso Urat (Ekstra Pedas)</p>
                    <p class="mb-0"><i class="bi bi-check2-circle text-success me-2"></i>Mie Ayam (Favorit Siang Hari)</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Penambahan atribut agar hanya satu accordion yang terbuka dalam satu waktu (opsional)
    // Sudah ditangani oleh data-bs-parent="#accordionPersonal"
</script>